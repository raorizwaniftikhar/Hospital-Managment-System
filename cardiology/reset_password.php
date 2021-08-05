<?php

include 'header.php';
?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Reset your password</p>
        <div class="panel-body">
            <form method="post" action="login.php">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control span12 form-control">
                </div>
                <input type="submit" name="send" value="Resend Password" class="btn btn-primary pull-right">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
            <a href="login.php" style="font-size: .75em; margin-top: .25em;">Sign in to your account</a>
</div>
<?php
include 'footer.php';
?>