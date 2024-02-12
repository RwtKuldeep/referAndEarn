<?php
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    $uid = $_SESSION['userid'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include "pack/header.php"; ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <style>
            .slider {
                max-width: 1000px;
                position: relative;
                margin: 0px auto;
            }

            .para {
                font-size: 15px;
                color: white;
                text-decoration: none;
            }

            .iii {
                color: orange;
                font-size: 18px;
            }

            .aac {
                padding-top: 18px;
                background-color: #B0B0D7;
            }

            .headi {
                align-items: center;
                display: flex;
                justify-content: center;
                font-weight: 700;
                color: black;
            }

            .spa {
                font-size: 15px;
            }

            .aao {
                display: flex;
                justify-content: center;
                flex-direction: column;
                align-items: center;
            }

            .slider img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                display: none;
            }

            .aag {
                background:#FFCC00;
                margin: 0px 0px 0px 0px;
            }

            .slider .dots {
                position: absolute;
                bottom: 10px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 1;
            }

            .para1 {
                font-size: 13px;
                color: black;
                text-decoration: none;
            }

            .cardd0 {
                width: 96%;
                background:red;
                padding: 0px 0px 50px 0px;
                margin: 10px 0px 0px 0px;
            }

            .cardd1 {
                width: 96%;
                background:red;
                border-radius: 12px;
                padding: 0px 0px 50px 0px;
                margin: 10px 0px 0px 0px;
            }

            .cardd2 {
                width: 96%;
                background:red;
                border-radius: 12px;
                padding: 0px 0px 50px 0px;
                margin: 10px 0px 0px 0px;
            }

            .imgh {
                height: 243px;
                width: 100%;
            }

            .ard {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .tab {
                margin-top: 20px;
                overflow: hidden;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: #7E7EBF;
                color: black;
                float: left;
                height: 40px;
                border-radius: 50%;
                border: 1px solid #7E7EBF;
                outline: none;
                cursor: pointer;
                display: flex;
                align-items: center;
                padding: 7%;
                transition: 0.3s;
                font-size: 17px;
                margin: 0px 0px 17px -10px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: white;
                color: orange;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #6868D5;
                color: white;
            }

            /* Style the tab content */
            .tabcontent {
                padding: 6px 12px;
                /*border: 1px solid #ccc;*/
                border-top: none;
            }

            .pp {
                font-size: 12px;
                color: white;
                padding: 5px;
            }

            .pp1 {
                font-size: 12px;
                color: white;
                padding: 5px;
            }

            .tab1 {
                display: flex;
                align-content: center;
                color: white;
                margin: 10px 12px 12px 0px;
                padding: 10px 0px 0px 1px;
                text-align: center;
                width: 45%;
                border: 1px solid white;
                font-weight: 700;
            }

            .pre {
                width: 180px;
                height: 50px;
                border-radius: 50%;
                font-size: 15px;
                color: black;
                border: 1px solid #cc0033;
                cursor: not-allowed;
            }

            .buy {
                width: 180px;
                height: 50px;
                border-radius: 50%;
                background: #6c6cee;
                font-size: 15px;
                color: white;
                border: 1px solid #cc0033;
            }

            .aat {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-left: 3px;
            }

            .rbt {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
            }

            .slider .dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: #ccc;
                display: inline-block;
                margin: 0 5px;
                cursor: pointer;
            }

            .slider .dot.active {
                background-color: #333;
            }

            .header_Img img {
                width: 100%;
                background-color: #FFCC00;
            }

            .headIconsClass {
                height: 30px;
            }

            .units {
                color: #fff;
                font-size: 12px;
                font-weight: bold;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="header_Img">
            <img src="img/mainImge.webp" alt="Image 1">
            <!-- <img src="img/46.jpg" alt="Image 2">
        <img src="img/49.jpg" alt="Image 3"> -->
            <!-- <div class="dots">
            <span class="dot active" onclick="showSlide(0)"></span>

            <span class="dot" onclick="showSlide(2)"></span>
        </div> -->
        </div>
        <div class="container-fluid aac">
            <div class="row">
                <div class="col-xs-3 aao">
                    <div class="item">
                        <a href="gateway/form.php?purpose=<?php echo "Recharge"; ?>&uid=<?php echo $uid; ?>">
                            <img class="headIconsClass" src="img/recharge.png" />
                        </a>
                    </div>
                    <p class="para">Recharge</p>
                </div>
                <div class="col-xs-3 aao">
                    <div class="item">
                        <a href="https://t.me/Land_rover_app_php1">
                            <img class="headIconsClass" src="img/telegram.png" />
                        </a>
                    </div>
                    <p class="para">Channel</p>
                </div>
                <div class="col-xs-3 aao">
                    <div class="item">
                        <a href="https://t.me/Land_rover_app_php1">
                            <img class="headIconsClass" src="img/kefu.png" />
                        </a>
                    </div>
                    <p class="para">Online</p>
                </div>
                <div class="col-xs-3 aao">
                    <div class="item">
                        <a href="withdraw.php">
                            <img class="headIconsClass" src="img/withdraw.png" />
                        </a>
                    </div>
                    <p class="para">Withdraw</p>
                </div>

            </div>
        </div>
        <div class="container-fluid aag">
            <div class="row tab">
                <div class="col-xs-6">
                    <button class="tablinks active" onclick="openCity(event, 'London')">Long Term Project</button>
                </div>
                <div class="col-xs-6">
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Welfare dividends</button>
                </div>
            </div>


            <div id="London" class="tabcontent">
                <div class="row ard">
                    <?php
                    $p = db("select * from product");
                    $p_num = mysqli_num_rows($p);
                    if ($p_num > 0) {
                        $j = 0;
                        $i = 1;
                        while ($res = mysqli_fetch_assoc($p)) {
                    ?>
                            <div class="cardd<?php echo $j; ?>">
                                <img src="image/product/<?php echo $res['path']; ?>" alt="Image-<?php echo $res['path']; ?>" class="imgh">
                                <?php
                                if ($i == 2) {
                                ?>
                                    <h3 class="headi">Plan<?php echo $i; ?></h3>
                                    <p class="units">Daily Earning/Daily Withdrawal</p>
                                <?php
                                } else {
                                ?>
                                    <h3 class="headi">Plan<?php echo $i; ?></h3>
                                    <p class="units">Daily Earning/Daily Withdrawal</p>

                                <?php
                                }
                                ?>
                                <div class="row aat">

                                    <div class="tab1">
                                        <p class="pp">Price:</p>
                                        <p class="pp">₹<?php echo $res['trending']; ?></p>
                                    </div>

                                    <div class="tab1">
                                        <p class="pp">Daily income:</p>
                                        <p class="pp"> ₹<?php echo $res['daily']; ?></p>
                                    </div>
                                </div>
                                <div class="row aat">
                                    <div class="tab1">
                                        <p class="pp1">Total income:</p>
                                        <p class="pp1">₹<?php echo $res['total']; ?></p>
                                    </div>
                                    <div class="tab1">
                                        <p class="pp">Complete cycle:</p>
                                        <p class="pp"><?php echo $res['revenue']; ?>days</p>
                                    </div>
                                </div>
                                <div class="row rbt">
                                    <?php
                                    if ($i == 1 || $i == 2) {
                                    ?>
                                        <center><a href="php/purchase.php?amt=<?php echo $res['trending']; ?>&pid=<?php echo $res['id']; ?>"><button class="buy">Buy Plan</button></a></center>

                                    <?php
                                    } else {
                                    ?>
                                        <center><button class="pre">Pre-Sale</button></center>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php
                            $i++;
                        }
                    }
                    ?>
                    <!--<div class="cardd1">-->
                    <!--    <img src="img/STS.jpg" alt="Image 2" class="imgh">-->
                    <!--    <h3 style="text-align:center">Product1</h3>-->
                    <!--    <div class="row aat">-->

                    <!--            <div class="tab1">-->
                    <!--                <p class="pp">Trending Price</p>-->
                    <!--                <p class="pp">₹489.00</p>-->

                    <!--                </div>-->

                    <!--            <div class="tab1">-->
                    <!--                <p class="pp">Daily Income</p>-->
                    <!--                <p class="pp"> ₹111.00</p>-->

                    <!--                </div>-->
                    <!--        </div>-->
                    <!--    <div class="row aat">-->
                    <!--            <div class="tab1">-->
                    <!--                <p class="pp">Revenue Cycle</p>-->
                    <!--                <p class="pp">220days</p>-->
                    <!--            </div>-->
                    <!--            <div class="tab1">-->
                    <!--                <p class="pp1">Total Income</p>-->
                    <!--                <p class="pp1">₹24420.00</p>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="row rbt">-->
                    <!--            <center><button class="buy">Buy Plan</button></center>-->
                    <!--            </div>-->
                    <!--</div>-->
                    <!--<div class="cardd2">-->
                    <!--    <img src="img/STS.jpg" alt="Image 2" class="imgh">-->
                    <!--    <h3 style="text-align:center">Product1</h3>-->
                    <!--    <div class="row aat">-->

                    <!--            <div class="tab1">-->
                    <!--                <p class="pp">Trending Price</p>-->
                    <!--                <p class="pp">₹489.00</p>-->

                    <!--                </div>-->

                    <!--            <div class="tab1">-->
                    <!--                <p class="pp">Daily Income</p>-->
                    <!--                <p class="pp"> ₹111.00</p>-->

                    <!--                </div>-->
                    <!--        </div>-->
                    <!--    <div class="row aat">-->
                    <!--            <div class="tab1">-->
                    <!--                <p class="pp">Revenue Cycle</p>-->
                    <!--                <p class="pp">220days</p>-->
                    <!--            </div>-->
                    <!--            <div class="tab1">-->
                    <!--                <p class="pp1">Total Income</p>-->
                    <!--                <p class="pp1">₹24420.00</p>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="row rbt">-->
                    <!--            <center><button class="buy">Buy Plan</button></center>-->
                    <!--            </div>-->
                    <!--</div>-->
                </div>
            </div>
            <div id="Paris" class="tabcontent" style="display:none;">
                <div class="row ard">
                    <div class="cardd0">
                        <img src="img/1.jpg" alt="Image 2" class="imgh">
                        <h3 style="text-align:center; font-weight:700;color:black;">Welfare A</h3>
                        <p class='units'>Allowed to buy (units):10</p>
                        <div class="row aat">

                            <div class="tab1">
                                <p class="pp">Trending Price:</p>
                                <p class="pp">₹12000</p>

                            </div>

                            <div class="tab1">
                                <p class="pp">Daily Income:</p>
                                <p class="pp"> ₹15000</p>

                            </div>
                        </div>
                        <div class="row aat">
                            
                            <div class="tab1">
                                <p class="pp1">Total Income:</p>
                                <p class="pp1">₹450000</p>
                            </div>

                            <div class="tab1">
                                <p class="pp">Complete cycle:</p>
                                <p class="pp">30days</p>
                            </div>
                        </div>
                        <div class="row rbt">
                            <center><button class="pre">Pre Sale</button></center>
                        </div>
                    </div>
                    <div class="cardd1">
                        <img src="img/2.jpg" alt="Image 2" class="imgh">
                        <h3 style="text-align:center; font-weight:700;color:black;">Welfare B</h3>
                        <p class='units'>Allowed to buy (units):10</p>
                        <div class="row aat">

                            <div class="tab1">
                                <p class="pp">Trending Price:</p>
                                <p class="pp">₹10000</p>

                            </div>

                            <div class="tab1">
                                <p class="pp">Daily Income:</p>
                                <p class="pp"> ₹8500</p>

                            </div>
                        </div>
                        <div class="row aat">
                            
                            <div class="tab1">
                                <p class="pp1">Total Income:</p>
                                <p class="pp1">₹255000</p>
                            </div>

                            <div class="tab1">
                                <p class="pp">Complete cycle:</p>
                                <p class="pp">30days</p>
                            </div>
                        </div>
                        <div class="row rbt">
                            <center><button class="buy">Buy now</button></center>
                        </div>
                    </div>

                    <div class="cardd1">
                        <img src="img/3.jpg" alt="Image 2" class="imgh">
                        <h3 style="text-align:center; font-weight:700;color:black;">Welfare C</h3>
                        <p class='units'>Allowed to buy (units):10</p>
                        <div class="row aat">

                            <div class="tab1">
                                <p class="pp">Trending Price:</p>
                                <p class="pp">₹10000</p>

                            </div>

                            <div class="tab1">
                                <p class="pp">Daily Income:</p>
                                <p class="pp"> ₹8500</p>

                            </div>
                        </div>
                        <div class="row aat">
                            
                            <div class="tab1">
                                <p class="pp1">Total Income:</p>
                                <p class="pp1">₹255000</p>
                            </div>

                            <div class="tab1">
                                <p class="pp">Complete cycle:</p>
                                <p class="pp">30days</p>
                            </div>
                        </div>
                        <div class="row rbt">
                            <center><button class="buy">Buy now</button></center>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm" style="margin-top:200px;">

                <!--Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background:orange;color:white;">
                        <center>
                            <h4 class="modal-title">Notice</h4>
                        </center>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Welcome to the Rangerover Long Term App</p>
                        <p>Registration bonus = 60 rs.</p>
                        <p>Minimum Withdrawal = 120 rs.</p>
                        <p>Withdrawal time = 00:30-18:30.</p>
                        <p style="color:red;">All plans = daily income, daily withdrawals.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <?php include "footer.php"; ?>
        <div id="snackbar"><span id="tick-icon"></span></div>
        <script>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        </script>
        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
        </script>
        <script>
            let currentSlide = 0;
            const slides = document.querySelectorAll('.slider img');
            const dots = document.querySelectorAll('.slider .dot');

            function showSlide(slideIndex) {
                if (slideIndex >= slides.length) {
                    slideIndex = 0;
                } else if (slideIndex < 0) {
                    slideIndex = slides.length - 1;
                }

                slides.forEach((slide, index) => {
                    if (index === slideIndex) {
                        slide.style.display = 'block';
                    } else {
                        slide.style.display = 'none';
                    }
                });

                dots.forEach((dot, index) => {
                    if (index === slideIndex) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });

                currentSlide = slideIndex;
            }

            showSlide(currentSlide);

            // Auto-advance the slider
            setInterval(() => {
                showSlide(currentSlide + 1);
            }, 3000);
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