<?php
require '../../pack/config.php';
if ($Admin)
{
    $trending = input($_POST['trending']);
    $daily = input($_POST['daily']);
    $revenue = input($_POST['revenue']);
    $total = input($_POST['total']);
    
    $res1 =  db("insert into product (trending,daily,revenue,total) values ('$trending','$daily','$revenue','$total')");
    if ($res1) 
    {
        $getid = $last_id;
        $dir = '../../../image/product/';
        $i = 1;
        $extension = array('jpg', 'jpeg', 'png', 'gif', 'jfif','JPG','JPEG','PNG','GIF','JFIF');
        foreach ($_FILES['image']['tmp_name'] as $key => $value) 
        {
    
            $filename = $_FILES['image']['name'][$key];
            $filename_tmp = $_FILES['image']['tmp_name'][$key];
            $final = '';
    
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) 
            {
                
                $filename = str_replace('.', '-', basename($filename, $ext));
                $newfilename = $getid."-".$i."." . $ext;
                
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
            $img_update = db("update product set path='$final' where  id='$getid'");
        }
        
        if ($img_update) 
        {
            $_SESSION['msg'] = "Success";
        }
        else 
        {
            $_SESSION['msg'] = "Success - Image Not";
        }
        header("location:../../projects.php");
    }
    else {
        $_SESSION['msg'] = "Fail";
        header("location:../../projects.php");
    }
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
?>
