<?php
require '../../pack/config.php';
if ($Admin)
    {
        
    $id = input($_POST['id']);
    $tid = input($_POST['tid']);
    $getid = $id;
    $dir = '../../../image/product/';
    
   $s = "";
        $yes = db("SELECT * FROM `product` WHERE id = '$getid'");
        $num_yes = mysqli_num_rows($yes);
        if($num_yes > 0){
                $img_find = mysqli_fetch_assoc($yes);
                $pathOne = $img_find['path'];
                
                $s = $dir.$pathOne;
                $status = unlink($s);
                
                $img_update = db("Update `product` set `path` = '' where id = '$getid'");
        }
        
    if ($img_update) 
    {
        $_SESSION['msg'] = "Success";
        header("location:../../project_edit.php?id=$id");
    } else {
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