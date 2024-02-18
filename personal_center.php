<?php
include "admin/pack/config.php";
if(isset($_SESSION['TheUser'])){
?>
<html>
    <head>
        <?php include "pack/header.php";?>
        <style>
        .aad{
           background:#FFCC00;
           color:white;
           display:flex;
           align-items:center;
        }
        .al{
            font-size:17px;
            margin:0px 0px 0px 0px;
            cursor: pointer;
        }
        .line{
            background:#8080804a;
            height: 1px;
            margin: 5px 0px 0px 0px;
        }
        .personal{
            font-size:14px;
            margin:1px 0px 0px 94px;
            padding:15px 0px 14px 0px;
        }
        .aag{
            display:flex;
            align-items:center;
            margin-top:-11px;
            color: black;
        }
        .wall{
            font-size:18px;
            color:#FFCC00;
            padding: 20px 15px 0px 15px;
        }
        .bank{
            font-size: 18px;
            padding: 29px 0px 0px 0px;
        }
        .ar{
            font-size:17px;
            margin:0px 0px 0px 0px;
        }
        
        </style>
    </head>
        <body>
            <div class="container-fluid aad">
                <i class="fa fa-angle-left al" onclick="goBack()"></i>
                <p class="personal">Personal Center</p>
            </div>
            <div class="container-fluid">
                <a href="bank_info.php"><div class="row aag">
                    <i class='fas fa-wallet wall'></i>
                    <p class="bank">Bank Info</p>
                    </div></a>
                    <hr class="line">
                    <a href="change_password.php"><div class="row aag">
                    <i class='fas fa-lock wall'></i>
                    <p class="bank">Change login Password</p>
                    </div></a>
                    <hr class="line">
                    <a href="bank_password.php"><div class="row aag">
                    <i class='fas fa-lock wall'></i>
                    <p class="bank">Change withdrawl password</p>
                    </div></a>
                    <hr class="line">
            </div>
            <script>
        function goBack() {
            // Use window.history to go back to the previous page
            window.history.back();
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
$class=$_SESSION['class'];
?>
        <script>
            var x = document.getElementById("snackbar");
            x.innerHTML = "<?php echo $msg; ?>";
            x.classList.add("<?php echo $class;?>");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        </script>

<?php
unset($_SESSION['msg']);
}
?>