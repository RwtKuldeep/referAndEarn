<?php
require '../../pack/config.php';
if ($Admin) 
{   
    $d = input($_GET['id']);
    $all = explode(",",$d);
    foreach ($all as $delete)
    {
        $update = db("select * from wallet where id = '$delete'");
        $num = mysqli_num_rows($update);
        if($num == 1)
        {
            $query = db("delete from wallet where id = '$delete'");
            if($query){ $_SESSION['msg'] = "Success"; }
            else { $_SESSION['msg'] = 'Fail'; }
            header("location:../../wallet.php");
        }
        else
        {
            $_SESSION['msg'] = 'Error!';
            header("location:../../wallet.php");
        }
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
