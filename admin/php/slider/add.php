<?php
require '../../pack/config.php';
if ($admin_Login_hypertonic_manufecture) 
{    
    $title = input($_POST['title']);
    // $description = $_POST['description'];
    $res1 = db("INSERT INTO slider (title) VALUES ('$title')");
if ($res1) {
    $getid = $last_id;
    $imageDir = '../../../image/slider/';
    $pdfDir = '../../../document/slider/';
    
    // Upload image
    $image = $_FILES['profile'];
    $imageTmpName = $image['tmp_name'];
    $imageExt = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    $imageNewName = $getid . '.' . $imageExt;
    $imageFinalPath = $imageDir . $imageNewName;
    move_uploaded_file($imageTmpName, $imageFinalPath);
    
    // Upload document
    $document = $_FILES['document'];
    $documentTmpName = $document['tmp_name'];
    $documentExt = strtolower(pathinfo($document['name'], PATHINFO_EXTENSION));
    $documentNewName = $getid . '.' . $documentExt;
    $documentFinalPath = $pdfDir . $documentNewName;
    move_uploaded_file($documentTmpName, $documentFinalPath);
    
    $imgUpdate = db("UPDATE slider SET image_path = '$imageNewName', document_path = '$documentNewName' WHERE id = '$getid'");
    
    if ($imgUpdate) {
        $_SESSION['msg'] = "Success";
    } else {
        $_SESSION['msg'] = "Success - Image Not";
    }
    header("location:../../slider.php");
} else {
    $_SESSION['msg'] = "Fail";
    header("location:../../slider.php");
}

} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
