<?php
session_start();
$_SESSION['UserID']='';
unset($_SESSION['UserID']);
session_unset();
session_destroy();
header('location:index.php');
?>