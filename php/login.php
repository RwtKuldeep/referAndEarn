<?php
include '../admin/pack/config.php';

 $username = input($_POST['mobile']);
 $password = input($_POST['password']);

$checkAdmin = "";
$checkPassword =  "";
$userid = "";

$find = db("select * from users where mobile = '$username' and password='$password' and status='0'");
// echo "select * from users where email = '$username' and password='$password'";
$num = mysqli_num_rows($find);

if($num == 1)
{
    while($row = mysqli_fetch_assoc($find))
    {
         $userid = $row['id'];
         $checkAdmin = $row['mobile'];
         $checkPassword =  $row['password'];
    }
    
    if($username == $checkAdmin && $password == $checkPassword){
        $_SESSION['class'] = "success";
        $_SESSION['msg'] = "Successfully Logged in";
        $_SESSION['TheUser'] = $checkAdmin;
        $_SESSION['userid'] = $userid;
        header('location:../index.php');
        
    }
    else{
        $_SESSION['class'] = "error";
        $_SESSION['msg'] = "Invalid Login!";
        header('location:../login.php');
    }
}
else{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../login.php');
}
?>