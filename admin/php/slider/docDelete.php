<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture)
    {
        
    $id = input($_POST['id']);
    $getid = $id;
    $dir = '../../../document/slider/';
    
        $s = "";
        $yes = db("SELECT * FROM `slider` WHERE id = '$getid'");
        $num_yes = mysqli_num_rows($yes);
        if($num_yes > 0){
                $img_find = mysqli_fetch_assoc($yes);
                $pathOne = $img_find['document_path'];
                
                $s = $dir.$pathOne;
                $status = unlink($s);
                
                $img_update = db("Update `slider` set `document_path` = '' where id = '$getid'");
        }
            
        if ($img_update) {
            
            $_SESSION['msg'] = "Success";
            header("location:../../slider_edit.php?id=$id");
        } else {
            $_SESSION['msg'] = "Fail";
            header("location:../../slider_edit.php?id=$id");
        }
    
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
?>