<?php
include '../admin/pack/config.php';
$secret_key = "164c2610772c572d34af7f484479966f";     // Merchant secret key
# Data received from gateway
   $order_id = $_POST['order_id'];
   $amount = $_POST['amount'];
   $status = $_POST['status'];
   $post_hash = $_POST['post_hash'];

# Compute the payment hash locally
 $local_hash = md5($order_id.$amount.$status.$secret_key);

if ($post_hash == $local_hash) {
# Mark the transaction as success & process the order
 $hash_status = "Hash Matched";
 if($status==="Approved"){
$u=db("select * from orderId where oid='$order_id'");
if($us_num=mysqli_num_rows($u)>0){
    $user_res=mysqli_fetch_assoc($u);
    $uid=$user_res['uid'];
}
$insert=db("insert into payments (uid,orderid,amount) values('$uid','$order_id','$amount')");
if($insert){
    $select=db("select * from wallet where uid='$uid'");
    $num=mysqli_num_rows($select);
    if($num>0){
        $res=mysqli_fetch_assoc($select);
        $currentBalance = $res['wallet_balance'];
        $newBalance = $currentBalance + $amount;
        $update=db("update wallet set amount='$amount',wallet_balance = $newBalance WHERE uid='$uid'");
    }
    else{
    $insert1=db("insert into wallet (uid,amount,wallet_balance) values('$uid','$amount','$amount')");
    }
    
    //level1
     $us=db("select * from users where id='$uid'");
            $ures=mysqli_fetch_assoc($us);
            $up=$ures['user_promo'];
            $promo=$ures['promo'];
            if (!empty($promo)) {
            $au=db("select * from users where user_promo='$promo'");
            $row=mysqli_fetch_assoc($au);
                     $userid=$row['id'];
                     $promo1=$row['promo'];
                     $asset=$row['asset'];
                    if($userid != $uid) {
                    $percent=15;
                     $asset_new=0.15*$amount;
                     $up_asset=$asset+$asset_new;
                    $ins=db("insert into refer (to_uid,from_uid,percentage,amount) Values ('$userid','$uid','$percent','$asset_new')");
                    $u_update=db("update users set asset='$up_asset' where id='$userid'");
                    }
            }
            
            if (!empty($promo1)) {
        
                    //level2
                $au2=db("select * from users where user_promo='$promo1'");
                $row1=mysqli_fetch_assoc($au2);
                $userid1=$row1['id'];
                $asset1=$row1['asset'];
                $promo2=$row1['promo'];
                    if($userid1 != $uid) {
                    $percent=2;
                    $asset_new1=0.02*$amount;
                    $up_asset1=$asset1+$asset_new1;
                    $ins1=db("insert into refer (to_uid,from_uid,percentage,amount) Values ('$userid1','$userid','$percent','$asset_new1')");
                    $u_update1=db("update users set asset='$up_asset1' where id='$userid1'");
                    }
            }
                
                    
                    //level3
                    if (!empty($promo2)) {
                $au3=db("select * from users where user_promo='$promo2'");
                $row3=mysqli_fetch_assoc($au3);
                $userid2=$row3['id'];
                $asset2=$row3['asset'];
                    if($userid2 != $uid) {
                    $percent=1;
                    $asset_new2=0.01*$amount;
                    $up_asset2=$asset2+$asset_new2;
                    $ins2=db("insert into refer (to_uid,from_uid,percentage,amount) Values ('$userid2','$userid','$percent','$asset_new2')");
                    $u_update2=db("update users set asset='$up_asset2' where id='$userid2'");
                    }
                    }
    
                    
    $_SESSION['msg']='Payment Received';
    echo "success";
}
}
elseif($status==="Declined"){
    echo "payment Declined";
}
}
else {
# Suspicious payment, dont process this payment.
$hash_status = "Hash Mismatch";
$_SESSION['msg']='Payment Not Received Try again';
    echo "error";

}
?>