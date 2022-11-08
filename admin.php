<?php
session_start();
if(!isset($_SESSION['admin_status'])){
    header("location:adminlogin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="admin.css">
<title>Admin</title>
</head>
<body>
    <form action="logout_admin.php" method="post">
<button type="submit" name="logout_admin" id="out">logout</button>
</form>
<div class="row">
  <div class="col-75">
    <div class="container">
        <div class="col-25">
            <section id="cart" class="section-p1">
                <table width="100%">
                    <thead>
                        <tr>
                            <td>Username</td>
                            <td>Shipping details</td>
                            <td>Image</td>
                            <td>Size</td>
                            <td>Quantity</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                include('dbcon.php');
                                       $ref = "orders";
                                       $fetchdat = $database->getReference($ref)->getValue();
                                       if($fetchdat>0){
                                        foreach($fetchdat as $key =>$col){
                                            
                                                ?>
                                                <tr>
                                                    <td><?=$col['username'];?></td>
                                                    <td>
                                                        <ul id="details">
                                                            <li><u>Email</u> :&emsp;<?=$col['email'];?></li>
                                                            <li><u>Address</u> :&emsp;<?=$col['address']?></li>
                                                            <li><u>City</u> :&emsp;<?=$col['city']?></li>
                                                            <li><u>State</u> :&emsp;<?=$col['state']?></li>
                                                            <li><u>Pincode</u> :&emsp;<?=$col['pincode']?></li>
                                                        </ul>
                                                    </td>
                                                    <td><img src=<?=$col['image'];?>></td>
                                                    <td><?=$col['size']?></td>
                                                    <td><?=$col['quantity']?></td>
                                                </tr>
                                                <?php

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