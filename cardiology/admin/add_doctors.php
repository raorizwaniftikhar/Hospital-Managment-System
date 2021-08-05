<?php
include 'header.php';
if (!adminLogin() && !doctorLogin()) {
    echo '<script type=text/javascript> location.href = "logout.php" </script>';
    exit;
}
if (doctorLogin()) {
    if (!isset($_GET['id']) || !doctorLogin($_GET['id'])) {
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
}
include 'sidebar.php';

if (isset($_POST['save'])) {
    $doctors_data = array();
    $doctors_data = $_POST;
    unset($doctors_data['gender']);
    unset($doctors_data['save']);
    $errors = 0;
	if (isset($_GET['id'])) {
		if (isset($doctors_data['email']) && !valid_email($doctors_data['email'], 'doctors', $_GET['id'])) {
			$message = 'This Email is already in use.';
			$errors = 1;
		}
	} else {
		if (isset($doctors_data['email']) && !valid_email($doctors_data['email'], 'doctors')) {
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
                echo 'Invalid Image!';
            } else {
                $size = filesize($_FILES['image']['tmp_name']);

                if ($size > MAX_SIZE * 1024) {
                    $errors = 1;
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
                $doctors_data['image'] = $name;
            }
        }
    }
    unset($doctors_data['photo']);
	if(isset($_POST['gender']))
    $doctors_data['gender'] = $_POST['gender'][0];
//    prnt($doctors_data);
    if (!$errors) {
        if (isset($_GET['id'])) {
            updateData('doctors', $doctors_data, ' where id = ' . $_GET['id']);
            $message = "your data is updated Successfully";
        } else {
            insertData('doctors', $doctors_data);
            $message = "your data is saved Successfully";
        }
    }
}
if (isset($_GET['id'])) {
    $doctors = getData('doctors', '*', 'where id = ' . $_GET["id"]);
    $doctors = $doctors[0];
//    prnt($doctors);
}
?>
<script type="text/javascript">
    $("#view_doctors").addClass("active");
	$(document).ready(function () {
        document.title = "Add/Edit Doctors: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Doctors</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_doctors.php">Doctors</a></li>
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
                        if (isset($doctors['name'])) {
                            echo $doctors['name'];
                        }
						?>" class="form-control" name="name" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Father Name</label>
                        <input type="text" name="fname" value="<?php
                        if (isset($doctors['fname'])) {
                            echo $doctors['fname'];
                        }
						?>" class="form-control" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php
                        if (isset($doctors['email'])) {
                            echo $doctors['email'];
                        }
						?>" class="form-control" required="">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Phone</label>
                        <input type="tel" name="phone" value="<?php
                        if (isset($doctors['phone'])) {
                            echo $doctors['phone'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Mobile</label>
                        <input type="tel" name="mobile" value="<?php
                        if (isset($doctors['mobile'])) {
                            echo $doctors['mobile'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>CNIC</label>
                        <input type="tel" name="cnic" value="<?php
                        if (isset($doctors['cnic'])) {
                            echo $doctors['cnic'];
                        }
                        ?>" class="form-control">
                    </div>


                    <div class="form-group col-lg-6">
                        <label style="width: 100%;">Qualification</label>
                        <input type="text" name="qualification" value="<?php
                        if (isset($doctors['qualification'])) {
                            echo $doctors['qualification'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Institute</label>
                        <input type="text" name="institute" value="<?php
                        if (isset($doctors['institute'])) {
                            echo $doctors['institute'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Speciality</label>
                        <input type="text" name="speciality" value="<?php
                        if (isset($doctors['speciality'])) {
                            echo $doctors['speciality'];
                        }
                        ?>" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Designation</label>
                        <input type="text" name="designation" value="<?php
                        if (isset($doctors['designation'])) {
                            echo $doctors['designation'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Facebook</label>
                        <input type="text" name="facebook" value="<?php
                        if (isset($doctors['facebook'])) {
                            echo $doctors['facebook'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Twitter</label>
                        <input type="text" name="twitter" value="<?php
                        if (isset($doctors['twitter'])) {
                            echo $doctors['twitter'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Linked In</label>
                        <input type="text" name="linkedin" value="<?php
                        if (isset($doctors['linkedin'])) {
                            echo $doctors['linkedin'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>City</label>
                        <input type="text" name="city" value="<?php
                        if (isset($doctors['city'])) {
                            echo $doctors['city'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Address</label>
                        <textarea name="address"  rows="3" class="form-control"><?php
                            if (isset($doctors['address'])) {
                                echo $doctors['address'];
                            }
                            ?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Comments</label>
                        <textarea name="comments"  rows="3" class="form-control"><?php
                            if (isset($doctors['comments'])) {
                                echo $doctors['comments'];
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
                        if (isset($doctors['gender']) && $doctors['gender'] == 'Male') {
                            echo 'checked';
                        }
                        ?>><span class="rad-lable">Male</span>
                        <input type="radio" name="gender[]" value="Female" class="radio-inline" <?php
                        if (isset($doctors['gender']) && $doctors['gender'] == 'FeMale') {
                            echo 'checked';
                        }
                        ?>><span class="rad-lable">FeMale</span>
                    </div>
                    <input type="hidden" name="photo" value="<?php
                    if (isset($doctors['image'])) {
                        echo $doctors['image'];
                    }
                    echo '...';
                    ?>">
                    <div class="form-action col-lg-12">
                        <input type="submit" name="save" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>