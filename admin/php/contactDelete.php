<?php
require '../pack/config.php';
if ($Admin) 
{   
    $d = input($_GET['id']);
    $all = explode(",",$d);
    foreach ($all as $delete)
    {
        $query = db("delete from request where id = '$delete'");
        if($query){ $_SESSION['msg'] = "Success"; }
        else { $_SESSION['msg'] = 'Fail'; }
        header("location:../request.php");
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
