<?php
include_once 'functions.php';
?>
<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <title>Multan Institute of Cordiology</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="css/mic.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <!--[if IE 7]>
    
            <li id=""nk rel="stylesheet" href="css/ie7.css" type="text/css">
    <![endif]-->
</head>
<body>
    <div id="header">
        <div>
            <div class="header-top">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt=""></a>
                </div>
                <div class="header-search">
                    <form method="post" action="search.php">
                        <div class="center-block" style="width:60%">
                            <div class="srch-left">
                                <input class="form-control-custom" type="text" name="disease" value="<?php echo isset($_POST['disease'])?$_POST['disease']:'';?>" placeholder="Search disease or Doctor " required="">
                            </div>
                            <div class="srch-right">
                                <input class="btn btn-success-custom" type="submit" name="search" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="user-menu">
                    <?php if (isset($_SESSION['patientData'])) { ?>
                        <a href="login.php?logout=1" class="login">logout</a>
                    <?php } else { ?>
                        <a href="login.php" class="login">login</a>
                    <?php } ?>

                </div>
            </div>
            <ul>
                <li id="home" class="top-menu">
                    <a href="index.php">home</a>
                </li>
                <li id="about" class="top-menu">
                    <a href="about.php">about</a>
                </li>
                <li id="doctors" class="top-menu">
                    <a href="doctors.php">our doctors</a>
                </li>
                <li id="services" class="top-menu">
                    <a href="services.php">services</a>
                </li>
                <li id="departments" class="top-menu">
                    <a href="departments.php">departments</a>
                </li>
                <li id="diseases" class="top-menu">
                    <a href="diseases.php">diseases</a>
                </li>
                <li id="contact" class="top-menu">
                    <a href="contact.php">contact</a>
                </li>
                <?php if (isset($_SESSION['patientData'])) { ?>
                <li id="user"class="top-menu">
                        <a href="user.php">user</a>
                    </li>
                <?php } else { ?>
                    <li class="top-menu">
                        <a id="log_in" href="login.php">login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>