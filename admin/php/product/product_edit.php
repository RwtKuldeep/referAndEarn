<?php
require '../../pack/config.php';
if ($Admin)
{
    $id = input($_POST['id']);
    $trending = input($_POST['trending']);
    $daily = input($_POST['daily']);
    $revenue = input($_POST['revenue']);
    $total = input($_POST['total']);
    $res1 =  db("UPDATE product set trending = '$trending', daily = '$daily', revenue='$revenue',total='$total' where id='$id'");
    if ($res1) 
    {
        $getid = $last_id;        
        $_SESSION['msg'] = "Success";
        header("location:../../project_edit.php?id=$id");
    }
    else {
        $_SESSION['msg'] = "Fail";
        header("location:../../project_edit.php?id=$id");
    }
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
?>
