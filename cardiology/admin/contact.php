<?php
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }

include 'sidebar.php';

if (isset($_POST['heading'])) {
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        define("MAX_SIZE", "400");

        $errors = 0;
        $image = $_FILES["image"]["name"];
        $uploadedfile = $_FILES['image']['tmp_name'];

        if ($image) {
            $filename = stripslashes($_FILES['image']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                $errors = 1;
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

                $newwidth = 572;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);



                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);



                $filename = '../images/uploads/' . $_FILES['image']['name'];
                $name = $_FILES['image']['name'];
                if(file_exists('../images/uploads/'.$data[1]['image'])){
                    unlink('../images/uploads/'.$data[1]['image']);
                }
                if (file_exists($filename)) {
                    for ($i = 0; $i < 55; $i++) {
                        $filename = '../images/uploads/' .$i."_".$_FILES['image']['name'];
                        $name = $i."_". $_FILES['image']['name'];
                        if (!file_exists($filename)) {
                            break;  
                        }
                    }
                }
                
                imagejpeg($tmp, $filename, 100);

                imagedestroy($src);
                imagedestroy($tmp);
            }
        }
        $where = "where ref = 'contact'";
        $home_data['image'] = $name;
        updateData('options', $home_data, $where);
        }
    
    $home_data1['value'] = $_POST['address'];
    $home_data1['comments'] = $_POST['heading'];
    $where = "where ref = 'address'";
    updateData('options', $home_data1, $where);
    $home_data2['value']= $_POST['phone'];
    $where = "where ref = 'phone'";
    updateData('options', $home_data2, $where);
    $home_data3['value']= $_POST['email'];
    $where = "where ref = 'email'";
    updateData('options', $home_data3, $where);
    $data = getData();
}
?>
<script type="text/javascript">
 $("#contactus").addClass("active");
 $(document).ready(function(){
	document.title = "Contact Us Page: Admin Panel"; 
 });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Dashboard</h1>
        <ul class="breadcrumb">
            <li>Website</li>
            <li  class="active"><a href="contact.php">Contact us</a></li>
        </ul>

    </div>
    <div class="main-content">

        <div class="row">
            <div class="col-md-8">
                <br>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <form id="home_form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <hr>
                            <h3>Side Bar</h3>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="heading" value="<?php echo $data[9]['comments']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="<?php echo $data[9]['value']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone No</label>
                                <input type="tel" name="phone" value="<?php echo $data[2]['value']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" name="email" value="<?php echo $data[10]['value']; ?>" class="form-control">
                            </div>
                            
                            
                        </form>
                    </div>

                </div>

                <div class="btn-toolbar list-toolbar">
                    <a href="javascript:$('#home_form').submit();" class="btn btn-primary"><i class="fa fa-save"></i> Save</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">

        </script>



        <?php
        include 'footer.php';
        ?>