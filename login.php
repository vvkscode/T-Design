<?php
session_start();
if(isset($_SESSION['verified_user_id'])){
$_SESSION['status']= "You are already logged in ";
       header("location:home.php");
       exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Signin DesignTS</title>
    <link rel="stylesheet" href="signin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
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
                        if(isset($_SESSION['status'])){
                            echo "<h4 style='color:rgb(248, 76, 76)'>" .$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                        ?>
                      <h1>Sign In</h1>
                      <form action="login-code.php" method="post">
                      <input type="email" placeholder="Email Address" name="email" required>
                      <input type="password" placeholder="Password" name="password" id="password" required>
                      <span><i class="fa fa-eye" aria-hidden="true"  onclick="toggle(1)" ></i></span>
                      <button class="btn-login" name="login_now_btn" >Login</button>      
                      </form>
                      <a href="forgotpassword.html">Forgotten password?</a>
                      <a href="adminlogin.php">Admin Login</a>
                      <a href="register.php"><button class="btn-new">Create New Account </button></a>
                  </div>
              </div>
           </div>
        </section>
    </main>
<?php
include('includes/footer.php');
?>
</body>
</html>