<?php
require '../../pack/config.php';
if ($Admin) 
{
    $id = input($_POST['id']);
    $name = input($_POST['name']);
    $mobile = input($_POST['mobile']);
    $password = input($_POST['password']);
    $promo = input($_POST['promo']);
    $res1 =  db("UPDATE users set name = '$name',mobile='$mobile',password='$password',promo='$promo' where id = '$id'");
    if ($res1) 
    {
        $_SESSION['msg'] = "Success";    
        header("location:../../user_edit.php?id=$id");
    } else {
        $_SESSION['msg'] = "Fail";
        header("location:../../user_edit.php?id=$id");
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}

?>
