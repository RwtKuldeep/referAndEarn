<?php
include '../admin/pack/config.php';
$uid=$_GET['uid'];
$purpose=$_GET['purpose'];
 $amt=$_GET['amt'];
$order_id = uniqid();       // Generating order ID
$pid = "0744196282836";             // Define merchant ID
 $insert=db("insert into orderId (uid,oid) Values('$uid','$order_id')");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Land Rover</title>
      <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="images/favicon.png" type="image/gif">

<meta name="description" content="2Pay upi payment gateway let's you accept unlimited payments with instant settlement at 0% transaction fee.">
<meta name="keywords" content="upi, upi payment gateway, payment gateway, free payment gateway">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="style1.css">
      <style media="screen">
         label{
         color: #5728a8;
         font-size: 14px;
         }
      </style>
   </head>
   <body>
      <div class="header">
         <a href="index.php"><img  style="padding-top: 18px; padding-left: 15px;" src="images/logo.png" alt=""></a>
      </div>
      <div class="container">
         <br><br><br><br>
         <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
               <div class="well">
                  <p><img class="img-responsive" style="float: left; padding-right: 10px;" src="images/store_icon.png" alt=""> <span style="font-size: 18px; color: #555;">Paying to</span> <br> <span style="font-size: 20px; color: #FF4B7C;">Investment Cloud</span> </p>
                            <hr style="border-top: 1px solid #5728a8;">
                           <form action= "https://dolphin.oynxdigital.com/init_payment.php" method="post">
                            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                            <input type="hidden" name="pid" value="<?php echo $pid;?>">
                            <div class="form-group">
                            <label>Purpose</label>
                            <input type="text" class="form-control" name="purpose" value="<?php echo $purpose;?>" placeholder="Purpose of payment" required readonly>
                            </div>
                            <div class="form-group">
                           <label>Amount</label>
                           <?php
                           if($purpose=="Recharge"){
                               ?>
                           <input type="text" class="form-control" name="amt" value="" placeholder="Amount" minlength="1" maxlength="6" required onkeypress="validate(event)">
                           <?php
                           }
                           else{
                               ?>
                               <input type="text" class="form-control" name="amt" placeholder="Amount" value="<?php echo $amt;?>" minlength="1" maxlength="6" readonly required onkeypress="validate(event)">
                               <?php
                           }
                           ?>
                           </div>
                           <div class="form-group">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email" placeholder="Email id" required>
                           </div>
                           <br>
                           <button type="submit" name="submit" class="backend_button btn-block">Proceed</button>
                           </form>                  <br>
               </div>
            </div>
            <div class="col-sm-4">
            </div>
         </div>
      </div>
      <br><br><br>
      <script type="text/javascript">
         function validate(evt) {
         var theEvent = evt || window.event;

         // Handle paste
         if (theEvent.type === 'paste') {
             key = event.clipboardData.getData('text/plain');
         } else {
         // Handle key press
             var key = theEvent.keyCode || theEvent.which;
             key = String.fromCharCode(key);
         }
         var regex = /[0-9]|\./;
         if( !regex.test(key) ) {
           theEvent.returnValue = false;
           if(theEvent.preventDefault) theEvent.preventDefault();
         }
         }
      </script>
   </body>
</html>