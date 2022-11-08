<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['stat'])){
    header("location:home.php");
}
$username = $_SESSION['username'];
?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="myorder.css">
<link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="row">
          <div class="col-50">
            <h2>Shipping Address</h2>
            <form action="code.php" method="post">
               <input type="hidden" name="usern" value="<?=$username;?>">
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Name" Required>
            <label for="email"><i class="fa fa-envelope"></i> Email/phone</label>
            <input type="text" id="email" name="email" placeholder="Email/phone" Required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="street address"Required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City" Required>
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State" Required>
                <label for="zip">Pincode</label>
                <input type="text" id="zip" name="zip" placeholder="Pincode" Required>
          <hr>
          <div class="col-50">
            <h2>Payment Options</h2>
            <div class="paytype">
                <div class="t">
                   <input type="radio" id="cashod" name="paytypecash" value="Cashonndelivery">
                   <label for="cashod">Cash on delivery<img src="images/icons/money.png" style="width:60px;"></label>
                   
               </div> <br>
               <div class="t">
               <input type="radio" id="ccard" name="paytypec" value="Paybyccard">
               <label for="ccard">Pay using card
                  <img src="images/icons/visa.png" style="width:60px;">
                  <img src="images/icons/rupay.png" style="width:60px;">
                  <img src="images/icons/mastercard.png" style="width:60px;">
               </label>
            </div><br>
            <div class="t">
               <input type="radio" id="dcard" name="paytype" value="Paybydcard">
               <label for="dcard">Pay using debit card
                  <img src="images/icons/visa.png" style="width:60px;">
                  <img src="images/icons/rupay.png" style="width:60px;">
                  <img src="images/icons/mastercard.png" style="width:60px;">
               </label>
            </div><br>
            <div class="t">
               <input type="radio" id="upi" name="paytype" value="PaybyUPI">
               <label for="upi">UPI<img src="images/icons/upi.png" style="width:60px;"></label>
            </div>

            </div>
        </div>
        <input type="submit" name="adress"  value="Buy Now" class="btn">
        </form>
    </div>
  </div>
 
</div>
</body>
</html>