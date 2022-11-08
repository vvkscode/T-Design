<?php
session_start();
include('dbcon.php');
if(isset($_POST['cancelorder'])){
    $id = $_POST['i'];
    $ref_table = "orders/".$id;
    $deletequery=$database->getReference($ref_table)->remove();
    if($deletequery){
        $_SESSION['order_status']="order cancelled succesfully";
        header("Location:order.php");
       
    }
    else{
        header("Location:order.php");
    }

}
if(isset($_POST['saveoo'])){
    $id = $_POST['i'];
    $size= $_POST['selectname'];
    $quantity= $_POST['counter'];
    $updateData = [
        "size"=>$size,
        "quantity"=>$quantity,
    ];
    $ref_table ="images/".$id;
   $updatequery=  $database->getReference($ref_table) 
   ->update($updateData);
   if($updatequery){
    header("Location: bag.php");
    }
    else{
        $_SESSION['status']= "Data not updated";
        header("Location: bag.php");
    }
}
if(isset($_POST['adress'])){
    $username = $_POST['usern'];
     $fullname=$_POST['firstname'];
     $email = $_POST['email'];
     $address =$_POST['address'];
     $city = $_POST['city'];
     $state = $_POST['state'];
     $pincode =$_POST['zip'];
     $ref_table = "images";
     $fetchdata = $database->getReference($ref_table)->getValue();
        if($fetchdata>0){
                    foreach($fetchdata as $key=>$row){
                            if($row['username']==$username){
                                $image = $row['image'];
                                $size  = $row['size'];
                                $quantity = $row['quantity'];
                                $postData = [
                                    "username"=>$username,
                                    "fullname"=>$fullname,
                                    "email"=>$email,
                                    "address"=>$address,
                                    "city"=>$city,
                                    "state"=>$state,
                                    "pincode"=>$pincode,
                                    "image" =>$image,
                                    "size"=>$size,
                                    "quantity"=>$quantity,
                                ];
                                $ref ="orders";
                                $postRef = $database->getReference($ref)->push($postData);
                            }
                        }
                        if(isset($_POST['paytypecash'])){
                            header("Location: finalpage.php");
                        }
                        else if(isset($_POST['paytypec'])){
                            header("location:payment.php");
                        }
     }

    else{
        $_SESSION['status']="ORDER NOT TAKEN";
        header("Location: myorders.php");
    }

}
if(isset($_POST['cartdel'])){
    $id = $_POST['i'];
    $ref_table = "images/".$id;
    $deletequery=$database->getReference($ref_table)->remove();
    if($deletequery){
        header("Location:bag.php");
    }
    else{
        header("Location:bag.php");
    }

}

if(isset($_POST['save'])){
    $image = $_POST['userimage'];
    $username = $_POST['username'];
    $size =$_POST['tshirt'];
    $quantity="1";

    $postData = [
        "username" =>$username,
        "image" =>$image,
        "size"=> $size,
        "quantity"=>$quantity,
    ];
    $ref_table ="images";
    $postRef = $database->getReference($ref_table)->push($postData);
    if($postRef){
        $_SESSION['bag_status']= "Added to Bag Succesfully";
        
    }
    else{
        $_SESSION['bag_status']="Not Added To Bag";
    }
     header('location:sidebar.php');
}

if(isset($_POST['update_profile'])){
    $id =$_POST['data_key'];
    $ui = $_POST['user_id'];
    $username= $_POST['update_name'];
    $email= $_POST['update_email'];
    $oldpass = $_POST['old_pass'];
    $upass=$_POST['update_pass'];
    $npass =$_POST['new_pass'];
    $nhaspass=password_hash($npass,PASSWORD_DEFAULT);
    $checpass = password_verify($upass,$oldpass);
    
    if(empty($upass)&&empty($npass)){
        $uid = $ui;
    $properties = [
        'email' => $email,
        'emailVerified' => false,
        'username' => $username ,
    ];
    $ref_table1 = "images";
    $fetchdata = $database->getReference($ref_table1)->getValue();
    if($fetchdata>0){
        foreach($fetchdata as $key=>$row){
            if($row['username']==$_SESSION['username']){
                $updateData = [
                    "username"=>$username,
                    'email' => $email,
                ];
                $ref_table ="images/".$key;
                $updatequery=  $database->getReference($ref_table)->update($updateData);
            }
        }
    }
    $ref_table2 = "orders";
    $fetchdata = $database->getReference($ref_table2)->getValue();
    if($fetchdata>0){
        foreach($fetchdata as $key=>$row){
            if($row['username']==$_SESSION['username']){
                $updateData = [
                    "username"=>$username,
                ];
                $ref_table ="orders/".$key;
                $updatequery=  $database->getReference($ref_table)->update($updateData);
            }
        }
    }
    $updatedUser = $auth->updateUser($uid, $properties);
    $updateData = [
        "username"=>$username,
        "email"=>$email,
    ];
    $ref_table ="contacts/".$id;
   $updatequery=  $database->getReference($ref_table) 
   ->update($updateData);
   $_SESSION['username']=$username;
   if($updatequery){
    $_SESSION['profile_status']= "Data Updated Succesfully";
    header("Location: editprofile.php");
    }

}
else if($checpass){
    $id =$_POST['data_key'];
    $ui = $_POST['user_id'];
    $username= $_POST['update_name'];
    $email= $_POST['update_email'];
    $oldpass = $_POST['old_pass'];
    $upass=$_POST['update_pass'];
    $npass =$_POST['new_pass'];
    $nhaspass=password_hash($npass,PASSWORD_DEFAULT);
    $checpass = password_verify($upass,$oldpass);
    
        $uid = $ui;
    $properties = [
        'email' => $email,
        'emailVerified' => false,
        'username' => $username ,
        'password' => $npass,
    ];
    $ref_table1 = "images";
    $fetchdata = $database->getReference($ref_table1)->getValue();
    if($fetchdata>0){
        foreach($fetchdata as $key=>$row){
            if($row['username']==$_SESSION['username']){
                $updateData = [
                    "username"=>$username,
                    'email' => $email,
                ];
                $ref_table ="images/".$key;
                $updatequery=  $database->getReference($ref_table)->update($updateData);
            }
        }
    }
    $ref_table2 = "orders";
    $fetchdata = $database->getReference($ref_table2)->getValue();
    if($fetchdata>0){
        foreach($fetchdata as $key=>$row){
            if($row['username']==$_SESSION['username']){
                $updateData = [
                    "username"=>$username,
                ];
                $ref_table ="orders/".$key;
                $updatequery=  $database->getReference($ref_table)->update($updateData);
            }
        }
    }
    $updatedUser = $auth->updateUser($uid, $properties);
    $updateData = [
        "username"=>$username,
        "email"=>$email,
        "password"=>$nhaspass,
    ];
    $ref_table ="contacts/".$id;
   $updatequery=  $database->getReference($ref_table) 
   ->update($updateData);
   $_SESSION['username']=$username;
   if($updatequery){
    $_SESSION['profile_status']= "Data Updated Succesfully";
    header("Location: editprofile.php");
    }

}
else{
    $_SESSION['profile_status']="old password do not match";
        header("location:editprofile.php");
        exit();
}
}
if(isset($_POST['register_data'])){
    $username= $_POST['username'];
    $email= $_POST['Email'];
    $upass=($_POST['upassword']);
    $cpass =($_POST['cpass']);
    $chaspass = password_hash($_POST['cpass'],PASSWORD_DEFAULT);
    $ref_table= "contacts";
    $fetchdat = $database->getReference($ref_table)->getValue();
    $i=0;
        if($fetchdat>0){
            foreach($fetchdat as $key =>$row){
                if($username==$row['username']||$email==$row['email']){
                    $i=1;
                    break;
                }
            }
        }
    if($i==0){
    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'username' => $username ,
        'password' => $cpass,
    ];
    $postData = [
        'email' => $email,
        'emailVerified' => false,
        'username' => $username ,
        'password' => $chaspass,
    ];
    if($upass==$cpass){
        $ref_table ="contacts";
        $postRef = $database->getReference($ref_table)->push($postData);
        $createdUser = $auth->createUser($userProperties);
        if($createdUser){
            $_SESSION['status']= "Data registered Succesfully";
            header("Location: register.php");
            exit();
        }
    }
    else{
        $_SESSION['status']= "passwords do not match";
            header("Location: register.php");
            exit();
    }
}
   else{
    $_SESSION['status']= "User Already Exists";
    header("Location: register.php");
    exit();
   }
    
}


?>
