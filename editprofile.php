<?php
session_start();
if(isset($_SESSION['profile_status'])){
   $message=$_SESSION['profile_status'];
   echo "<script>alert('$message')</script>";
   unset($_SESSION['profile_status']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="edit.css">
   <link rel="icon" type="image/png" sizes="32x32" href="images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


</head>
<body>
   
<div class="update-profile">

   <form action="code.php" method="post">
      <?php
   include('dbcon.php');
    $ref_table = "contacts";
    $fetchdata = $database->getReference($ref_table)->getValue();
                                
    if($fetchdata>0){
        foreach($fetchdata as $key=>$row){
            if($row['username']==$_SESSION['username']){
                $pass = $row['password'];
                $k =$key;
                $username = $row['username'];
                $pass =$row['password'];
            }
        }
    }
    ?>
   <?php
    include('dbcon.php');
    if(isset($_GET['id'])){
        $uid =$_GET['id'];
        $username = $_SESSION['username'];
        try {
            $user = $auth->getUser($uid);
            ?>
            <div class="flex">
         <div class="inputBox">
            <input type="hidden" name ="data_key" value ="<?= $k; ?>">
            <input type="hidden" name ="user_id" value="<?=$uid;?>">
            <span>username :</span>
            <input type="text" name="update_name" value="<?= $username;?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?= $user->email?>" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?=$pass;?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
         </div>
      </div>
      <?php

        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
            echo $e->getMessage();
        }
    }
    ?>
    
      
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>