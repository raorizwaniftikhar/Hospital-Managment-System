<?php
if(isset($_GET['logout'])){
    session_start();
    unset($_SESSION['patientData']);
    session_destroy();
    header("location: index.php");
}

if (isset($_POST['login'])) {
    include_once 'functions.php';
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    if ($email && $password) {
        $where = ' where email = \'' . $email . '\' and password = \'' . $password . '\'';
        $userData = getData('patients', '*', $where, '', ' limit 1');
        if (sizeof($userData) > 0) {
            $_SESSION['patientData'] = $userData[0];
            header('location: user.php');
        }
 else {
     echo '<script>alert("Incorect Email or Password");</script>';    
 }
    }
 else {
    echo '<script>alert("Please enter valid email and password");</script>';    
    }
}
else {
//    unset($_SESSION['patient']);
//    session_destroy();
}
include 'header.php';
?>
<script type="text/javascript">
    $("#log_in").addClass("selected");
</script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <div class="dialog">
        <div class="panel panel-default">
            <p class="panel-heading no-collapse">Sign In</p>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label title="Enter your email">Email</label>
                        <input type="email" name="email" class="form-control span12" required>
                    </div>
                    <div class="form-group">
                        <label title="If you did't changed you password then it is '123'">Password (Default is '123')</label>
                        <input type="password" name="password" class="form-control span12 form-control" required>
                    </div>
                    <input type="submit" name="login" class="btn btn-primary pull-right" value="Login">
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
        <span class="pull-right"><a href="reset_password.php">Forgot your password?</a></span>
        
    </div>
<?php
include 'footer.php';
?>