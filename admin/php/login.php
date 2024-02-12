<?php
include '../pack/config.php';

 $admin = input($_POST['admin_user']);
 $password = input($_POST['admin_password']);

$checkAdmin = "";
$checkPassword =  "";

$find = db("select * from admin where admin_user = '$admin'");
$num = mysqli_num_rows($find);

if($num == 1)
{
    while($row = mysqli_fetch_assoc($find))
    {
        $checkAdmin = $row['admin_user'];
        $checkPassword =  $row['admin_password'];
    }
    
    if($admin == $checkAdmin && $password == $checkPassword){
        $_SESSION['msg'] = "Successfully Logged in";
        $_SESSION['TheAdmin'] = $admin;
        header('location:../dashboard.php');
    }
    else{
        
        $_SESSION['msg'] = "Invalid Login!";
        header('location:../index.php');
    }
}
else{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../index.php');
}
?>