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
?>







<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<link rel="stylesheet" href="myorder.css">
<link rel="stylesheet" href="styles.css">
<title>Bag</title>
</head>
<body>
    <section id="header">
        <a href="#"><img src="images/logo.png" class="logo" alt="logo display" ></a>
        <div>
            <ul id="nav">
                <li><a href="home.php">Home</a></li>
                <li><a  href="sidebar.php">Design</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a class="active" href="bag.php"><i class="far fa-shopping-bag"></i></a></li>
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
                            <td>Remove</td>
                            <td>Image</td>
                            <td>Size</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Subtotal</td>
                            <td>Save</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                include('dbcon.php');
                                $i=0;
                                $ref_table = "images";
                                $fetchdata = $database->getReference($ref_table)->getValue();
                                if($fetchdata>0){
                                    $key =  $database->getReference($ref_table)->getKey();
                                    foreach($fetchdata as $key=>$row){
                                    if($row['username']==$username){
                                        $i=1;
                                    ?>
                                    <form action="code.php" method="post">
                                    <tr class="i-row">
                                    <td>
                                    
                                    <input type="hidden" name ="usern" value="<?=$username?>">
                                    <input type="hidden" name="i" value="<?=$key;?>">
                                    <button type="submit" name ="cartdel"><i class="fa fa-trash"></i></button>
                                    
                                    </td>  
                                    <td><img src=<?=$row['image']?>></td>
                                    <td>
                                     <select name ="selectname">
                                      <?php
                                      if($row['size']=='S'){
                                        ?>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <?php
                                      }
                                      elseif($row['size']=='M'){
                                        ?>
                                        <option value="M">M</option>
                                        <option value="S">S</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <?php
                                      }
                                      elseif($row['size']=='L'){
                                        ?>
                                        <option value="L">L</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <?php
                                      }
                                      
                                      elseif($row['size']=='XL'){
                                        ?>
                                        <option value="XL">XL</option>
                                        <option value="S">S</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="XXL">XXL</option>
                                        <?php
                                      }
                                    
                                      elseif($row['size']=='XXL'){
                                        ?>
                                        <option value="XXL">XXL</option>
                                        <option value="S">S</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="M">M</option>
                                        <?php
                                      }
                                      ?>
                                      
                                     </select>
                                    </td>
                                    <td>600<input type="hidden" class="iprice" value="600"></td>
                                    <td>
                                      <input type="number" class="counter" name="counter" onchange="subTotal()" value="<?=$row['quantity']?>" min="1">
                                    </td>
                                    <td class="subtotal">
                                    </td>
                                    <td><button type="submit" name ="saveoo" >Save</button></td>
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
            <section id="cart-add">
                <div id="subtotal">
                    <h3>Cart Total</h3>
                    <table>
                        <tr>
                            <td>Cart Subtotal</td>
                            <td id="cheedu"><strong>$total</strong></td>
                                <input type="hidden" name="tprice" id="stprice" value>
                            
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td id="praneeth"><strong>$total</strong></td>
                                <input type="hidden" name="tprice" id="tprice" value>
                        </tr>
                    </table>
                    <?php
                     if ($i==1){
                    ?>
                   <a href="myorders.php" >Proceed to checkout</a>
                   <?php
                     }
                     else{
                   ?>
                   <a href="bag.php" >Proceed to checkout</a>
                   <?php
                     }
                   ?>
                </div>
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
    var p=document.getElementById('cheedu');
    console.log(price);
   function subTotal(){
    t=0;
    for(j=0;j<price.length;j++){
        subtotal[j].innerText=(price[j].value)*(count[j].value);
        t =t+(price[j].value)*(count[j].value);
    }
    prnnu.innerText=t;
    p.innerText=t;
    document.getElementById('tprice').value=t;
    document.getElementById('stprice').value=t;
    }
    subTotal();

    
 </script>  
 </body>
 </html> 
