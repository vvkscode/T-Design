<?php
session_start();
include('dbcon.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Signin DesignTS</title>
    <link rel="stylesheet" href="adminlogin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script type="text/javascript" src="scripts.js"></script>
</head>
<body>
<main>
        <section id="signin">
            <div class="logo">
                <img src="images\logo.png" alt="logo" >
            </div>
           <div class="row" >
              <div class="colm-form">
                  <div class="form-container">
                  <?php
                        if(isset($_SESSION['admin'])){
                            echo "<h4 style='color:rgb(248, 76, 76)'>" .$_SESSION['admin']."</h4>";
                            unset($_SESSION['admin']);
                        }
                        ?>
                      <h1>Admin Login</h1>
                      <form action="login-code.php" method="post">
                      <input type="email" placeholder="Email Address" name="email" required>
                      <input type="password" placeholder="Password" name="password" id="password" required>
                      <span><i class="fa fa-eye" aria-hidden="true"  onclick="toggle(1)" ></i></span>
                      <button class="btn-login" name="login_now_admin_btn" >Login</button>      
                      </form>
                      <a href="forgotpassword.html">Forgotten password?</a>
                      <a href="login.php">User Login</a>
                  </div>
              </div>
           </div>
        </section>
    </main>
</body>
</html>