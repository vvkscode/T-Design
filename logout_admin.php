<?php
session_start();
unset($_SESSION['admin_status']);
    header('location:adminlogin.php');
    exit();
?>