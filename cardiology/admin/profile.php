<?php
include 'header.php';
if (!adminLogin() && !doctorLogin()) {
    echo '<script type=text/javascript> location.href = "logout.php" </script>';
    exit;
}
if (doctorLogin()) {
    if (!isset($_GET['doc_id']) || !doctorLogin($_GET['doc_id'])) {
        echo '<script type=text/javascript> location.href = "logout.php" </script>';
        exit;
    }
}
include 'sidebar.php';
if (isset($_POST['save'])) {
    $userData['name'] = trim($_POST['name']);
    $userData['password'] = trim(md5($_POST['password']));
    if ($_POST['password'] != '' && $_POST['password'] == $_POST['cpassword']) {
        updateData('users', $userData, ' where id = ' . $_SESSION['userData']['id']);
        $userData['id'] = $_SESSION['userData']['id'];
        $userData['email'] = $_SESSION['userData']['email'];
        $_SESSION['userData'] = $userData;
        $message = "Your data is updated Successfully";
    } else {
        if ($userData['name'] == '') {
            $message = "Inavalid name";
        } else {
            $message = "Password's did not matches";
        }
    }

    if (isset($message)) {
        echo "<script>alert('" . $message . "');</script>";
    }
}
?>
<script type="text/javascript">
    $("#profile").addClass("active");
</script>
<div class="content">
    <div class="header">
        <h1 class="page-title">Dashboard</h1>
        <ul class="breadcrumb">
            <li>Management</li>
            <li  class="active"><a href="profile.php<?php echo isset($_GET['doc_id'])?'?doc_id='.$_GET['doc_id']:'';?>">Profile</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <form class="" method="post">
                    <div class="form-group col-lg-12">
                        <label>Name</label>
                        <input type="text" value="<?php echo $_SESSION['userData']['name']; ?>" class="form-control" name="name">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Confirm-Password</label>
                        <input type="password" class="form-control" name="cpassword">
                    </div>

                    <div class="form-action col-lg-12">
                        <input type="submit" name="save" value="Save" class="btn btn-sm btn-info"/>
                    </div>
                </form>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>