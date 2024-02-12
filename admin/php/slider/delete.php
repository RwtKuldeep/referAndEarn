<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture) 
{   
    $d = input($_GET['id']);
    $all = explode(",",$d);
    foreach ($all as $delete)
    {
        $update = db("select * from slider where id = '$delete'");
        $num = mysqli_num_rows($update);
        if($num == 1)
        {
            $query = db("delete from slider where id = '$delete'");
            if($query){ $_SESSION['msg'] = "Success"; }
            else { $_SESSION['msg'] = 'Fail'; }
            header("location:../../slider.php");
        }
        else
        {
            $_SESSION['msg'] = 'Error!';
            header("location:../../slider.php");
        }
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
