<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture)
    {
        
    $id = input($_POST['id']);
    $getid = $id;
    $dir = '../../../image/category/';
    
        $s = "";
        $yes = db("SELECT * FROM `category` WHERE id = '$getid'");
        $num_yes = mysqli_num_rows($yes);
        if($num_yes > 0){
                $img_find = mysqli_fetch_assoc($yes);
                $pathOne = $img_find['path'];
                
                $s = $dir.$pathOne;
                $status = unlink($s);
                
                $img_update = db("Update `category` set `path` = '' where id = '$getid'");
        }
            
        if ($img_update) {
            
            $_SESSION['msg'] = "Success";
            header("location:../../category_edit.php?id=$id");
        } else {
            $_SESSION['msg'] = "Fail";
            header("location:../../category_edit.php?id=$id");
        }
    
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
?>