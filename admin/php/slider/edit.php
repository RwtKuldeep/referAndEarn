<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture) 
{
    $id = input($_POST['id']);
    $title = input($_POST['title']);
    // $description = $_POST['description'];
    $res1 =  db("UPDATE slider set title = '$title' where id = '$id'");
    if ($res1) 
    {
        $_SESSION['msg'] = "Success";    
        header("location:../../slider_edit.php?id=$id");
    } else {
        $_SESSION['msg'] = "Fail";
        header("location:../../slider_edit.php?id=$id");
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}

?>
