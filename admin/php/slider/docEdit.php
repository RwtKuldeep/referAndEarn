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
if ($num_yes > 0) {
    $row = mysqli_fetch_assoc($yes);
    $path = $row['document_path'];
    $s = $dir . $path;
    $status = unlink($s);
}

 $extension = array('pdf','doc','docx');
//  echo "hii";
            foreach ($_FILES['document']['tmp_name'] as $key => $value) 
            {
                $filename = $_FILES['document']['name'][$key];
                $filename_tmp = $_FILES['document']['tmp_name'][$key];
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
                 $doc_update = db("update slider set document_path = '$final' where id='$getid'");
                //  echo "update slider set document_path = '$final' where id='$getid'";
            }


        if ($doc_update) {
            
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
