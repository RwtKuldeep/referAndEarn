<?php
include '../admin/pack/config.php';
$pid =$_GET['pid'];
$amt =$_GET['amt'];
$uid = $_SESSION['userid'];

// Fetch the user's wallet information
$plan=db("select * from product where id='$pid'");
$pres=mysqli_fetch_assoc($plan);
$days=$pres['revenue'];
$select = db("SELECT * FROM wallet WHERE uid='$uid'");
$num = mysqli_num_rows($select);

if ($num > 0) {
    $res = mysqli_fetch_assoc($select);
    $currentBalance = $res['wallet_balance'];

    // Check if the current balance is enough for the purchase
    if ($currentBalance >= $amt) {
        $selectOrders = db("SELECT * FROM orders WHERE uid='$uid' AND pid='$pid'");
        $numOrders = mysqli_num_rows($selectOrders);

        // Check if the user has already purchased this plan less than 10 times
        if (($pid == 2) || ($pid != 2 && $numOrders < 10)) {
            $newBalance = $currentBalance - $amt;

            // Update wallet balance after the purchase
            $updateSql = db("UPDATE wallet SET wallet_balance = $newBalance WHERE uid ='$uid'");
            $in = db("INSERT INTO orders (uid, pid,days,amountpaid,updated_date) VALUES ('$uid', '$pid','$days','$amt','0')");

            $_SESSION['msg'] = "Purchase Successful";
            header("Location:../dashboard.php");
        } elseif ($pid != 2 && $numOrders >= 10) {
            $_SESSION['msg'] = "You have already purchased this plan 10 times";
            header("Location:../index.php");
        } else {
            $_SESSION['msg'] = "You have already purchased this plan 10 times";
            header("Location:../index.php");
        }
    } else {
        $_SESSION['msg'] = "Insufficient Balance!!";
        header("Location:../index.php");
    }
}
else{
    $_SESSION['msg'] = "Please Recharge !!";
    header("Location:../index.php");
}
?>
