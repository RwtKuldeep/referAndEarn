<?php
include '../admin/pack/config.php';
// echo "hii";
 $uid=input($_POST['uid']);
 $amount=input($_POST['wamount']);
 $passowrd=input($_POST['password']);
 $s=db("select * from bank where uid='$uid'");
 $snum=mysqli_num_rows($s);
 if($snum>0){
     $sres=mysqli_fetch_assoc($s);
     $pass=$sres['password'];
 }
 else{
     
header("Location:../bank.php");
 }
 if($passowrd===$pass){
$in=db("insert into withdrawal_request (uid,amount,status) Values('$uid','$amount','0')");
if($in){
     $d=db("select * from users where id='$uid'");
            if($num=mysqli_num_rows($d)>0){
                 $res=mysqli_fetch_assoc($d);
                 $u_id=$res['id'];
                 $bonus=$res['asset'];
                 $phone=$res['mobile'];
                 $updated_asset=$bonus-$amount;
                $up=db("update users set asset='$updated_asset' where id='$u_id'");
            }
$_SESSION['msg']='Request Placed';
header("Location:../index.php");

}
else{
$_SESSION['msg']='Error try Again';
header("Location:../index.php");
}
}
else{
    
$_SESSION['msg']='Incorrect Password';
header("Location:../password_validate.php");
}


?>
