<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:home.html');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt="logo display" ></a>
        <div>    
            <ul id="nav">
                <li><a  href="home.php">Home</a></li>
                <li><a href="sidebar.php">Design</a></li>
                <li><a class="active" href="about.php">About Us</a></li>
                <li><a href="bag.php"><i class="far fa-shopping-bag"></i></a></li>
                <li><img src="images/icons/user.png" class="user-pic">
                 <ul>
                 <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="images/icons/user.png"> 
                        <?php
                      if(isset($_SESSION['username'])){
                        echo "<h4>".$_SESSION['username']."</h4>";
                      }
                      ?>
                    </div>
                    <hr>
                    <a href="editprofile.php?id=<?= $uid;?>" class="sub-menu-link">
                       <img src="images/icons/user.png"> 
                        <p>Edit profile</p>
                        <span>></span>
                    </a>
                    <a href="order.php" class="sub-menu-link">
                        <img src="images/icons/myorder.png">  
                        <p>My Orders</p>
                        <span>></span>
                    </a>
                    <a href="#" class="sub-menu-link">
                        <img src="images/icons/fav.png"> 
                        <p>Favourites</p>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img src="images/icons/logout.png"> 
                        <p>Logout</p>
                        <span>></span>
                    </a>
                    </div>
                </div>
            </div>
                </ul>
                 </li>
    
            </ul>
            </div>
        </div>
       </section>
    <h1>This is about us page</h1>
</body>
</html>
