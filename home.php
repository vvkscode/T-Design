<?php
include('dbcon.php');
session_start();
if(!isset($_SESSION['username'])){
  header('location:home.html');
}
else{
  $uid= $_SESSION['verified_user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

<link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body>
   <section id="header">
    <a href="#"><img src="images/logo.png" class="logo" alt="logo display" ></a>
    <div>    
        <ul id="nav">
            <li><a class="active" href="home.php">Home</a></li>
            <li><a href="sidebar.php">Design</a></li>
            <li><a href="about.php">About Us</a></li>
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
   <section id="homemain">
    <h1>Customize your <br>T-Shirts</h1>
    <h3><i>By your own creativity</i></h3>
    <button><a href="sidebar.php">Start Designing</a></button>
   </section>
   <section id="popular" class="sec-p1">
    <h1>Our Popular T-shirt ideas</h1>
     <div class="popbox">
        <img src="images/popular/ts1.jpg" alt="t-shirt">
        <img src="images/popular/ts2.jpg" alt="t-shirt">
        <img src="images/popular/ts3.jpeg" alt="t-shirt">
        <img src="images/popular/ts1.jpg" alt="t-shirt">
     </div>
   </section>
   <footer class="foot">
    <ul>
        <li><p>Follow us:</p></li>
        <li><a href="" >Instagram<img src="images/icons/insta.png"></a></li>
        <li><a href="" >Facebook<img src="images/icons/facebook.png"></a></li>
        <li><a href="" >Twitter<img src="images/icons/twitter.png"></a></li>
    </ul>
    <ul>
        <li><p>Contact us:</p></li>
        <li><p>Gmail: a_koushik@cs.iitr.ac.in</p></li>
        <li><p>Phone no.:6301861988</p></li>
    </ul>
    </footer>
</body>
</html>
