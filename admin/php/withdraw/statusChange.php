<?php
require '../../pack/config.php';
if ($Admin) 
{  
    $status = input($_GET['status']);
    $ide = input($_GET['id']);
//   echo "update withdrawal_request set status ='$status' where id = '$ide'";
//   die();
    $update = db("update withdrawal_request set status ='$status' where id = '$ide'");
    // echo "update pricing set status ='$status' where id = '$ide'";

    $updated_asset=0;
        if($update)
        {
            $s=db("select * from withdrawal_request where id='$ide'");
            $sres=mysqli_fetch_assoc($s);
            $uid=$sres['uid'];
            $d=db("select * from users where id='$uid'");
            if($num=mysqli_num_rows($d)>0){
                 $res=mysqli_fetch_assoc($d);
                 $u_id=$res['id'];
                 $bonus=$res['asset'];
                 $phone=$res['mobile'];
        
                $w=db("select * from withdrawal_request where uid='$u_id' and id='$ide'");
                if(mysqli_num_rows($w)>0){
                    $wres=mysqli_fetch_assoc($w);
                     $wamount=$wres['wamount'];
                     $status=$wres['status'];
                    if($status==='2'){
                         $updated_asset=$bonus+$wamount;
                        $up=db("update users set asset='$updated_asset' where id='$u_id'");
                } 
                }
            }
            $_SESSION['msg'] = "Status Update succesfully...";
            // echo "details are updated succesfully";
            header("location:../../withdraw.php");
            
        }
        else{
            $_SESSION['msg'] = "Error! Status not updated";
            header("location:../../withdraw.php");
        }      
}
else 
{
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
?>