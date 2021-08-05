<?php
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';
if (isset($_POST['save'])) {
	$errors = 0;
    $nurses_data = array();
    $nurses_data = $_POST;
    unset($nurses_data['gender']);
    unset($nurses_data['save']);
	if (isset($_GET['id'])) {
		if (isset($nurses_data['email']) && !valid_email($nurses_data['email'], 'nurses', $_GET['id'])) {
			$message = 'This Email is already in use.';
			$errors = 1;
		}
	} else {
		if (isset($nurses_data['email']) && !valid_email($nurses_data['email'], 'nurses')) {
			$message = 'This Email is already in use.';
			$errors = 1;
		}
	}
     
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0 && !$errors) {

        define("MAX_SIZE", "400");

       
        $image = $_FILES["image"]["name"];
        $uploadedfile = $_FILES['image']['tmp_name'];

        if ($image) {
            $filename = stripslashes($_FILES['image']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                $errors = 1;
                $message = 'Invalid Image!';
            } else {
                $size = filesize($_FILES['image']['tmp_name']);

                if ($size > MAX_SIZE * 1024) {
                    $errors = 1;
                    $message = 'File Size Exceeded!';
                }

                if ($extension == "jpg" || $extension == "jpeg") {
                    $uploadedfile = $_FILES['image']['tmp_name'];
                    $src = imagecreatefromjpeg($uploadedfile);
                } else if ($extension == "png") {
                    $uploadedfile = $_FILES['image']['tmp_name'];
                    $src = imagecreatefrompng($uploadedfile);
                } else {
                    $src = imagecreatefromgif($uploadedfile);
                }

                list($width, $height) = getimagesize($uploadedfile);

                $newwidth = 320;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);



                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);



                $filename = '../images/uploads/' . $_FILES['image']['name'];
                $name = $_FILES['image']['name'];
                if (isset($_POST['photo'])) {
                    if (file_exists('../images/uploads/' . $_POST['photo'])) {
                        unlink('../images/uploads/' . $_POST['photo']);
                    }
                }
                if (file_exists($filename)) {
                    for ($i = 0; $i < 55; $i++) {
                        $filename = '../images/uploads/' . $i . "_" . $_FILES['image']['name'];
                        $name = $i . "_" . $_FILES['image']['name'];
                        if (!file_exists($filename)) {
                            break;
                        }
                    }
                }

                imagejpeg($tmp, $filename, 100);

                imagedestroy($src);
                imagedestroy($tmp);
                $nurses_data['image'] = $name;
            }
        }
    }
    unset($nurses_data['photo']);
	if(isset($_POST['gender']))
    $nurses_data['gender'] = $_POST['gender'][0];
//    prnt($nurses_data);
    if (!$errors) {
        if (isset($_GET['id'])) {
            updateData('nurses', $nurses_data, ' where id = ' . $_GET['id']);
            $message = "your data is updated Successfully";
        } else {
            insertData('nurses', $nurses_data);
            $message = "your data is saved Successfully";
        }
    }
}
if (isset($_GET['id'])) {
    $nurses = getData('nurses ', '*', 'where id = ' . $_GET["id"]);
    $nurses = $nurses[0];
//    prnt($nurses);
}
?>
<script type="text/javascript">
 $("#view_nurses").addClass("active");
 $(document).ready(function () {
        document.title = "Add/Edit Nurses: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Nurses</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_nurses.php">Nurses</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <form class="" method="post" enctype="multipart/form-data">
                    <?php if (isset($message)) { ?>
                        <div class="col-lg-6 action-info">
                            <?php echo $message; ?>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                    <div class="form-group col-lg-6">
                        <label>Name</label>
                        <input type="text" value="<?php
                        if (isset($nurses['name'])) {
                            echo $nurses['name'];
                        }
						?>" class="form-control" name="name" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Father Name</label>
                        <input type="text" name="fname" value="<?php
                        if (isset($nurses['fname'])) {
                            echo $nurses['fname'];
                        }
						?>" class="form-control" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php
                        if (isset($nurses['email'])) {
                            echo $nurses['email'];
                        }
						?>" class="form-control" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Phone</label>
                        <input type="tel" name="phone" value="<?php
                        if (isset($nurses['phone'])) {
                            echo $nurses['phone'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Mobile</label>
                        <input type="tel" name="mobile" value="<?php
                        if (isset($nurses['mobile'])) {
                            echo $nurses['mobile'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>CNIC</label>
                        <input type="tel" name="cnic" value="<?php
                        if (isset($nurses['cnic'])) {
                            echo $nurses['cnic'];
                        }
                        ?>" class="form-control">
                    </div>


                    <div class="form-group col-lg-6">
                        <label style="width: 100%;">Qualification</label>
                        <input type="text" name="qualification" value="<?php
                        if (isset($nurses['qualification'])) {
                            echo $nurses['qualification'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Institute</label>
                        <input type="text" name="institute" value="<?php
                        if (isset($nurses['institute'])) {
                            echo $nurses['institute'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Speciality</label>
                        <input type="text" name="speciality" value="<?php
                        if (isset($nurses['speciality'])) {
                            echo $nurses['speciality'];
                        }
                        ?>" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Designation</label>
                        <input type="text" name="designation" value="<?php
                        if (isset($nurses['designation'])) {
                            echo $nurses['designation'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Facebook</label>
                        <input type="text" name="facebook" value="<?php
                        if (isset($nurses['facebook'])) {
                            echo $nurses['facebook'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Twitter</label>
                        <input type="text" name="twitter" value="<?php
                        if (isset($nurses['twitter'])) {
                            echo $nurses['twitter'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Linked In</label>
                        <input type="text" name="linkedin" value="<?php
                        if (isset($nurses['linkedin'])) {
                            echo $nurses['linkedin'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>City</label>
                        <input type="text" name="city" value="<?php
                        if (isset($nurses['city'])) {
                            echo $nurses['city'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Address</label>
                        <textarea name="address"  rows="3" class="form-control"><?php
                            if (isset($nurses['address'])) {
                                echo $nurses['address'];
                            }
                            ?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Comments</label>
                        <textarea name="comments"  rows="3" class="form-control"><?php
                            if (isset($nurses['comments'])) {
                                echo $nurses['comments'];
                            }
                            ?></textarea>
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label style="width: 100%;">Gender</label>
                        <input type="radio" name="gender[]" value="Male" class="radio-inline" <?php
                        if (isset($nurses['gender']) && $nurses['gender'] == 'Male') {
                            echo 'checked';
                        }
                        ?>><span class="rad-lable">Male</span>
                        <input type="radio" name="gender[]" value="Female" class="radio-inline" <?php
                        if (isset($nurses['gender']) && $nurses['gender'] == 'Female') {
                            echo 'checked';
                        }
                        ?>><span class="rad-lable">Female</span>
                    </div>
                    <input type="hidden" name="photo" value="<?php
                    if (isset($nurses['image'])) {
                        echo $nurses['image'];
                    }
                    echo '...';
                    ?>">
                    <div class="form-action col-lg-12">
                        <input type="submit" name="save" value="Save" class="btn btn-lg btn-info"/>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>