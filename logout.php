<?php
session_start();
unset($_SESSION['verified_user_id']);
unset($_SESSION['idTokenString']);
unset($_SESSION['username']);
$_SESSION['status']= "Logged out succesfully";
header("location:login.php");
exit();
?>