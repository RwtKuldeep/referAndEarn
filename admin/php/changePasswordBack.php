<?php
require '../pack/config.php';
if ($Admin)
{
    $setNewPassword = "";
    
    $setNewPassword = input($_POST['setNewPassword']);
    
    $admin = $_SESSION['TheAdmin'];

    $done = db("select * from admin where admin_user = '$admin'");
    
    if($done){
        $update = db("update admin set admin_password = '$setNewPassword' where admin_user = '$admin'");
        if($update){
            $_SESSION['msg'] = 'Password Update Successfully...';
        }
        else{
            $_SESSION['msg'] = 'Error!.. Password not update please try again...';
        } 
    }
    header('location:../changePassword.php');
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../index.php');
}


?>