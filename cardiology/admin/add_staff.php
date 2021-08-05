<?php
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';
if (isset($_POST['save'])) {
    $staff_data = array();
    $staff_data = $_POST;
    unset($staff_data['gender']);
    if ($staff_data['post'] == '')
        $staff_data['post'] = $staff_data['post1'];
    unset($staff_data['save']);
    unset($staff_data['post1']);
     $errors = 0;
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

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
                $staff_data['image'] = $name;
            }
        }
    }
    unset($staff_data['photo']);
    $staff_data['gender'] = $_POST['gender'][0];
//    prnt($staff_data);
    if (!$errors) {
        if (isset($_GET['id'])) {
            updateData('staff', $staff_data, ' where id = ' . $_GET['id']);
            $message = "your data is updated Successfully";
        } else {
            insertData('staff', $staff_data);
            $message = "your data is saved Successfully";
        }
    }
}
if (isset($_GET['id'])) {
    $staff = getData('staff', '*', 'where id = ' . $_GET["id"]);
    $staff = $staff[0];
//    prnt($staff);
}
?>
<script type="text/javascript">
 $("#view_staff").addClass("active");
 $(document).ready(function () {
        document.title = "Add/Edit Staff: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Staff</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_staff.php">Staff</a></li>
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
                        if (isset($staff['name'])) {
                            echo $staff['name'];
                        }
                        ?>" class="form-control" name="name">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Father Name</label>
                        <input type="text" name="fname" value="<?php
                        if (isset($staff['fname'])) {
                            echo $staff['fname'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php
                        if (isset($staff['email'])) {
                            echo $staff['email'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Phone</label>
                        <input type="tel" name="phone" value="<?php
                        if (isset($staff['phone'])) {
                            echo $staff['phone'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Mobile</label>
                        <input type="tel" name="mobile" value="<?php
                        if (isset($staff['mobile'])) {
                            echo $staff['mobile'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>CNIC</label>
                        <input type="tel" name="cnic" value="<?php
                        if (isset($staff['cnic'])) {
                            echo $staff['cnic'];
                        }
                        ?>" class="form-control">
                    </div>


                    <div class="form-group col-lg-6">
                        <label style="width: 100%;">Qualification</label>
                        <input type="text" name="qualification" value="<?php
                        if (isset($staff['qualification'])) {
                            echo $staff['qualification'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Institute</label>
                        <input type="text" name="institute" value="<?php
                        if (isset($staff['institute'])) {
                            echo $staff['institute'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Speciality</label>
                        <input type="text" name="speciality" value="<?php
                        if (isset($staff['speciality'])) {
                            echo $staff['speciality'];
                        }
                        ?>" class="form-control">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Designation</label>
                        <input type="text" name="designation" value="<?php
                        if (isset($staff['designation'])) {
                            echo $staff['designation'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Facebook</label>
                        <input type="text" name="facebook" value="<?php
                        if (isset($staff['facebook'])) {
                            echo $staff['facebook'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Twitter</label>
                        <input type="text" name="twitter" value="<?php
                        if (isset($staff['twitter'])) {
                            echo $staff['twitter'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Linked In</label>
                        <input type="text" name="linkedin" value="<?php
                        if (isset($staff['linkedin'])) {
                            echo $staff['linkedin'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>City</label>
                        <input type="text" name="city" value="<?php
                        if (isset($staff['city'])) {
                            echo $staff['city'];
                        }
                        ?>" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Address</label>
                        <textarea name="address"  rows="3" class="form-control"><?php
                            if (isset($staff['address'])) {
                                echo $staff['address'];
                            }
                            ?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Comments</label>
                        <textarea name="comments"  rows="3" class="form-control"><?php
                            if (isset($staff['comments'])) {
                                echo $staff['comments'];
                            }
                            ?></textarea>
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Post (+Add New)</label>
                        <input type="text" name="post" value="" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Post(Select)</label>
                        <select class="form-control" name="post1">
                            <?php
                            $options = getData('staff', 'distinct post');
                            foreach ($options as $option) {
                                ?>
                                <option value="<?php echo $option['post']; ?>" 
                                <?php
                                if (isset($staff['post']) && $staff['post'] == $option['post']) {
                                    echo 'selected';
                                }
                                ?>
                                        ><?php echo $option['post']; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-12 ">
                        <label style="width: 100%;">Gender</label>
                        <input type="radio" name="gender[]" value="Male" class="radio-inline" <?php
                        if (isset($staff['gender']) && $staff['gender'] == 'Male') {
                            echo 'checked';
                        }
                        ?>><span class="rad-lable">Male</span>
                        <input type="radio" name="gender[]" value="Female" class="radio-inline" <?php
                        if (isset($staff['gender']) && $staff['gender'] == 'FeMale') {
                            echo 'checked';
                        }
                        ?>><span class="rad-lable">FeMale</span>
                    </div>
                    <input type="hidden" name="photo" value="<?php
                    if (isset($staff['image'])) {
                        echo $staff['image'];
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