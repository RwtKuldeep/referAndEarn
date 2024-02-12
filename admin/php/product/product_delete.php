<?php
require '../../pack/config.php';
if ($Admin)
{
        $dir = '../../../image/product/';
        
        $d = input($_GET['id']);
        $all = explode(",",$d);
        foreach ($all as $delete)
        {
            $s = db("select * from product where id = '$delete'");
            while($r = mysqli_fetch_assoc($s)){
                $imgOne = $r['path'];
                unlink($dir.$imgOne);
            }
            $query = db("delete from product where id = '$delete'");
            if($query)
            {
                $_SESSION['msg'] = "Delete Successfully...";
            }
            else 
            {
                $_SESSION['msg'] = 'Fail...';   
            }
        }
        header("location:../../projects.php");
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
?>
