<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture) 
{    
    $name = input($_POST['name']);
    $description = $_POST['description'];
    $res1 =  db("INSERT INTO category (name, description) VALUES ('$name','$description')");
    if ($res1) 
    {
        $getid = $last_id;
        $dir = '../../../image/category/';
        $i = 1;
        $extension = array('jpg', 'jpeg', 'png', 'gif', 'jfif','JPG','JPEG','PNG','GIF','JFIF');
        foreach ($_FILES['profile']['tmp_name'] as $key => $value) 
        {
    
            $filename = $_FILES['profile']['name'][$key];
            $filename_tmp = $_FILES['profile']['tmp_name'][$key];
            $final = '';
    
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) 
            {
                
                $filename = str_replace('.', '-', basename($filename, $ext));
                $newfilename = $getid."." . $ext;
                
                if (!file_exists($dir . $newfilename)) {
                    move_uploaded_file($filename_tmp, $dir . $newfilename);
                    $final = $newfilename;
                } else {
                    $filename = str_replace('.', '-', basename($newfilename, $ext));
                    $newfilename2 = $filename ."-".$i.time(). "." . $ext;
                    move_uploaded_file($filename_tmp, $dir . $newfilename2);
                    $final = $newfilename2;
                }
                
            }
    
            $img_update = db("update category set path = '$final' where id='$getid'");
            $i++;
        }
        
        if ($img_update) 
        {
            $_SESSION['msg'] = "Success";
        }
        else 
        {
            $_SESSION['msg'] = "Success - Image Not";
        }
        header("location:../../category.php");
    } else {
        $_SESSION['msg'] = "Fail";
        header("location:../../category.php");
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
