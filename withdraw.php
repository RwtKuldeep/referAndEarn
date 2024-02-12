<?php
include "admin/pack/config.php";
if(isset($_SESSION['TheUser'])){
$uid=$_SESSION['userid'];
    $bank=db("select * from bank where uid='$uid'");
    if($num = mysqli_num_rows($bank) > 0){
        $fetch=mysqli_fetch_assoc($bank);
?>
<!DOCTYPE html>
<html lang="en">
<?php include "pack/header.php";?>
<style>
/* Hover effect styles */
.iin:hover {
  border: none; /* Add your hover effect styles here */
  /* Other hover styles */
}
.bt{
    margin-bottom:10px;
}

/* Focus (click) styles */
.iin:focus {
  border: 1px solid white; /* Remove the border on focus (click) */
  /* Other focus styles */
}
.aa{
    margin:10px 0px 25px 0px;
}
.panel{
    border:2px solid #80808036;
}
.phone{
    display:flex;
    align-items:center;
    padding: 12px 0px 24px 0px;
}
.iin{
    border:none;
    margin:0px 0px 10px 17px;
    font-size:20px;
    height:60px;
}
.po{
    font-size:17px;
    margin:0px 87px 0px 0px;
}
.po1{
    font-size:16px;
    margin:0px 0px 0px 20px;
}
.bnk{
    font-size:17px;
    margin:0px 88px 0px 0px;
}
.bnk1{
    font-size:16px;
    margin:0px 0px 0px 30px;
}
.withh{
    font-size:17px;
    margin:0px 39px 0px 0px;
}
.withh1{
    font-size:16px;
    margin:0px 0px 0px 10px;
}
.par{
    color:red;
    padding:0px 0px 0px 0px;
}
.tax{
    border: 2px solid orange;
    border-radius: 25px;
    width: 101px;
    padding: 0px 0px 0px 12px;
}
.h4, .h5, .h6, h4, h5, h6 {
    margin-top: 2px;
    margin-bottom: 2px;
    color:orange;
}
.asd{
    background:orange;
    padding:0px 0px 0px 0px;
    color:white;
}
.ru{
    color:orange;
    font-size:25px;
}
.in_put{
    margin:30px 0px 0px 0px;
    /*height:100px;*/
    display:flex;
    align-items:center;
}
.msg{
    margin:0px 0px 0px 0px;
}
.with{
    color:orange;
}
.w_btn{
    background:orange;
    color:white;
    border-radius: 25px;
    width: 100%;
    padding: 14px 0px 14px 0px;
    font-size: 18px;
}
.arrow{
        margin: 0px 0px 7px -123px;
        font-size: 15px;
}
@media only screen and (max-width: 667px) {
    
}
</style>
<body>
    <nav class="navbar navbar-default asd">
  <div class="container asd">
      <div class="arrow">
          <i class="fa fa-angle-left" onclick="goBack()"></i>
          </div>
    <div class="navbar-header">
      <p class="navbar-brand" style="color:white;" >Withdraw</p>
    </div>
  </div>
</nav>
        
        </div>
    <div class="container bt">
         <?php
                    $u=db("select * from users where id='$uid'");
                    $ures=mysqli_fetch_assoc($u);
                    $asset=$ures['asset'];
                    ?>
        <form action="password_validate.php" method="POST"  onsubmit="return validateWithdrawal(<?php echo $asset;?>)">
        <!-- First container for tax and amount input -->
        <div class="panel panel-default aa">
<div class="panel-body">
                <div class="tax">
                <h4 class="he_ad">Tax: 10%</h4>
                </div>
                <div class="in_put">
                    <p class="ru">₹</p>
                   
                <input type="hidden" class="iin" placeholder="Enter Amount" name="uid" value="<?php echo $uid;?>">
                <input type="text" class="iin" placeholder="Enter Amount" name="amount" id="withdrawAmount" >
                <input type="hidden" class="iin" placeholder="Enter Amount" name="wamount" id="wamount" >
                </div>
                <div class="msg">
                    
                <p id="asset">Assets: Rs <?php echo $asset;?> <span class="with">Withdraw All</span></p>
                <p style="display: none;" id="famount"><span>Your Amount after applying tax</span> <b style="font-weight: 800;"><span class="result" id="finalAmount">₹ 0.00</span></b></p>
                </div>
            </div>
        </div>

        <!-- Second container for phone number, bank account, and withdrawal password -->
        <div class="panel panel-default">
            <div class="panel-body">
               <div class="phone">
                   <p class="po">Phone Number</p>
                   <p class="po1"><?php echo $fetch['mobile'];?></p>
                   </div>
               <div class="phone">
                   <p class="bnk">Bank Account</p>
                   <p class="bnk1"><?php echo $fetch['b_name'];?></p>
                   </div>
               <div class="phone">
                   <p class="withh">Widthdrawal Password</p>
                   <p class="withh1"><?php echo "XXXX"?></p>
                   </div>
            </div>
        </div>

        <!-- Third container for other information -->
        <div class="panel panel-default">
            <div class="panel-body">
                <p class="par">1.Withdrawal time:00:30-18:00 </p>
                <p class="par">2.Minimum Withdrawal Amount:₹120</p>
                <p class="par">3.Fill the IFSC code correctly,otherwise the withdrawal will fail.</p>
            </div>
        </div>

        <button class="w_btn">Withdraw</button>
        </form>
    </div>
<div id="snackbar"></div>
<script>
    // Function to handle "Withdraw All" button click
    function withdrawAll() {
        // Get the asset value from the paragraph and extract the numeric part
        var assetPara = document.getElementById('asset').innerText.match(/\d+/);
        if (assetPara && assetPara.length > 0) {
            var assetValue = assetPara[0]; // Extract the asset value
            document.getElementById('withdrawAmount').value = assetValue; // Set the asset value in the input field
        }
    }

    // Add click event listener to "Withdraw All" span
    document.addEventListener('DOMContentLoaded', function () {
        var withdrawBtn = document.querySelector('.with');
        withdrawBtn.addEventListener('click', function () {
            withdrawAll(); // Call the function to handle click event
        });
    });
</script>
<script>
        function validateWithdrawal(asset) {
            var withdrawalAmount = document.getElementById('withdrawAmount').value;

            // Check if the entered amount is less than 100
            if (withdrawalAmount < 120) {
                alert('Minimum withdrawal amount is ₹120');
                return false;
            }

            if (isNaN(withdrawalAmount)) {
                alert('Invalid Input');
                return false;
            }

            // Check if the entered amount is greater than the available asset
            if (withdrawalAmount > asset) {
                alert('Withdrawal amount is greater than your  asset balance');
                return false;
            }

            // Allow the form submission if the amount is valid
            return true;
        }
        </script>
    <script>
        function goBack() {
            // Use window.history to go back to the previous page
            window.history.back();
        }
        </script>

<script>
        $(document).ready(function () {
            // Attach a keyup event listener to the input field
            $('#withdrawAmount').keyup(function () {
                // Get the entered amount
                var enteredAmount = parseFloat($(this).val());

                // Check if the enteredAmount is a valid number
                if (!isNaN(enteredAmount)) {
                    // Calculate 10% of the entered amount
                    var tenPercent = enteredAmount - (enteredAmount * 0.1);

                    // Display the result
                    $("#famount").show(function(){
                        $('#wamount').val(tenPercent.toFixed(2));
                        $('#finalAmount').text('₹ '+tenPercent.toFixed(2));

                    });
                } else {
                    // Display an error message if the entered value is not a valid number
                    $("#famount").hide();
                    $('#finalAmount').text('₹ 0.00');
                }
            });
        });
    </script>
</body>
</html>
<?php
}
else{
header("Location:bank.php");
}
}
else{
    header("Location:login.php");
}
if (isset($_SESSION['msg'])) {
$msg = $_SESSION['msg'];
?>
        <script>
            var x = document.getElementById("snackbar");
            x.innerHTML = "<?php echo $msg; ?>";
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        </script>

<?php
unset($_SESSION['msg']);
}
?>
