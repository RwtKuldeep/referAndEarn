<?php
include '../admin/pack/config.php';

  $id = input($_POST['id']);
  $uid = input($_POST['uid']);
  $name = input($_POST['name']);
  $mobile = input($_POST['mobile']);
  $bank_name = input($_POST['bank']);
  $b_number = input($_POST['bank_number']);
  $ifsc = input($_POST['ifsc']);
      $update=db("update bank set name='$name',mobile='$mobile',b_name='$bank_name',b_no='$b_number',ifsc='$ifsc' where id='$id'");
      if($update){
            $_SESSION['class'] = "success";
            $_SESSION['msg']="Successfully Updated";
            header("Location:../bank_info.php");
      }
      else{
            $_SESSION['class'] = "error";
          $_SESSION['msg']="error";
          header("Location:../bank_info.php");
      }


?>