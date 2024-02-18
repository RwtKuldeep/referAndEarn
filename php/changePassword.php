<?php
include '../admin/pack/config.php';

  $id = input($_POST['id']);
  $uid = input($_POST['uid']);
  $password = input($_POST['bank_password']);
  $password1 = input($_POST['bank_password1']);

  if($password!=$password1){
    $_SESSION['msg']="Confirm Password does not match";
    header("Location:../change_password.php");
  }else{
    $s=db("select * from users where id='$uid'");
    $res=mysqli_fetch_assoc($s);
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
            header("Location:../bank_info.php");
        }
            
        }
    else{
   
       $_SESSION['msg']="Wrong Old Password";
       header("Location:../bank_info.php");
    }
  }



?>