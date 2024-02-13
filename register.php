<?php
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    header("Location:login.php");
} else {
    $code = $_GET['inviteCode'];
?>
    <!DOCTYPE html>
    <html>
    <?php include "pack/header.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFCC00;
        }

        .formCont {
            margin:15px 0;
            position: relative;
            z-index: 0;
            border-radius:15px;
            background-color: #fff;
            padding:20px;
            box-shadow: 0 0.053333rem 0.533333rem 0.053333rem #dfdfdf;
        }

        .input-container {
            position: relative;
            margin: 10px 0;
        }

        .tty {
            margin: 0px 0px 0px 18px;
        }

        .row {
            display: flex;
            flex-direction: column;
        }

        .bbtn {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            padding: 50px 0px 20px 0px;
        }

        .aa {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ab {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 5px 0px 12px 0px;
        }

        .headd {
            font-size: 44px;
        }

        .log {
            height: 100%;
            width: 80%;
        }

        .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
        }

        .m_i {
            font-size: 30px;
            padding: 8px 0px 0px 3px;
            color: orange;
        }

        .u_i {
            font-size: 22px;
            padding: 8px 0px 0px 3px;
            color: orange;
        }

        .po_i {
            font-size: 21px;
            padding: 8px 0px 0px 0px;
            color: orange;
        }

        .p_i {
            font-size: 25px;
            padding: 7px 0px 0px 0px;
            color: orange;
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
            border-radius: 35px;
            height: 55px;
            font-size: 16px;
        }

        #username-input {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;
            ;
            border-radius: 35px;
            height: 55px;
            font-size: 16px;
        }

        #password-input {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;
            ;
            border-radius: 35px;
            height: 55px;
            font-size: 16px;
        }

        #password-input2 {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;
            ;
            border-radius: 35px;
            height: 55px;
            font-size: 16px;
        }

        #password-input3 {
            width: 100%;
            padding: 13px 30px 10px 40px;
            margin: 5px 0;
            border: 1px solid #ccc;
            ;
            border-radius: 35px;
            height: 55px;
            font-size: 16px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }


        #login-button {
            background-color:red;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 25px;
            width: 92%;
            cursor: pointer;
            margin: 18px 0;
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

        .login_dir{
            text-align: center;
        }

        .login_dir a{
           color: #333399;
        }

    </style>

    <body>
        <div class="container">
            <div class="row aa">
                <img src="./img/register.webp" alt="No Image" class="log">
            </div>
            <form class="formCont" id="registration-form" action="php/register.php" method="post">
                <div class="row tty">
                    <div class="input-container">
                        <input type="text" id="username-input" placeholder="User Name" name="name" oninput="this.value = this.value.replace(/[^a-z A-Z]/g, '')" required>
                    </div>
                    <div class="input-container">
                        <input type="text" id="username-input" placeholder="Phone Number" name="mobile" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="10" required>
                    </div>
                    <div class="input-container">
                        <input type="password" id="password-input" name="password" placeholder="Please enter login password" required>
                        <span class="toggle-password" id="toggle-password"><img src="./img/eyeIcon.png" alt="eyeIcon"></span>
                    </div>
                    <div class="input-container">
                        <input type="password" id="password-input2" name="confirm_password" placeholder="Please confirm login password" required>
                        <span class="toggle-password" id="toggle-password2"><img src="./img/eyeIcon.png" alt="eyeIcon2"></span>
                    </div>
                    <div class="input-container">
                        <input type="password" id="password-input3" name="withdrawl_password" placeholder="Please enter the withdrawl password" required>
                        <span class="toggle-password" id="toggle-password3"><img src="./img/eyeIcon.png" alt="eyeIcon3"></span>
                    </div>
                    <div class="input-container">
                        <input type="text" id="username-input" placeholder="Invitation code" value="<?php echo $code; ?>" name="promo">
                    </div>
                </div>
                <div class="row bbtn">
                    <button type="submit" id="login-button">Register</button>
                </div>
                <div class="login_dir">
                    <a href="/main/login.php">Already have an account, log in</a>
                </div>
            </form>
        </div>
        <div id="snackbar"></div>
        <script>
            const passwordInput = document.getElementById("password-input");
            const togglePassword = document.getElementById("toggle-password");

            togglePassword.addEventListener("click", function() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });
        </script>
        <script>
            const passwordInput2 = document.getElementById("password-input2");
            const togglePassword2 = document.getElementById("toggle-password2");

            togglePassword2.addEventListener("click", function() {
                if (passwordInput2.type === "password") {
                    passwordInput2.type = "text";
                } else {
                    passwordInput2.type = "password";
                }
            });
        </script>
        <script>
            const passwordInput3 = document.getElementById("password-input3");
            const togglePassword3 = document.getElementById("toggle-password3");

            togglePassword3.addEventListener("click", function() {
                if (passwordInput3.type === "password") {
                    passwordInput3.type = "text";
                } else {
                    passwordInput3.type = "password";
                }
            });
        </script>
        <!-- Rest of your HTML code -->

        <script>
            function showSnackbar(message, type) {
                var x = document.getElementById("snackbar");
                x.innerHTML = message;
                x.className = "show " + type; // Apply the specified CSS class
                setTimeout(function() {
                    x.className = x.className.replace("show", "");
                }, 3000);
            }
        </script>


    </body>

    </html>
<?php
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