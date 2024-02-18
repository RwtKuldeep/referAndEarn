<?php
include '../admin/pack/config.php';

  $id = input($_POST['id']);
  $uid = input($_POST['uid']);
  $mobile = input($_POST['mobile']);
  $b_number = input($_POST['bank_number']);
  $password = input($_POST['bank_password']);
  $password1 = input($_POST['new_password1']);
  $c_bank_password1 = input($_POST['confirmNew_password']);

  if($password1!=$c_bank_password1){
    $_SESSION['class'] = "error";
    $_SESSION['msg']="Confirm Password does not match";
    header("Location:../bank_password.php");
  }else{
    $s=db("select * from bank where uid='$uid'");
    $res=mysqli_fetch_assoc($s);
    $mo=$res['mobile'];
    $bno=$res['b_no'];
    $pa=$res['password'];
    if($pa===$password && $bno===$b_number && $mobile==$mo){
        $update=db("update bank set password='$password1' where uid='$uid'");
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
       $_SESSION['msg']="Invalid parameters";
       header("Location:../bank_password.php");
    }
  }



?>