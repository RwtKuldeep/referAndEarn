<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture)
    {
        
    $id = input($_POST['id']);
    
    $getid = $id;
    $pdfDir = '../../../document/slider/';
    
        $document = $_FILES['document'];
    $documentTmpName = $document['tmp_name'];
    $documentExt = strtolower(pathinfo($document['name'], PATHINFO_EXTENSION));
    $documentNewName = $getid . '.' . $documentExt;
    $documentFinalPath = $pdfDir . $documentNewName;
    move_uploaded_file($documentTmpName, $documentFinalPath);

        // Update the document_path in the database
        $doc_update = db("UPDATE slider SET document_path = '$documentNewName' WHERE id = '$getid'");
        // echo "UPDATE slider SET document_path = '$documentNewName' WHERE id = '$getid'";
        

        if ($doc_update) 
        {    
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