<?php
session_start();
include('dbcon.php');
if(isset($_POST['login_now_admin_btn'])){
    if($_POST['email']=="admin@gmail.com"&&$_POST['password']=="123"){
        $_SESSION['admin_status']="on";
        header("location:admin.php");
    }
    else{
        $_SESSION['admin']="invalid credentials";
        header('location:adminlogin.php');
    }
}

if(isset($_POST['login_now_btn'])){
    $email= $_POST['email'];
    $password = $_POST['password'];
    $ref_table = "contacts";
    $fetchdata = $database->getReference($ref_table)->getValue();
                                
    if($fetchdata>0){
        foreach($fetchdata as $key=>$row){
            if($row['email']==$email){
                $pass = $row['password'];
                $username = $row['username'];
            }
        }
    }
    $checpass = password_verify($password,$pass);
    if(!($checpass)){
        $_SESSION['status']= "invalid password or email";
       
        header("location:login.php");
        exit();
    }
    else{
        try {
            $user = $auth->getUserByEmail($email);
                $signInResult = $auth->signInWithEmailAndPassword($email, $password);
            $idTokenString =$signInResult->idToken();
            try {
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');
                $_SESSION['verified_user_id']=$uid;
                $_SESSION['idTokenString']=$idTokenString;
                $_SESSION['username']=$username;
               header("location:home.php");
           exit();
            } catch (FailedToVerifyToken $e) {
                echo 'The token is invalid: '.$e->getMessage();
            }
            
        } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
           $_SESSION['status']= "user not found";
           header("location:login.php");
           exit();
        }
    }
    
}
?>