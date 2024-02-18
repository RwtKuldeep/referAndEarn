<?php
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    $uid = $_SESSION['userid'];

    $se = db("SELECT * FROM users WHERE id='$uid'");
    $num_u = mysqli_num_rows($se);
    if ($num_u > 0) {
        $se_res = mysqli_fetch_assoc($se);
        $asset = $se_res['asset'];
        $phone = $se_res['mobile'];
        $name = $se_res['name'];

        // function generateUniqueCode($id, $mobile)
        // {
        //     // Concatenate user's id, name, and phone number
        //     $dataToEncode = $id . $mobile;

        //     // Take the first 8 characters to make it alphanumeric
        //     $code = substr($dataToEncode, 0, 5);

        //     return $code;
        // }
        // $invitationCode = generateUniqueCode($uid, $phone);


        $ss = db("select * from orders where uid='$uid'");
        if ($num1 = mysqli_num_rows($ss)) {
            while ($ores = mysqli_fetch_assoc($ss)) {
                $oid = $ores['id'];
                $pid = $ores['pid'];
                $daays = $ores['days'];
                $invest += $ores['amountpaid'];
                $up_date = $ores['updated_date'];
                $placed_date = $ores['addon']; // Assuming 'addon' is the column storing the purchase date
                $current_date = date('Y-m-d');
                if ($current_date != $up_date) {
                    $p = db("select * from product where id='$pid'");
                    $pres = mysqli_fetch_assoc($p);
                    $income = $pres['daily'];
                    $days = $pres['revenue'];

                    // Calculate the time difference in days between current date and placed_date
                    $pdate = date('Y-m-d', strtotime($placed_date));
                    if ($current_date > $pdate && $daays != '0') {
                        $assetss = $asset + $income;
                        //  echo "UPDATE users SET asset ='$assetss' WHERE id = '$uid'";
                        $update_asset_query = db("UPDATE users SET asset ='$assetss' WHERE id = '$uid'");

                        // Update the user's asset in the users table


                        // Decrease the remaining days for income if applicable
                        $daays--;


                        // Update the remaining days in the orders table
                        // echo "UPDATE orders SET days = $daays WHERE uid = '$uid' AND pid = '$pid'";
                        $update_days_query = db("UPDATE orders SET days = $daays,updated_date='$current_date' WHERE uid = '$uid' AND pid = '$pid' AND id='$oid'");
                    }
                }
            }
        }
    }



?>
    <!DOCTYPE html>
    <html>
    <?php include "pack/header.php"; ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: red;
        }

        .container {
            padding: 5px;
        }

        p {
            margin: 0px 0px 2px;
        }

        .aa {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            flex-wrap: wrap;
        }

        .log {
            width: 150px;
            /* Ensure the image doesn't overflow on smaller screens */
            height: 100px;
            border-radius: 50%;
        }

        .aab {
            padding: 20px;
        }

        .u_id {
            background: #FFCC00;
            color: red;
            border-radius: 10px;
            font-size: 18px;
            padding: 7px;
            margin: 15px 0px 0px 6px;
        }

        .tabs {
            display: flex;
            justify-content: space-between;
            background-color: #FFCC00;
            color: #fff;
            padding: 10px;
            height: 230px;
        }

        .tab {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 20px;
            height: 50px;
            cursor: pointer;
            font-size: 15px;
        }

        .icon {
            padding: 0px 14px 0px 0px;
        }

        .c_i {
            font-size: 17px;
        }

        .co_i {
            font-size: 17px;
        }

        .p_i {
            font-size: 17px;
        }

        .pd_i {
            font-size: 17px;
        }

        .d_i {
            font-size: 17px;
        }

        .s_i {
            font-size: 17px;
        }

        .tab1 {
            display: flex;
            align-items: center;
            background: #FFCC00;
            color: red;
            border-radius: 10px;
            padding: 15px;
            font-size: 15px;
            margin: 15px 0 35px 2px;
        }
    </style>
    <!-- Add CSS media queries for mobile responsiveness -->
    <style>
        @media (max-width: 768px) {

            /* Add your CSS styles here */
            body {
                font-family: Arial, sans-serif;
                background-color: red;
            }

            .container {
                padding: 5px;
                max-width: none;
            }

            p {
                margin: 0px 0px 2px;
            }

            .aa {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 20px;
                flex-wrap: wrap;
            }

            .log {
                width: 150px;
                /* Ensure the image doesn't overflow on smaller screens */
                height: 100px;
                border-radius: 50%;
            }

            .aab {
                padding: 20px;
                margin-bottom: 40px;
            }

            .u_id {
                background: #FFCC00;
                color:red;
                border-radius: 10px;
                font-size: 18px;
                padding: 7px;
                margin: 15px 0px 0px 6px;
            }

            .tabs {
                display: flex;
                justify-content: center;
                background-color: #FFCC00;
                color: #fff;
                padding: 10px 0px 10px 0px;
                height: 230px;
            }

            .tab {
                padding: 0px;
                cursor: pointer;
                font-size: 16px;
            }

            .icon {
                padding: 0px 14px 0px 0px;
            }

            .c_i {
                font-size: 17px;
            }

            .co_i {
                font-size: 17px;
            }

            .p_i {
                font-size: 17px;
            }

            .pd_i {
                font-size: 17px;
            }

            .d_i {
                font-size: 17px;
            }

            .s_i {
                font-size: 17px;
            }

            .tab1 {
                display: flex;
                align-items: center;
                background: #FFCC00;
                color: red;
                border-radius: 10px;
                padding: 15px;
                font-size: 15px;
                margin: 15px 0 35px 2px;
            }
        }
    </style>

    <body>
        <div class="container">
            <div class="aa">
                <img src="img/dhl_logo.jpg" alt="No Image" class="log">
                <div class="u_id">
                     <!-- Yaha User ka number lana hai   -->
                     <?php echo $name; ?></div>
            </div>
            <div class="tabs">
                <div class="tab">
                    <p>Assets</p>
                    <?php
                    $as = db("select * from users where id='$uid'");
                    $ares = mysqli_fetch_assoc($as);
                    $aas = $ares['asset'];
                    ?>
                    <p style="margin-bottom:3px;">₹<?php echo $aas; ?>.00</p>
                </div>
                <div class="tab">
                    <p>Investment</p>
                    <?php
                    if ($invest != '') {
                    ?>
                        <p>₹<?php echo $invest; ?>.00</p>
                    <?php
                    } else {
                    ?>

                        <p style="margin-bottom:3px;">₹<?php echo '0'; ?>.00</p>

                    <?php
                    }
                    ?>

                </div>
                <div class="tab">
                    <p>Recharge</p>
                    <?php
                    $w = db("select * from wallet where uid='$uid'");
                    $num = mysqli_num_rows($w);
                    if ($num > 0) {
                        $res = mysqli_fetch_assoc($w);
                        $amt = $res['wallet_balance'];
                    ?>
                        <p style="margin-bottom:3px;">₹<?php echo $amt; ?>.00</p>
                    <?php
                    } else {
                    ?>
                        <p style="margin-bottom:3px;">₹0.00</p>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="aab">
                <a href="account_record.php">
                    <div class="tab1">
                        <div class="icon" id="username-icon">
                            <i class="	fa fa-credit-card c_i"></i>
                        </div>
                        Account Record
                    </div>
                </a>
                <a href="info.php">
                    <div class="tab1">
                        <div class="icon" id="username-icon">
                            <i class="fa fa-institution co_i"></i>
                        </div>
                        Company
                    </div>
                </a>
                <a href="personal_center.php">
                    <div class="tab1">
                        <div class="icon" id="username-icon">
                            <i class="fa fa-user p_i"></i>
                        </div>
                        Personal information
                    </div>
                </a>
                <a href="plan_record.php">
                    <div class="tab1">
                        <div class="icon" id="username-icon">
                            <i class="fa fa-drivers-license-o pd_i"></i>
                        </div>
                        plan Details
                    </div>
                </a>
                <!--<div class="tab1">-->
                <!--    <div class="icon" id="username-icon">-->
                <!--        <i class="fa fa-download d_i"></i>-->
                <!--    </div>-->
                <!--    Downloads-->
                <!--</div>-->
                <a href="php/logout.php">
                    <div class="tab1">
                        <div class="icon" id="username-icon">
                            <i class="fa fa-sign-out s_i"></i>
                        </div>
                        Sign Out
                    </div>
                </a>
            </div>
        </div>
        <?php include "footer.php"; ?>
        <div id="snackbar"></div>
    </body>

    </html>
<?php
} else {
    header("Location:login.php");
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