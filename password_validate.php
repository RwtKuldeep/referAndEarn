<?php
include "admin/pack/config.php";
if(isset($_SESSION['TheUser'])){
$uid=input($_POST['uid']);
$wamount=input($_POST['wamount']);
$amount=input($_POST['amount']);
?>
<!DOCTYPE html>
<html>
    <head>
<?php include "pack/header.php";?>
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .input-container {
            position: relative;
            margin: 10px 0;
            width:100%;
        }
        .tty{
            margin: 0px 0px 0px 18px;
        }
        .bbtn{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .container{
           padding: 90px 29px 64px 24px;
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
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 25px;
                width: 90%;
                cursor: pointer;
                margin: 3px 0px 0px 0px;
                height: 45px;
                font-size: 18px;
        }
         #register-button a {
        color: white;
        text-decoration: none;
    }
    </style>
    </head>
<body>
        <div class="container">
            <div class="row aa">
             <img src="img/im1.png" alt="No Image" class="log" >
            </div>
            <div class="row ab">
                <h2 class="headd">Range Rover</h2>
            </div>
            <form action="php/withdraw.php" method="POST">
            <div class="row tty">
        <!--            <div class="input-container">-->
        <!--    <div class="icon" id="username-icon">-->
        <!--        <i class="fa fa-mobile m_i"></i>-->
        <!--    </div>-->
        <!--    <input type="text" id="username-input" name="mobile" placeholder="Mobile Number" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="10" required>-->
        <!--</div>-->
                    <div class="input-container">
            <div class="icon" id="password-icon">
                <i class="fa fa-key p_i"></i>
            </div>
            <input type="hidden"  name="uid" placeholder="Enter Your Withdrawal Password" value="<?php echo $uid;?>">
            <input type="hidden"  name="amount" placeholder="Enter Your Withdrawal Password" value="<?php echo $amount;?>">
            <input type="hidden"  name="wamount" placeholder="Enter Your Withdrawal Password" value="<?php echo $wamount;?>">
            <input type="password" id="password-input" name="password" placeholder="Enter Your Withdrawal Password" required>
            <span class="toggle-password" id="toggle-password"><i class="fa fa-eye"></i>️</span>
        </div>
            </div >
                    <div class="row bbtn">
                    <button type="submit" id="login-button">Submit</button>
                    <!--<button id="register-button" ><a href="register.php" style="text-decoration:none;">Register</a></button>-->
                    </div>
                    </form>
        </div>
        
        <div id="snackbar"><span id="tick-icon"></span></div>

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
