<?php
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    $start = input($_GET['start']);
    $end = input($_GET['end']);
    $uid = $_SESSION['userid'];
    $uss = db("select * from users where id='$uid'");
    $usres = mysqli_fetch_assoc($uss);
    $us_promo = $usres['user_promo'];
?>
    <html>

    <head>
        <?php include "pack/header.php"; ?>
        <style>
            .input {
                border: none;
                background: #80808030;
                border-radius: 25px;
                padding: 0px 0px 0px 9px;
                width: 95px;
                margin-right: 20px;
                height: 27px;
                font-size: 12px;
            }

            .emgCont {
                margin-top: 50px;
                height: 150px;
                width: 225px;
            }

            .search {
                margin: 1px 0px 0px 2px;
                border-color: orange;
                background: orange;
                border-radius: 40px;
                border: 1px;
            }

            .level.active {
                width: 100px;
                border-bottom: 1px solid red;
                color: red;
                padding: 10px;
            }

            .a1 {
                padding: 20px;
            }

            .a2 {
                padding: 15px 0px 0px 27px;
            }

            .a3 {
                padding: 15px 0px 12px 27px;
            }

            .info {
                color: orange;
                font-size: 14px;
            }

            .emg {
                height: 40px;
                width: 60px;
            }

            .ssy {
                height: auto;
                padding-bottom: 100px;
            }

            .crd {
                background: white;
                margin: 10px 0px 0px 0px;
                border-radius: 25px;
                width: 356px;

            }

            .aae {
                margin: 20px 0px 0px 0px;
            }

            .aay {
                width: 100%;
                display: flex;
                justify-content: space-between;
            }

            .level {
                width: 100px;
                padding: 10px;
            }

            .par {
                font-size: 15px;
            }

            .ffa {
                display: flex;
                justify-content: center;
                align-items: center;
                background: #FFCC00;
                color: red;
            }

            .si {
                font-size: 13px;
                margin: 4px 0px 0px 0px;
            }

            .ffs {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 10px 0px 0px 0px;
            }

            p {
                margin: 0px 0px 0px 0px;
            }

            .acl {
                display: flex;
                flex-direction: column;
                margin: 10px 170px 10px 0px;
            }

            .pt {
                font-size: 13px;
                color: black;
            }

            .acl_covr {
                border-right: 1px solid #e6dfdf;
            }

            .acd {
                display: flex;
                border: 1px solid #e6dfdf;
                justify-content: space-between;
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

            @media only screen and (max-width: 667px) {
                .input {
                    border: none;
                    background: #80808030;
                    border-radius: 25px;
                    padding: 0px 0px 0px 9px;
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
                    color: black;
                }

                .aay {
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                }

                .level.active {
                    border-bottom: 1px solid red;
                    color: red;
                    padding: 10px;
                }

                .level {
                    padding: 10px;
                }

                .ffa {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: #FFCC00;
                    color: red;
                }

                .ffs {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 10px 0px 0px 0px;
                }

                .acl {
                    display: flex;
                    flex-direction: column;
                    margin: 0px 24px 0px 0px;
                }

                .acd {
                    display: flex;
                    border: 1px solid #e6dfdf;
                    justify-content: space-between;
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
                    padding: 15px 0px 0px 27px;
                }

                .a3 {
                    padding: 15px 0px 12px 27px;
                }

                .info {
                    color: orange;
                    font-size: 14px;
                }

                .emg {
                    height: 40px;
                    width: 60px;
                }

                .ssy {
                    height: auto;
                    padding-bottom: 100px;
                }

                .crd {
                    background: white;
                    margin: 10px 0px 0px 0px;
                    border-radius: 16px;
                    width: 330px;

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

            .searchIcon {
                margin-top: 20px;
            }

            .iconTxt {
                border-radius: 20px;
                padding: 8px;
                width: 100px;
                color: white;
                background: cadetblue;
                text-align: right;
                float: right;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid ffa">
            <h3>My Team</h3>
        </div>
        <div class="container">
            <form action="myteam.php" method="GET">
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
                <div class="acl_covr">
                    <div class="acl">
                        <p class="par">Team assets</p>

                        <?php
                        $wamount1 = 0;
                        // echo "select * from users where promo='$us_promo'";
                        $find3 = db("select * from users where promo='$us_promo'");
                        $num3 = mysqli_num_rows($find3);
                        if ($num3 > 0) {
                            while ($row3 = mysqli_fetch_assoc($find3)) {
                                $ulidss = $row3['id'];
                                $ulipromo = $row3['user_promo'];
                                // echo "select SUM(amount) as total from withdrawal_request where uid='$ulidss'";
                                $invest1 = db("select SUM(amount) as total from withdrawal_request where uid='$ulidss'");
                                $inum1 = mysqli_num_rows($invest1);
                                if ($inum1 > 0) {
                                    $ires1 = mysqli_fetch_assoc($invest1);
                                    $wamount1 += $ires1['total'];

                        ?>

                                <?php
                                } else {
                                    $wamount1;
                                ?>
                                    <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                                    <?php
                                }

                                // echo "select * from users where promo='$ulipromo'";
                                $User3 = db("select * from users where promo='$ulipromo'");
                                while ($roww = mysqli_fetch_assoc($User3)) {
                                    $ID = $roww['id'];
                                    $UserPromo = $roww['user_promo'];
                                    $invest2 = db("select SUM(amount) as total from withdrawal_request where uid='$ID'");
                                    $inum2 = mysqli_num_rows($invest2);
                                    if ($inum2 > 0) {
                                        $ires2 = mysqli_fetch_assoc($invest2);
                                        $wamount1 += $ires2['total'];

                                    ?>

                                    <?php
                                    } else {
                                        $wamount1;
                                    ?>
                                        <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                                        <?php
                                    }
                                    // echo "select * from users where promo='$UserPromo'";
                                    $Users = db("select * from users where promo='$UserPromo'");
                                    if ($UNUM = mysqli_num_rows($Users) > 0) {
                                        while ($rowww = mysqli_fetch_assoc($Users)) {
                                            $UIDS = $rowww['id'];
                                            $invest3 = db("select SUM(amount) as total from withdrawal_request where uid='$UIDS'");
                                            $inum3 = mysqli_num_rows($invest3);
                                            if ($inum3 > 0) {
                                                $ires3 = mysqli_fetch_assoc($invest3);
                                                $wamount1 += $ires3['total'];

                                        ?>

                                            <?php
                                            } else {
                                                $wamount1;
                                            ?>
                                                <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                                        <?php
                                            }
                                            //   echo "select * from withdrawal_request where uid='$UIDS' and uid='$ID' and uid='$ulids'";

                                        }
                                    } else {
                                        $wamount1;
                                        ?>
                                        <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                        <p class="pt">₹<?php echo $wamount1; ?></p>

                    </div>
                </div>

                <div class="acl_covr">
                    <div class="acl">
                        <p class="par">Team Recharge</p>
                        <?php
                        $iamount1 = 0;
                        // echo "select * from users where promo='$us_promo'";
                        $find3 = db("select * from users where promo='$us_promo'");
                        $num3 = mysqli_num_rows($find3);
                        if ($num3 > 0) {
                            while ($row3 = mysqli_fetch_assoc($find3)) {
                                $ulidss = $row3['id'];
                                $ulipromo = $row3['user_promo'];
                                // echo "select SUM(amount) as total from withdrawal_request where uid='$ulidss'";
                                $invest1 = db("select SUM(amount) as total from payments where uid='$ulidss'");
                                $inum1 = mysqli_num_rows($invest1);
                                if ($inum1 > 0) {
                                    $ires1 = mysqli_fetch_assoc($invest1);
                                    $iamount1 += $ires1['total'];

                        ?>

                                <?php
                                } else {
                                    $iamount1;
                                ?>
                                    <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                                    <?php
                                }

                                // echo "select * from users where promo='$ulipromo'";
                                $User3 = db("select * from users where promo='$ulipromo'");
                                while ($roww = mysqli_fetch_assoc($User3)) {
                                    $ID = $roww['id'];
                                    $UserPromo = $roww['user_promo'];
                                    $invest2 = db("select SUM(amount) as total from payments where uid='$ID'");
                                    $inum2 = mysqli_num_rows($invest2);
                                    if ($inum2 > 0) {
                                        $ires2 = mysqli_fetch_assoc($invest2);
                                        $iamount1 += $ires2['total'];

                                    ?>

                                    <?php
                                    } else {
                                        $iamount1;
                                    ?>
                                        <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                                        <?php
                                    }
                                    // echo "select * from users where promo='$UserPromo'";
                                    $Users = db("select * from users where promo='$UserPromo'");
                                    if ($UNUM = mysqli_num_rows($Users) > 0) {
                                        while ($rowww = mysqli_fetch_assoc($Users)) {
                                            $UIDS = $rowww['id'];
                                            $invest3 = db("select SUM(amount) as total from payments where uid='$UIDS'");
                                            $inum3 = mysqli_num_rows($invest3);
                                            if ($inum3 > 0) {
                                                $ires3 = mysqli_fetch_assoc($invest3);
                                                $iamount1 += $ires3['total'];

                                        ?>

                                            <?php
                                            } else {
                                                $iamount1;
                                            ?>
                                                <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                                        <?php
                                            }
                                            //   echo "select * from withdrawal_request where uid='$UIDS' and uid='$ID' and uid='$ulids'";

                                        }
                                    } else {
                                        $iamount1;
                                        ?>
                                        <!--<p class="pt">₹<?php echo "0"; ?></p>-->
                        <?php
                                    }
                                }
                            }
                        }
                        ?>
                        <p class="pt">₹<?php echo $iamount1; ?></p>
                    </div>
                </div>
                <div class="acl_covr_last">
                    <div class="acl">

                        <p class="par">Team Number</p>
                        <?php
                        $total_number = 0;
                        // echo "select * from users where promo='$us_promo'";
                        $team = db("select * from users where promo='$us_promo'");
                        $team_num = mysqli_num_rows($team);
                        $total_number+=$team_num;

                        if ($team_num > 0) {
                            while ($team_row = mysqli_fetch_assoc($team)) {
                                $Userid = $team_row['id'];
                                $Upromo = $team_row['user_promo'];
                                $team1 = db("select * from users where promo='$Upromo'");
                                $team1_num = mysqli_num_rows($team1);
                                $total_number+=$team1_num;
                               
                                while ($team1_row = mysqli_fetch_assoc($team1)) {
                                    $UserId1 = $team1_row['id'];
                                    $Upromo1 = $team1_row['user_promo'];
                                    $team2 = db("select * from users where promo='$Upromo1'");
                                    $team2_num = mysqli_num_rows($team2);
                                    $total_number +=$team2_num;
                        ?>
                            <?php
                                }
                            }
                        } else {
                            $total_number;
                            ?>
                            <!--<p class="pt"><?php echo '0'; ?></p>-->

                        <?php
                        }

                        ?>
                        <p class="pt"><?php echo $total_number; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class=" aay">
                <div class="level active" onclick="openCity(event, 'level1')">First</div>
                <div class="level" onclick="openCity(event, 'level2')">Second</div>
                <div class="level" onclick="openCity(event, 'level3')">Third</div>
            </div>
        </div>
        <div class="container-fluid ssy active" id="level1">
            <?php

            $level1 = "select * from users where promo='$us_promo'";
            $level1 .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
            $level1 .= "ORDER BY addon DESC";

            $find = db($level1);

            
            $fnum = mysqli_num_rows($find);
            if ($fnum > 0) {
                while ($fres = mysqli_fetch_assoc($find)) {
                    $lids = $fres['id'];
                    $User = db("select * from users where id='$lids'");
                    $fetch = mysqli_fetch_assoc($User);
            ?>
                    <div class="crd">
                        <div class="row">
                            <div class="col-xs-2 a1">
                                <img src="img/im1.png" class="emg">
                            </div>
                            <div class="col-xs-4 a2">
                                <p class="info">Name:<?php echo $fetch['name']; ?></p>
                                <?php
                                // echo "select SUM(amountpaid) as amount from orders where uid='$lids'";
                                $invest = db("select SUM(amountpaid) as amount from orders where uid='$lids'");
                                $inum = mysqli_num_rows($invest);
                                $ires = mysqli_fetch_assoc($invest);
                                $iamount = $ires['amount'];
                                if ($iamount != "") {
                                    $iamount;
                                } else {
                                    $iamount = 0;
                                }
                                $with = db("select SUM(amount) as amount from withdrawal_request where uid='$lids'");
                                $wnum = mysqli_num_rows($with);
                                $wres = mysqli_fetch_assoc($with);
                                $wamount = $wres['amount'];
                                if ($wamount != "") {
                                    $wamount;
                                } else {
                                    $wamount = 0;
                                }
                                ?>
                                <p class="info">Investment:<?php echo $iamount; ?>.00</p>
                                <p class="info">Withdraw:<?php echo $wamount; ?>.00</p>
                            </div>
                            <div class="col-xs-4 a3">
                                <p class="info">Phone:<?php echo $fetch['mobile']; ?></p>
                                <p class="info">Registration time <?php echo $fetch['addon']; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No Records";
            }

            ?>


        </div>

        <div class="container-fluid ssy" style="display:none;" id="level2">
            <?php

            $level2 = "select * from users where promo='$us_promo'";
            $level2 .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
            $level2 .= "ORDER BY addon DESC";

            $find2 = db($level2);

            $fnum2 = mysqli_num_rows($find2);
            if ($fnum2 > 0) {
                while ($fres2 = mysqli_fetch_assoc($find2)) {
                    $lids2 = $fres2['id'];
                    $lpromos = $fres2['user_promo'];
                    $User2 = db("select * from users where promo='$lpromos'");
                    $Unum = mysqli_num_rows($User2);
                    if ($Unum > 0) {
                        while ($fetch2 = mysqli_fetch_assoc($User2)) {
                            $l2ids = $fetch2['id'];
                            $u = db("select * from  users where id='$l2ids'");
                            $ufetch = mysqli_fetch_assoc($u);
            ?>
                            <div class="crd">
                                <div class="row">
                                    <div class="col-xs-2 a1">
                                        <img src="img/im1.png" class="emg">
                                    </div>
                                    <div class="col-xs-4 a2">
                                        <p class="info">Name:<?php echo $ufetch['name']; ?></p>
                                        <?php
                                        // echo "select SUM(amountpaid) as amount from orders where uid='$lids'";
                                        $invest = db("select SUM(amountpaid) as amount from orders where uid='$l2ids'");
                                        $inum = mysqli_num_rows($invest);
                                        $ires = mysqli_fetch_assoc($invest);
                                        $iamountts = $ires['amount'];
                                        if ($iamountts != "") {
                                            $iamountts;
                                        } else {
                                            $iamountts = 0;
                                        }
                                        $with = db("select SUM(amount) as amount from withdrawal_request where uid='$l2ids'");
                                        $wnum = mysqli_num_rows($with);
                                        $wres = mysqli_fetch_assoc($with);
                                        $wamounts = $wres['amount'];
                                        if ($wamounts != "") {
                                            $wamounts;
                                        } else {
                                            $wamounts = 0;
                                        }
                                        ?>
                                        <p class="info">Investment:<?php echo $iamountts; ?>.00</p>
                                        <p class="info">Withdraw:<?php echo $wamounts; ?>.00</p>
                                    </div>
                                    <div class="col-xs-4 a3">
                                        <p class="info">Phone:<?php echo $ufetch['mobile']; ?></p>
                                        <p class="info">Registration time <?php echo $ufetch['addon']; ?></p>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
            } else {
                echo "No Record";
            }
            ?>

        </div>

        <div class="container-fluid ssy" style="display:none;" id="level3">
            <?php
            // echo "select * from users where promo='$us_promo'";

            $level3 = "select * from users where promo='$us_promo'";
            $level3 .= (!empty($start) && !empty($end)) ? "AND addon BETWEEN '$start' AND '$end' " : "";
            $level3 .= "ORDER BY addon DESC";

            $find3 = db($level3);


            $num3 = mysqli_num_rows($find3);
            if ($num3 > 0) {
                while ($row3 = mysqli_fetch_assoc($find3)) {
                    $ulids = $row3['id'];
                    $ulipromo = $row3['user_promo'];
                    // echo "select * from users where promo='$ulipromo'";
                    $User3 = db("select * from users where promo='$ulipromo'");
                    $UNUM1 = mysqli_num_rows($User3);
                    if ($UNUM1 > 0) {
                        while ($roww = mysqli_fetch_assoc($User3)) {
                            $ID = $roww['id'];
                            $UserPromo = $roww['user_promo'];
                            // echo "select * from users where promo='$UserPromo'";
                            $Userss = db("select * from users where promo='$UserPromo'");
                            $UNUM3 = mysqli_num_rows($Userss);
                            if ($UNUM3 > 0) {
                                while ($rowww = mysqli_fetch_assoc($Userss)) {
                                    $UIDS = $rowww['id'];
                                    // echo "select * from users where id='$UIDS'";
                                    $Select = db("select * from users where id='$UIDS'");
                                    $Fetch = mysqli_fetch_assoc($Select);
            ?>
                                    <div class="crd">
                                        <div class="row">
                                            <div class="col-xs-2 a1">
                                                <img src="img/im1.png" class="emg">
                                            </div>
                                            <div class="col-xs-4 a2">
                                                <p class="info">Name:<?php echo $Fetch['name']; ?></p>
                                                <?php
                                                // echo "select SUM(amountpaid) as amount from orders where uid='$lids'";
                                                $invest = db("select SUM(amountpaid) as amount from orders where uid='$UIDS'");
                                                $inum = mysqli_num_rows($invest);
                                                $ires = mysqli_fetch_assoc($invest);
                                                $iamountts1 = $ires['amount'];
                                                if ($iamountts1 != "") {
                                                    $iamountts1;
                                                } else {
                                                    $iamountts1 = 0;
                                                }
                                                $with = db("select SUM(amount) as amount from withdrawal_request where uid='$UIDS'");
                                                $wnum = mysqli_num_rows($with);
                                                $wres = mysqli_fetch_assoc($with);
                                                $wamounts1 = $wres['amount'];
                                                if ($wamounts1 != "") {
                                                    $wamounts1;
                                                } else {
                                                    $wamounts1 = 0;
                                                }
                                                ?>
                                                <p class="info">Investment:<?php echo $iamountts1; ?>.00</p>
                                                <p class="info">Withdraw:<?php echo $wamounts1; ?>.00</p>
                                            </div>
                                            <div class="col-xs-4 a3">
                                                <p class="info">Phone:<?php echo $Fetch['mobile']; ?></p>
                                                <p class="info">Registration time <?php echo $Fetch['addon']; ?></p>
                                            </div>
                                        </div>
                                    </div>
            <?php
                                }
                            } else {
                                continue;
                                echo "No Record1";
                            }
                        }
                    } else {
                        continue;
                        echo "No Record 2";
                    }
                }
            } else {
                echo "No Record";
            }
            ?>

            <!--<div class="crd">-->
            <!--    <div class="row">-->
            <!--        <div class="col-xs-2 a1">-->
            <!--            <img src="img/im1.png" class="emg">-->
            <!--            </div>-->
            <!--        <div class="col-xs-4 a2">-->
            <!--            <p class="info">Name:88******2563</p>-->
            <!--            <p class="info">hii</p>-->
            <!--            <p class="info">Investment:0.00</p>-->
            <!--            <p class="info">Withdraw:0.00</p>-->
            <!--            </div>-->
            <!--        <div class="col-xs-4 a3">-->
            <!--            <p class="info">Phone:88******2563</p>-->
            <!--            <p class="info">Registration time:0.00</p>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->

        </div>
        <?php include "footer.php"; ?>

        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("ssy");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("level");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
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