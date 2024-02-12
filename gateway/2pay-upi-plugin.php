===================== Initiate Payment =====================

<?php
# API base url
$url = "https://2pay.infomattic.com/init_payment.php";

$order_id = "";        // Generating order ID
$pid = "";             // Define merchant ID
?>
<!DOCTYPE html>
<html>
<head>
<title>Initiate Payment</title>
</head>
<body>
<form action="" method="post">
<input type="hidden" name="order_id" value="$order_id" />
<input type="hidden" name="pid" value="$pid" />
<input type="text" class="form-control" name="purpose" placeholder="Purpose of payment" required />
<input type="text" class="form-control" name="amt" placeholder="Amount" required />
<input type="email" class="form-control" name="email" placeholder="Email id" required />
<br />
<button type="submit" name="submit">Proceed</button>
</form>
</body>
</html>



===================== API response =====================
<?php


$secret_key = "";     // Merchant secret key

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
$pay_status = "Order ID : $order_id <br> 
Amount : $amount <br> 
Status : $status <br> 
Hash Status : $hash_status";
}
else {
# Suspicious payment, dont process this payment.
$hash_status = "Hash Mismatch";
$pay_status = "Order ID : $order_id <br> 
Amount : $amount <br> 
Status : $status <br> 
Hash Status : $hash_status";
}
?>