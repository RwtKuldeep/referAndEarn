<?php
include '../admin/pack/config.php';

  $id = input($_POST['id']);
  $uid = input($_POST['uid']);
  $mobile = input($_POST['mobile']);
  $b_number = input($_POST['bank_number']);
  $password = input($_POST['bank_password']);
  $password1 = input($_POST['bank_password1']);
  $s=db("select * from bank where uid='$uid'");
  $res=mysqli_fetch_assoc($s);
  $mo=$res['mobile'];
  $bno=$res['b_no'];
  $pa=$res['password'];
  if($pa===$password && $bno===$b_number && $mobile==$mo){
      $update=db("update bank set password='$password1' where id='$id'");
      if($update){
            $_SESSION['class'] = "success";
            $_SESSION['msg']="Withdrawal password Successfully Updated";
            header("Location:../dashboard.php");
      }
      else{
          $_SESSION['class'] = "error"; 
          $_SESSION['msg']="error";
          header("Location:../bank_password.php");
      }
          
      }
  else{
 
     $_SESSION['class'] = "error";
     $_SESSION['msg']="Wrong Old Password";
     header("Location:../bank_password.php");
  }


?>