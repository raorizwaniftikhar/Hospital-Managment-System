<?php
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';
if (isset($_POST['save'])) {
    $deprtment_data = array();
    $deprtment_data = $_POST;
    unset($deprtment_data['save']);
    $errors = 0;
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        define("MAX_SIZE", "1400");

        
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
                    $message = 'File size exceeded';
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

                $newwidth = 570;
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
                $deprtment_data['image'] = $name;
            }
        }
    }
    unset($deprtment_data['photo']);
//    prnt($deprtment_data);
    if (!$errors) {
        if (isset($_GET['id'])) {
            updateData('diseases', $deprtment_data, ' where id = ' . $_GET['id']);
            $message = "your data is updated Successfully";
        } else {
            insertData('diseases', $deprtment_data);
            $message = "your data is saved Successfully";
        }
    }
}
if (isset($_GET['id'])) {
    $deprtment = getData('diseases', '*', 'where id = ' . $_GET["id"]);
    $deprtment = $deprtment[0];
//    prnt($deprtment);
}
?>
<script type="text/javascript">
 $("#view_diseases").addClass("active");
 $(document).ready(function () {
        document.title = "Add/Edit Diseases: Admin Panel";
    });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Diseases</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="view_diseases.php">diseases</a></li>
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
                        if (isset($deprtment['name'])) {
                            echo $deprtment['name'];
                        }
                        ?>" class="form-control" name="name">
                    </div>
                    <div class="form-group col-lg-6 ">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Description</label>
                        <textarea name="description"  rows="3" class="form-control"><?php
                            if (isset($deprtment['description'])) {
                                echo $deprtment['description'];
                            }
                            ?></textarea>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Comments</label>
                        <textarea name="comments"  rows="3" class="form-control"><?php
                            if (isset($deprtment['comments'])) {
                                echo $deprtment['comments'];
                            }
                            ?></textarea>
                    </div>
                    
                    
                    <input type="hidden" name="photo" value="<?php
                    if (isset($deprtment['image'])) {
                        echo $deprtment['image'];
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