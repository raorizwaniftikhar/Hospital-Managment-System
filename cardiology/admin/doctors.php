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
    $where = "where ref = 'doctors'";
    updateData('options', $home_data, $where);

    $home_data1['name'] = $_POST['heading1'];
    $home_data1['value'] = $_POST['text1'];
    $where = "where ref = 'nurses'";
    updateData('options', $home_data1, $where);
    $data = getData();
}
?>
<script type="text/javascript">
 $("#doctors").addClass("active");
 $(document).ready(function(){
	document.title = "Our Doctors Page: Admin Panel"; 
 });
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Dashboard</h1>
        <ul class="breadcrumb">
            <li>Website</li>
            <li  class="active"><a href="doctors.php">Doctors</a></li>
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
                                <label>Heading</label>
                                <input type="text" name="heading" value="<?php echo $data[7]['name']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Text</label>
                                <textarea name="text" value="" rows="10" class="form-control"><?php echo $data[7]['value']; ?></textarea>
                            </div>


                            <hr>
                            <h3>Nurses</h3>
                            <div class="form-group">
                                <label>Heading</label>
                                <input type="text" name="heading1" value="<?php echo $data[8]['name']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Text</label>
                                <textarea name="text1" value="" rows="10" class="form-control"><?php echo $data[8]['value']; ?></textarea>
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