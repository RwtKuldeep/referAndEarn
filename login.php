<?php
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    header("Location:index.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <?php include "pack/header.php"; ?>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color:  #FFCC00;
            }

            .input-container {
                position: relative;
                margin: 10px 0;
            }

            .tty {
                margin: 0px 0px 0px 18px;
                display: flex;
                flex-direction: column;
            }

            .bbtn {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                padding: 90px 0px 64px 0px;
            }

            form {
                margin: 50px 0;
                background-color: #ffffff42;
                border-radius: 15px;
                padding: 30px;
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
                height: 150px;
                width: 200px;
            }

            .icon {
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 18px;
            }

            .icon_img {
                width: 20px;
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
                border-radius: 10px;
                height: 55px;
                font-size: 16px;
            }

            #username-input {
                width: 100%;
                padding: 13px 30px 10px 40px;
                margin: 5px 0;
                border: 1px solid #ccc;
                ;
                border-radius: 10px;
                height: 55px;
                font-size: 16px;
            }

            #password-input {
                width: 100%;
                padding: 13px 30px 10px 40px;
                margin: 5px 0;
                border: 1px solid #ccc;
                ;
                border-radius: 10px;
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
                width: 90%;
                cursor: pointer;
                margin: 18px;
                height: 45px;
                font-size: 18px;
                box-shadow: -1px 5px 15px 0 red;
            }

            #register-button {
                background-color: red;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 25px;
                width: 90%;
                cursor: pointer;
                margin: 3px 0px 0px 0px;
                height: 45px;
                font-size: 18px;
                    box-shadow: -1px 5px 15px 0 red;
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
                <img src="img/login.jpg" alt="No Image">
            </div>

            <form action="php/login.php" method="POST">
                <div class="tty">
                    <div class="input-container">
                        <div class="icon" id="username-icon">
                            <img class="icon_img" src="img/lock.png" alt="lock">
                        </div>
                        <input type="text" id="username-input" name="mobile" placeholder="Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="10" required>
                    </div>
                    <div class="input-container">
                        <div class="icon" id="password-icon">
                        <img class="icon_img" src="img/password-key.png" alt="lock">
                        </div>
                        <input type="password" id="password-input" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="bbtn">
                    <button type="submit" id="login-button"><a style="text-decoration:none; color:white">Login</a></button>
                    <button type="button" id="register-button"><a href="register.php" style="text-decoration:none;">Register</a></button>
                </div>
            </form>
        </div>

        <div id="snackbar"><span id="tick-icon"></span></div>

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
    </body>

    </html>
<?php
}
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $class = $_SESSION['class'];
?>
    <script>
        var x = document.getElementById("snackbar");
        x.innerHTML = "<?php echo $msg; ?>";
        x.classList.add("<?php echo $class; ?>");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    </script>

<?php
    unset($_SESSION['msg']);
}
?>