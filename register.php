<?php
session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="scripts.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body>
    <main>
        <section id="signup">
           <div class="logo">
               <img src="images\logo.png" alt="logo" >
           </div>
           <div class="row">
               <div class="colm-form">
                  <div class="form-container">
                  <?php
                        if(isset($_SESSION['status'])){
                            echo "<h4>" .$_SESSION['status']."</h4>";
                            unset($_SESSION['status']);
                        }
                        ?>
                      <h1>Create your account</h1>
                      <form action="code.php" method="post">
                         <input type="text" placeholder="Username" name="username" required>
                         <input type="text" placeholder="Email address " name="Email" required>
                         <input type="password" placeholder="Create Password" name="upassword" id="bpassword" required>
                         <span class="eye1"><i class="fa fa-eye" aria-hidden="true"  onclick="toggle(2)" ></i></span>
                         <input type="password" placeholder="Confirm Password" name ="cpass" id="cpassword"  required>
                         <span class="eye2"><i class="fa fa-eye" aria-hidden="true"  onclick="toggle(3)" ></i></span> 
                        <button class="btn-signup" value="click" name="register_data">Sign-Up</button>
                      </form>
                      <a href="login.php">Already a user?</a>
                  </div>
               </div>
           </div>
        </section>
                    
    </main>
<?php
include('includes/footer.php');
?>