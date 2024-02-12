<?php
require '../../pack/config.php';
if ($Admin) {
    $id = input($_POST['id']);
    $asset = input($_POST['asset']);
    $res1 =  db("UPDATE users set asset = '$asset' where id = '$id'");


    if ($res1) {
        $checkasset = "select * from asset where user_id = '$id'";
        $run = db($checkasset);

        $date_time = date("Y-m-d h:i:s");

        if ($run) {
            $assetrecord = "INSERT INTO asset (user_id, asset,status, date_time) VALUES ('$id', '$asset',1,'$date_time')";
            db($assetrecord);
        }



        $_SESSION['msg'] = "Success";
        header("location:../../asset_edit.php?id=$id");
    } else {
        $_SESSION['msg'] = "Fail";
        header("location:../../asset_edit.php?id=$id");
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
