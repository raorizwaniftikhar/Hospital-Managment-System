<?php

session_start();
unset($_SESSION['type']);
unset($_SESSION['userData']);
header('location: signin.php')
?>
