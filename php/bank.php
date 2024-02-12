<?php
include '../admin/pack/config.php';

  $uid = input($_POST['uid']);
  $name = input($_POST['name']);
  $mobile = input($_POST['mobile']);
  $bank_name = input($_POST['bank']);
  $b_number = input($_POST['bank_number']);
  $ifsc = input($_POST['ifsc']);
  $password = input($_POST['bank_password']);
 $insert=db("insert into bank (uid,name,mobile,b_name,b_no,ifsc,password) values('$uid','$name','$mobile','$bank_name','$b_number','$ifsc','$password')");
 if($insert){
     $_SESSION['class'] = "success";
     $_SESSION['msg']="Successfully Inserted";
     header("Location:../withdraw.php");
 }
 else{
     $_SESSION['class'] = "error";
     $_SESSION['msg']="Fail";
     header("Location:../bank.php");
 }


?>