<?php
session_start();
include('dbcon.php');
unset($_SESSION['stat']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #success{
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }
    #success img{
      width:100px;
      height: auto;
      margin-left: 40px;
    }
    a{
        position: relative;
        left:40%;
        color:black;
        font-size: 20px;
        text-decoration: none;
    }
    a:hover{
        color:salmon;
    }
    </style>
    <link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body>
    <div id="success">
        <h1>Order Successfully placed!</h1>
        <img src="images/icons/tickmark.jpg">
    </div>
    <a href="sidebar.php">Continue Designing</a>
</body>
</html>
