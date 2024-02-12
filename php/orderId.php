<?php
include '../admin/pack/config.php';
# Data received from gateway
  echo $uid=$_POST['uid'];
  echo $order_id = $_POST['order_id'];
  $insert=db("insert into orderId (uid,oid) Values('$uid','$order_id')");
  if($insert){
      $_SESSION['msg']='sucess';
  }
  else{
      $_SESSION['msg']='fail';
      
  }
?>