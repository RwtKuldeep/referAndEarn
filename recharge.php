<html>
    <head>
        <?php include "pack/header.php";?>
        <style>
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
        .ru{
    color:orange;
    font-size:16px;
}
        .personal{
            font-size:14px;
            margin:1px 0px 0px 94px;
            padding:15px 0px 14px 26px;
            text-align:center;
        }
        .para{
            color:red;
        }
        .aac{
            margin:0px 0px 0px 0px;
            padding: 36px 24px 0px 39px;
        }
        .in{
            margin: 46px 0px 0px -50px;
            width: 211px;
            height: 31px;
             border: none; 
            font-size: 16px;
        }
        .line{
            margin:0px 0px 0px 0px;
            height:2px;
            background:grey;
        }
        .amount{
            font-size:15px;
        }
        .crfs{
            border: 1px solid #808080a1;
            padding: 24px 20px 0px 35px;
            margin-top: 20px;
        }
        .recharge{
            background: orange;
            color: white;
            height: 41px;
            width: 100%;
            border:1px solid orange;
            border-radius: 7px;
            padding: 0px 0px 0px 0px;
            margin: 20px 0px 16px 0px;
        }
        </style>
    </head>
    <body>
        <div class="container-fluid aad">
                <i class="fa fa-angle-left al" onclick="goBack()"></i>
                <p class="personal">Recharge</p>
            </div>
            <div class="container-fluid">
                <div class="crfs">
                <div class="row">
                <p class="amount">Enter Amount:</p>
                <p class="ru">₹</p>
                <input type="text" placeholder="Amount" class="in" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="6" required>
                <button class="recharge">Recharge</button>
                </div>
                <div class="row">
                    <p class="para">1:According to the recharge video, it helps you quickly recahrge successfully.</p>
                    <p class="para">2:if the funds are not recieved in time,Pls contact the App's online customer service immediately.</p>
                    <p class="para">3:Only online customer service obtained from the App is authentic and trustworth. Do not believe it impersonators outside the app.</p>
                    </div>
                    </div>
                </div>
                <script>
        function goBack() {
            // Use window.history to go back to the previous page
            window.history.back();
        }
        </script>
            
    </body>
    </html>