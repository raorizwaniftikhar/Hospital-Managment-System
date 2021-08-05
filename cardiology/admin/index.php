<?php
include 'header.php';
        if(!adminLogin()){
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
include 'sidebar.php';

if (isset($_POST['heading'])) {
    $home_data['name'] = $_POST['heading'];
    $home_data['value'] = $_POST['text'];
    $where = "where ref = 'home'";
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

                $newwidth = 220;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);



                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);



                $filename = '../images/uploads/' . $_FILES['image']['name'];
                $name = $_FILES['image']['name'];
                if (file_exists('../images/uploads/' . $data[4]['image'])) {
                    unlink('../images/uploads/' . $data[4]['image']);
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
            }
        }
        $home_data['image'] = $name;
    }

    updateData('options', $home_data, $where);
    $home_data1['value'] = $_POST['mission'];
    $where = "where ref = 'mission'";
    updateData('options', $home_data1, $where);
    $data = getData();
}
?>

<script type="text/javascript">
 $("#home").addClass("active");
 $(document).ready(function(){
	document.title = "Home Page: Admin Panel"; 
 });
</script>
<style>
    textArea{
        text-align: justify;
    }
    .btn{
        float: right;
    }
</style>
<div class="content">
    <div class="header">
        <h1 class="page-title">Dashboard</h1>
        <ul class="breadcrumb">
            <li>Website</li>
            <li  class="active"><a href="index.php">Home</a></li>
        </ul>
		<title>Home</title>
    </div>
    <div class="main-content">

        <div class="row">
            <div class="col-md-8">
                <br>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="home">
                        <form id="home_form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Heading</label>
                                <input type="text" name="heading" value="<?php echo $data[4]['name']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Text</label>
                                <textarea name="text" value="" rows="10" class="form-control"><?php echo $data[4]['value']; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>


                            <hr>
                            <div class="form-group">
                                <label>Mission Statement</label>
                                <textarea name="mission" value="" rows="10" class="form-control"><?php echo $data[0]['value']; ?></textarea>
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