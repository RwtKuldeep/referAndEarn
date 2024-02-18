<?php
error_reporting(E_ERROR | E_PARSE);
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    $uid = $_SESSION['userid'];
    $start = input($_GET['start']);
    $end = input($_GET['end']);
?>
    <html>

    <head>
        <?php include "pack/header.php"; ?>
        <style>
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 2px solid black;
            }

            th,
            td {
                text-align: left;
                padding: 8px;
                border: 2px solid black;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2
            }

            .input {
                border: none;
                background: #80808030;
                border-radius: 25px;
                padding: 0px 0px 0px 22px;
                width: 95px;
                margin-right: 20px;
                height: 27px;
            }

            .a2 {
                padding: 15px 0px 0px 27px;
            }

            .a3 {
                padding: 15px 0px 12px 27px;
            }

            .info {
                color: red;
                font-size: 15px;
            }

            .info1 {
                color: black;
                font-size: 16px;
            }

            .acl.active {
                border-bottom: 1px solid orange;
                color: orange;
            }

            .search {
                margin: 1px 0px 0px 2px;
                border-color: orange;
                background: orange;
                border-radius: 40px;
                border: 1px;
            }

            .al {
                font-size: 17px;
                margin: 0px 0px 0px 0px;
            }

            .acco {
                padding: 0px 0px 0px 105px;
                font-size: 16px;
            }

            .a1 {
                padding: 20px;
            }

            .a2 {
                padding: 8px 0px 0px 27px;
            }

            .a3 {
                padding: 8px 0px 0px 27px;
            }

            .emg {
                height: 40px;
                width: 60px;
            }

            .ssy {
                background: #99999963;
                margin-top: 0px;
                height: auto;
                padding-bottom: 10px;
            }

            .crd {
                background: white;
                margin: 10px 0px 0px 0px;
                border-radius: 25px;

            }

            .aae {
                margin: 40px 0px 0px 0px;
            }

            .aay {
                display: flex;
                margin: 40px 0px 0px 0px;
            }

            .level {
                margin: 0px 49px 0px 20px;
            }

            .par {
                font-size: 15px;
            }

            .ffa {
                display: flex;
                align-items: center;
                background: #FFCC00;
                color: white;
            }

            .si {
                font-size: 13px;
                margin: 5px 0px 0px 0px;
            }

            .ffs {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 10px 0px 0px 0px;
            }

            .acl {
                display: flex;
                margin: 0px 48px 0px 0px;
            }

            .pt {
                font-size: 13px;
                margin: 0px 0px 0px 32px;
                color: orange;
            }

            .acd {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .to {
                font-size: 15px;
                margin: 0px 8px 0px 8px;
            }

            .item {
                border-radius: 25px;
                padding: 0px 0px 0px 0px;
                font-size: 15px;
                width: 95px;
                background: #80808030;
            }

            .item1 {
                display: flex;
                margin-left: 10px;
                background: orange;
                color: white;
                border-radius: 25px;
                font-size: 15px;
                padding: 2px 0px 0px 15px;
                height: 27px;
                width: 116px;

            }

            .outer {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .right {
                display: flex;
                align-items: center;
                justify-content: end;
            }

            .content {
                padding: 10px;
                background-color: #f2f2f2;
                border-radius: 15px;
            }

            .status {
                min-width: 10px;
                padding: 4px 15px;
                font-size: 12px;
                font-weight: 700;
                line-height: 2;
                border-radius: 10px;
            }


            @media only screen and (max-width: 667px) {
                .input {
                    border: none;
                    background: #80808030;
                    border-radius: 25px;
                    padding: 0px 0px 0px 7px;
                    width: 95px;
                    margin-right: 20px;
                    height: 27px;
                    font-size: 12px;
                }

                .par {
                    font-size: 14px;
                }

                .pt {
                    font-size: 13px;
                    margin: 0px 0px 0px 32px;
                    color: orange;
                }

                .aay {
                    display: flex;
                    margin: 40px 0px 0px 0px;
                }

                .level {
                    margin: 0px 45px 0px 20px;
                }

                .ffa {
                    display: flex;
                    align-items: center;
                    background: #FFCC00;
                    color: white;
                }

                .ffs {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 10px 0px 0px 0px;
                }

                .acl {
                    display: flex;
                    margin: 0px 44px 0px 0px;
                    /*justify-content:center;*/
                    /*align-items:center;*/
                }

                .acd {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .to {
                    font-size: 15px;
                    margin: 0px 8px 0px 8px;
                }

                .item {
                    border-radius: 25px;
                    padding: 0px 0px 0px 0px;
                    font-size: 15px;
                    width: 95px;
                    background: #80808030;
                }

                .a1 {
                    padding: 20px;
                }

                .a2 {
                    padding: 8px 0px 0px 27px;
                }

                .a3 {
                    padding: 8px 0px 0px 27px;
                }

                .emg {
                    height: 40px;
                    width: 60px;
                }

                .ssy {
                    background: #99999963;
                    margin-top: 0px;
                    height: auto;
                    padding-bottom: 10px;
                }

                .crd {
                    background: white;
                    margin: 10px 0px 0px 0px;
                    border-radius: 16px;

                }

                .item1 {
                    margin-left: 10px;
                    background: orange;
                    color: white;
                    border-radius: 25px;
                    font-size: 15px;
                    padding: 2px 0px 0px 15px;
                    height: 27px;
                    width: 116px;

                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid ffa">
            <div class="typ">
                <i class="fa fa-angle-left al" onclick="goBack()"></i>
            </div>
            <div class="acr">
                <h5 class="acco">Account Record</h5>
            </div>
        </div>
        <div class="container">
            <form action="account_record.php" method="GET">
                <div class="row ffs">
                    <div class="item">
                        <input type="date" name="start" class="input" value="<?php echo $start; ?>">
                    </div>
                    <p class="to">to</p>
                    <div class="item">
                        <input type="date" name="end" class="input" value="<?php echo $end; ?>">
                    </div>
                    <div class="item1">
                        <i class="fa fa-search si"></i>
                        <button class="search" type="submit">search for</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container-fluid aae">
            <div class="row acd">
                <div class="acl active" onclick="openCity(event, 'Types')">
                    <p class="par">All Types</p>
                </div>
                <div class="acl" onclick="openCity(event, 'withdraw')">
                    <p class="par">Withdraw</p>
                </div>
                <div class="acl" onclick="openCity(event, 'recharge')">
                    <p class="par">Recharge</p>
                </div>
            </div>
        </div>
        <div class="container-fluid ssy" id="Types">
            <div style="overflow-x:auto;margin-top:20px;">

                <?php
                // echo "SELECT amount, addon AS datetime FROM refer where to_uid='$uid' ";
                $plan = "SELECT amountpaid as amount, addon AS datetime FROM orders where uid='$uid' ";
                $plan .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
                $plan .= "ORDER BY addon DESC";
                $referal_query = "SELECT amount, addon AS datetime FROM refer where to_uid='$uid' ";
                $referal_query .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
                $referal_query .= "ORDER BY addon DESC";

                $payments_query = "SELECT amount, addon AS datetime FROM payments where uid='$uid' ";
                $payments_query .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
                $payments_query .= "ORDER BY addon DESC";

                $withdrawal_query = "SELECT amount, status AS Status, addon AS datetime FROM withdrawal_request where uid='$uid' ";
                $withdrawal_query .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
                $withdrawal_query .= "ORDER BY addon DESC";

                // Fetch data from the database
                $payments_result = db($payments_query);
                $withdrawal_result = db($withdrawal_query);
                // echo "hii";
                $refer_result = db($referal_query);
                $plan_result = db($plan);

                $combined_data = array();

                // Fetch payment data
                while ($row = mysqli_fetch_assoc($plan_result)) {
                    $row['type'] = 'Plan Purchase';
                    $row['status'] = 'success';
                    $row['symbol'] = '-';
                    $combined_data[] = $row;
                }
                while ($row = mysqli_fetch_assoc($payments_result)) {
                    $row['type'] = 'Recharge';
                    $row['status'] = 'success';
                    $row['symbol'] = '+';
                    $combined_data[] = $row;
                }

                // Fetch withdrawal data
                while ($row = mysqli_fetch_assoc($withdrawal_result)) {
                    $row['type'] = 'Withdrawal';
                    $row['symbol'] = '-';
                    $combined_data[] = $row;
                }

                // Fetch withdrawal data
                while ($row = mysqli_fetch_assoc($refer_result)) {
                    $row['type'] = 'referal';
                    $row['symbol'] = '+';
                    $combined_data[] = $row;
                }

                // Function to sort the combined data by datetime
                function sortByDateTime($a, $b)
                {
                    return strtotime($b['datetime']) - strtotime($a['datetime']);
                }

                usort($combined_data, 'sortByDateTime');

                $getasset = db("select * from asset where user_id={$_SESSION['userid']}");
                $numgetasset = mysqli_num_rows($getasset);

                // Display the combined data
                if (!empty($combined_data) || $numgetasset > 0) {

                    if ($numgetasset > 0) {
                        $i = 1;
                        while ($res = mysqli_fetch_assoc($getasset)) {
                ?>
                            <div class="crd">
                                <div class="row">
                                    <div class="col-xs-6 a2">
                                        <p class="info"><?php echo $res['date_time'] ?></p>
                                        <p class="info1" style="color:orange;">Asset +<?php echo $res['asset'] . '.00'; ?></p>
                                    </div>
                                    <div class="col-xs-2 a3"></div>
                                    <div class="col-xs-4 a3">
                                        <p class="info2"><span class="badge rounded-pill bg-success">Success</span></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    foreach ($combined_data as $data) {
                        ?>
                        <div class="crd">
                            <div class="row">
                                <div class="col-xs-6 a2">
                                    <p class="info"><?php echo $data['datetime']; ?></p>
                                    <p class="info1" style="color:orange;"><?php echo $data['type'] . '  ' . $data['symbol'] . $data['amount'] . '.00'; ?></p>
                                </div>
                                <div class="col-xs-2 a3"></div>
                                <div class="col-xs-4 a3">
                                    <p class="info2"><?php
                                                        if (isset($data['Status'])) {
                                                            if ($data['Status'] == 0) {
                                                                echo '<span class="badge rounded-pill bg-warning">Pending</span>';
                                                            } elseif ($data['Status'] == 1) {
                                                                echo '<span class="badge rounded-pill bg-success">Success</span>';
                                                            } elseif ($data['Status'] == 2) {
                                                                echo '<span class="badge rounded-pill bg-danger">Declined</span>';
                                                            }
                                                        } else {
                                                            echo '<span class="badge rounded-pill bg-success">Success</span>';
                                                        }
                                                        ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                        $k++;
                    }
                } else {
                    echo "No Record";
                }
                ?>




            </div>

        </div>
        <div class="container-fluid ssy" style="display:none;" id="withdraw">
            <div style="overflow-x:auto;margin-top:20px;">

                <?php
                $with = "SELECT * FROM withdrawal_request WHERE uid='$uid'";

                if (!empty($start) && !empty($end)) {
                    // Add conditions to the queries if start and end dates are provided
                    $with .= " AND addon BETWEEN '$start' AND '$end'";
                }

                $with .= " ORDER BY id DESC"; // Adding ORDER BY id DESC to the query

                $withdrawal_result1 = db($with);
                $numw = mysqli_num_rows($withdrawal_result1);

                if ($numw > 0) {
                    $i = 1;
                    while ($wres = mysqli_fetch_assoc($withdrawal_result1)) {
                        $amount = $wres['amount'];
                        $status = $wres['status'];
                        $addonn = $wres['addon'];
                ?>
                        <div class="crd">
                            <div class="row">
                                <div class="col-xs-6 a2">
                                    <p class="info"><?php echo $addonn; ?></p>
                                    <p class="info1" style="color:orange;"><?php echo 'Withdraw ' .  '-' . $amount . '.00'; ?></p>
                                </div>
                                <div class="col-xs-2 a3"></div>
                                <div class="col-xs-4 a3">
                                    <p class="info2">
                                        <?php
                                        if ($status == 0) {
                                            echo '<span class="badge rounded-pill bg-warning"">Pending</span>';
                                        } elseif ($status == 1) {
                                            echo '<span class="badge rounded-pill bg-success">Success</span>';
                                        } elseif ($status == 2) {
                                            echo '<span class="badge rounded-pill bg-danger">Decline</span>';;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                        $i++;
                    }
                } else {
                    echo "No record";
                }
                ?>

            </div>
        </div>
        <div class="container-fluid ssy" style="display:none;" id="recharge">
            <div style="overflow-x:auto;margin-top:20px;">

                <?php
                $s = "select * from payments where uid='$uid'";
                if (!empty($start) && !empty($end)) {
                    // Add conditions to the queries if start and end dates are provided
                    $s .= " AND addon BETWEEN '$start' AND '$end'";
                }
                $s .= "Order By id DESC";
                $payment_result1 = db($s);
                $num = mysqli_num_rows($payment_result1);
                if ($num > 0) {
                    $i = 1;
                    while ($res = mysqli_fetch_assoc($payment_result1)) {
                        $amt = $res['amount'];
                        $date = $res['addon'];
                ?>

                        <div class="crd">
                            <div class="row">
                                <div class="col-xs-6 a2">
                                    <p class="info"><?php echo $date; ?></p>
                                    <p class="info1" style="color:orange;"><?php echo 'Recharge ' .  '+' . $amt . '.00'; ?></p>
                                </div>
                                <div class="col-xs-2 a3"></div>
                                <div class="col-xs-4 a3">
                                    <p class="info2">
                                        <?php

                                        echo '<span class="badge rounded-pill bg-success">Success</span>';

                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                        $i++;
                    }
                } else {
                    echo "No record";
                }
                ?>




            </div>
        </div>

        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("ssy");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("acl");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
        <script>
            function goBack() {
                // Use window.history to go back to the previous page
                window.history.back();
            }
        </script>
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