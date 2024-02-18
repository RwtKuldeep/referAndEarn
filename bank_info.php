<?php
include "admin/pack/config.php";
if(isset($_SESSION['TheUser'])){
$uid=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<?php include "pack/header.php";?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .personal{
            font-size:14px;
            font-size:15px;
            margin:1px 0px 0px 130px;
            padding:15px 0px 14px 0px;
        }
        .aad{
           background:orange;
           color:white;
           display:flex;
           align-items:center;
        }
        .al{
            font-size:17px;
            margin:0px 0px 0px 0px;
        }

        .input-container {
            position: relative;
            margin: 5px 0;
        }
        .tty{
            position:relative;
            margin: 0px 0px 0px 9px;
        }
        .bbtn{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .cot{
           padding: 19px 10px 10px 0px
        }
        .aa{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .ab{
            display:flex;
            justify-content:center;
            align-items:center;
            margin:5px 0px 12px 0px;
        }
        .headd{
            font-size:44px;
        }
        .log{
            height:150px;
            width:200px;
        }

        .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
        }
        .m_i{
            font-size:30px;
            padding:8px 0px 0px 3px;
            color:orange;
        }
        .u_i{
            font-size:22px;
            padding:8px 0px 0px 3px;
            color:orange;
        }
        .po_i{
            font-size:21px;
            padding:8px 0px 0px 0px;
            color:orange;
        }
        .p_i {
            font-size:25px;
            padding:7px 0px 0px 0px;
            color:orange;
        }

        #login-icon {
            color: #3498db;
        }

        #password-icon {
            color: #27ae60;
        }
         #username-input:focus {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid orange;
            border-radius: 3px;
            height:55px;
            font-size:16px;
            background: #cccccc5e;
        }
        
        #amountInput{
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;;
            border-radius: 3px;
            height:55px;
            font-size:16px;
            background: #cccccc5e;
        }

        #username-input {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;;
            border-radius: 3px;
            height:55px;
            font-size:16px;
            background: #cccccc5e;
        }

        #password-input {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;;
            border-radius: 3px;
            height:55px;
            font-size:16px;
            background: #cccccc5e;
        }
        #password-input1 {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;;
            border-radius: 3px;
            height:55px;
            font-size:16px;
            background: #cccccc5e;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        

        #login-button {
                background-color: orange;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 25px;
                width: 90%;
                cursor: pointer;
                margin: 18px;
                height: 45px;
                font-size: 18px;
        }

        #register-button {
                background-color: orange;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 25px;
                width: 90%;
                cursor: pointer;
                margin: 3px 0px 0px 0px;
                height: 45px;
                font-size: 18px;
        }
    </style>
<body>
            <div class="container-fluid aad">
                <i class="fa fa-angle-left al" onclick="goBack()"></i>
                <p class="personal">My Bank Info</p>
            </div>
            <?php
            $b=db("select * from bank where uid='$uid'");
            $res=mysqli_fetch_assoc($b);
            ?>
        <div class="container-fluid cot">
            <form id="registration-form" action="php/bank_edit.php" method="post">
            <div class="row tty">
            <input type="text" id="username-input" placeholder="Full Name" name="name" value="<?php echo $res['name'];?>" required>
            <input type="hidden" id="username-input" placeholder="Full Name" name="id" value="<?php echo $res['id'];?>"> 
            <input type="hidden" id="username-input" placeholder="Full Name" name="uid" value="<?php echo $uid;?>"> 
        </div>
                    <div class="row tty">
            <input type="text" id="username-input" placeholder="Mobile Number" name="mobile" value="<?php echo $res['mobile'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="10" required>
        </div>
                    <div class="row tty">
            <input type="text" id="username-input" placeholder="Bank Name" name="bank" value="<?php echo $res['b_name'];?>" required>
        </div>
                    <div class="row tty">
            <input type="text" id="username-input" placeholder="Bank Number" name="bank_number" value="<?php echo $res['b_no'];?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="14" required>
        </div>
                    <div class="row tty">
            <input type="text" id="amountInput" placeholder="IFSC Code" name="ifsc" maxlength="11" value="<?php echo $res['ifsc'];?>" required >
        </div>
        <div class="row tty">
            <input type="text" id="amountInput" placeholder="Withdrawal Code" name="wcode"  value="<?php echo $res['password'];?>" required >
        </div>
            </div >
            <div class="row bbtn">
                    <button type="submit" id="login-button">Submit</button>
                    </div>
            </form>
        </div>
<div id="snackbar"></div>
 <script>
        // Get the input field element by its ID
        var amountInput = document.getElementById("amountInput");

        // Add an input event listener to the input field
        amountInput.addEventListener("input", function() {
            // Convert the entered text to uppercase
            this.value = this.value.toUpperCase();
        });
    </script>
    <script>
        const passwordInput = document.getElementById("password-input");
        const togglePassword = document.getElementById("toggle-password");

        togglePassword.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });
    </script>
    <script>
        const passwordInput1 = document.getElementById("password-input1");
        const togglePassword1 = document.getElementById("toggle-password1");

        togglePassword1.addEventListener("click", function () {
            if (passwordInput1.type === "password") {
                passwordInput1.type = "text";
            } else {
                passwordInput1.type = "password";
            }
        });
    </script>
<!-- Rest of your HTML code -->
 <script>
        function goBack() {
            // Use window.history to go back to the previous page
            window.history.back();
        }
        </script>
<script>
function showSnackbar(message, type) {
    var x = document.getElementById("snackbar");
    x.innerHTML = message;
    x.className = "show " + type; // Apply the specified CSS class
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>


</body>
</html>
<?php
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
