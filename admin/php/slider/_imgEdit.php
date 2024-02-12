<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture)
    {
        
    $id = input($_POST['id']);
    
    $getid = $id;
    $dir = '../../../image/slider/';

        $s = "";
        $yes = db("SELECT * FROM `slider` WHERE id = '$getid'");
        $num_yes = mysqli_num_rows($yes);
        if($num_yes > 0){
                $img_find = mysqli_fetch_assoc($yes);
                $pathOne = $img_find['image_path'];
                $s = $dir.$pathOne;
                $status = unlink($s);
        }
        
        
        $extension = array('jpg', 'jpeg', 'png', 'gif', 'jfif','JPG','JPEG','PNG','GIF','JFIF');
        foreach ($_FILES['image']['tmp_name'] as $key => $value) 
        {
        
            $filename = $_FILES['image']['name'][$key];
            $filename_tmp = $_FILES['image']['tmp_name'][$key];
            $final = '';
    
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) 
            {
    
                if (!file_exists($dir . $filename)) {
                    move_uploaded_file($filename_tmp, $dir . $filename);
                    $final = $filename;
                } else {
                    $filename = str_replace('.', '-', basename($filename, $ext));
                    $newfilename = $filename . time() . "." . $ext;
                    move_uploaded_file($filename_tmp, $dir . $newfilename);
                    $final = $newfilename;
                }
            }
            $img_update = db("Update `slider` set `image_path` = '$final' where id = '$getid'");
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