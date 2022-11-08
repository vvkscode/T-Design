<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['username'])){
    header('location:home.html');
  }
else{
    $uid= $_SESSION['verified_user_id'];
    $username=$_SESSION['username'];
}
$_SESSION['stat']="go to user page";
if(isset($_SESSION['order_status'])){
    $message =$_SESSION['order_status'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['order_status']);
}

?>







<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="myorder.css">
<link rel="stylesheet" href="styles.css">
<link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<title>My Orders</title>
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt="logo display" ></a>
        <div>
            <ul id="nav">
                <li><a href="home.php">Home</a></li>
                <li><a  href="sidebar.php">Design</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a  href="bag.php"><i class="far fa-shopping-bag"></i></a></li>
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
            </ul>
            </ul>
        </div>
    </section>
<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="col-25">
            <section id="cart" class="section-p1">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Order</td>
                            <td>size</td>
                            <td>quantity</td>
                            <td>Cancel Order</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                include('dbcon.php');
                                $ref_table = "orders";
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                if($fetchdata>0){
                                    $key =  $database->getReference($ref_table)->getKey();
                                    $i=0;
                                    foreach($fetchdata as $key=>$row){
                                    $i++;
                                    if($row['username']==$username){
                                    ?>
                                    <form action="code.php" method="post">
                                    <tr class="i-row">
                                    <input type="hidden" name="i" value="<?=$key?>">
                                    <td><img src=<?=$row['image']?>></td>
                                    <td>
                                     <?=$row['size']?>
                                    </td>
                                    <td><?=$row['quantity']?></td>
                                    <td>
                                    <input type="hidden" name ="usern" value="<?=$username?>">
                                    <input type="hidden" name="i" value="<?=$key;?>">
                                    <button type="submit" name ="cancelorder"><img src="images/icons/cross.png" style="width:20px;"></button>
                                    </td>  
                                    </tr>

                                    </form>
                                    <?php
                                    }
                                    }

                                }
                                else{
                                    ?>
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                        
                                    </tr>
                                    <?php
                                }

                                ?>
                    </tbody>
                </table>
                
            </section>
        </div>
    </div>
  </div>   
  <script>
    var t =0;
    var price = document.getElementsByClassName('iprice');
    var count = document.getElementsByClassName('counter');
    var subtotal = document.getElementsByClassName('subtotal');
    var prnnu = document.getElementById('praneeth');
    console.log(price);
   function subTotal(){
    t=0;
    for(j=0;j<price.length;j++){
        subtotal[j].innerText=(price[j].value)*(count[j].value);
        t =t+(price[j].value)*(count[j].value);
    }
    prnnu.innerText=t;
    document.getElementById('tprice').value=t;
    }
    subTotal();

    
 </script>  
 </body>
 </html> 
