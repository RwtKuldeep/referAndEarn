<?php
include '../admin/pack/config.php';

  $id = input($_POST['id']);
  $uid = input($_POST['uid']);
  $mobile = input($_POST['mobile']);
  $bank_account = input($_POST['bank_account']);
  $password = input($_POST['bank_password']);
  $password1 = input($_POST['bank_password1']);
  $cpass = input($_POST['bank_confirmpass']);
  
  $s=db("select * from users where id='$uid'");
  $res=mysqli_fetch_assoc($s);

  $fetchbankdetails=db("select * from bank where uid='$uid'");
  $res2=mysqli_fetch_assoc($fetchbankdetails);

  if($res['mobile']!=$mobile){
    $_SESSION['msg']="Invalid mobile number";
    header("Location:../change_password.php");
    die();
  }
   if($res2['b_no']!=$bank_account){
    $_SESSION['msg']="Invalid bank account number";
    header("Location:../change_password.php");
    die();
  }
   if($password1!=$cpass){
    $_SESSION['msg']="Confirm Password does not match";
    header("Location:../change_password.php");
    die();
  }
  
    $pa=$res['password'];
    if($pa===$password){
        $update=db("update users set password='$password1' where id='$id'");
        
        if($update){
              $_SESSION['class'] = "success";
              $_SESSION['msg']="Password Successfully Updated";
              header("Location:../dashboard.php");
        }
        else{
            $_SESSION['class'] = "error";
            $_SESSION['msg']="error";
            header("Location:../change_password.php");
        }
            
        }
    else{
   
       $_SESSION['msg']="Wrong Old Password";
       header("Location:../change_password.php");
    }
  



?>