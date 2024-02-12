<?php
include "admin/pack/config.php";
if (isset($_SESSION['TheUser'])) {
    $uid = $_SESSION['userid'];

?>
    <html>

    <head>
        <?php include "pack/header.php"; ?>
        <style>
            .aaf {
                color: orange;
                text-align: center;
            }

            .invite {
                padding-top: 14px;
                color: red;
                margin: 0px 0px -6px 0px;
            }

            .line {
                background: grey;
                height: 1px;
            }

            .aab {
                background-color: #FFCC00;
                margin-top: -37px;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .award {
                width: 98%;
                text-align: left;
                color: black;
                margin: 16px 0px 10px 0px;
                font-size: 18px;
            }

            .acr {
                width: 100%;
                display: flex;
                flex-direction: column;
            }

            .invi {
                margin: 11px 0px 0px 28px;
                font-size: 17px;
            }

            .copy {
                color: white;
                background: red;
                width: 82px;
                height: 37px;
                /* border-radius: 25px; */
                padding: 0px 0px 0px 0px;
                margin: 18px 0px 0px 27px;
                border: 1px solid orange;
                cursor: pointer;
            }

            .copy1 {
                color: white;
                background: orange;
                width: 82px;
                height: 37px;
                /* border-radius: 25px; */
                padding: 0px 0px 0px 0px;
                margin: 18px 0px 0px 40px;
                border: 1px solid orange;
                cursor: pointer;
            }

            .crds {
                display: flex;
                flex-direction: column;
                background: white;
                height: 140px;
                width: 100%;
                border-radius: 28px;
                margin: 26px 0px 0px 0px;
            }

            .txt {
                margin: 6px 0px -5px 27px;
                width: 95%;
                font-weight: 700;
                height: 30px;
                border: 1px solid #80808069;
                padding: 0px 0px 0px 12px;
            }

            .carf {
                background: white;
                height: 100px;
                width: 100%;
                border-radius: 20px;
            }

            .level {
                padding: 9px 0px 0px 13px;
            }

            .level1 {
                padding: 0px 0px 0px 13px;
            }

            .level1 {
                padding: 0px 0px 0px 13px;
            }

            .percent {
                color: red;
            }

            @media only screen and (max-width: 740px) {
                .aaf {
                    color: orange;
                    text-align: center;
                }

                .invite {
                    padding-top: 14px;
                    margin: 0px 0px -6px 0px;
                }

                .line {
                    background: grey;
                    height: 1px;
                }

                .aab {
                    background-color: #FFCC00;
                    margin-top: -37px;
                    height: 100vh;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                .award {
                    width: 98%;
                    text-align: left;
                    color: black;
                    margin: 16px 0px 10px 0px;
                    font-size: 18px;
                }

                .acr {
                    display: flex;
                    flex-direction: column;
                }

                .invi {
                    margin: 11px 0px 0px 28px;
                    font-size: 17px;
                }

                .copy {
                    color: white;
                    background: red;
                    width: 82px;
                    height: 37px;
                    padding: 0px 0px 0px 0px;
                    margin: 18px 0px 0px 27px;
                    border: 1px solid orange;
                    cursor: pointer;
                }

                .copy1 {
                    color: white;
                    background: orange;
                    width: 82px;
                    height: 37px;
                    /* border-radius: 25px; */
                    padding: 0px 0px 0px 0px;
                    margin: 18px 0px 0px 40px;
                    border: 1px solid orange;
                    cursor: pointer;
                }

                .crds {
                    display: flex;
                    flex-direction: column;
                    background: white;
                    height: 140px;
                    width: 100%;
                    border-radius: 28px;
                    margin: 26px 0px 0px 0px;
                }

                .txt {
                    margin: 6px 0px -5px 27px;
                    width: 75%;
                    font-weight: 700;
                    height: 30px;
                    border: 1px solid #80808069;
                    padding: 0px 0px 0px 12px;
                }

                .carf {
                    background: white;
                    height: 100px;
                    width: 100%;
                    border-radius: 20px;
                }

                .level {
                    padding: 9px 0px 0px 13px;
                }

                .level1 {
                    padding: 0px 0px 0px 13px;
                }

                .level1 {
                    padding: 0px 0px 0px 13px;
                }

                .percent {
                    color: red;
                }
            }
        </style>
    </head>

    <body>
        <div class="container-fluid aaf">
            <h3 class="invite">Invite</h3>
        </div>
        <hr class="line">
        <div class="container-fluid aab">
            <p class="award">Award Scheme</p>
            <div class="carf">
                <p class="level">Level 1=<span class="percent">15%</span></p>
                <p class="level1">Level 2=<span class="percent">2%</span></p>
                <p class="level1">Level 3=<span class="percent">1%</span></p>
            </div>
            <div class="row acr">
                <div class="crds">
                    <?php
                    $u = db("select * from users where id='$uid'");
                    $u_num = mysqli_num_rows($u);
                    if ($u_num > 0) {
                        $res = mysqli_fetch_assoc($u);
                        $u_id = $res['id'];
                        $name = $res['name'];
                        $phone = $res['mobile'];

                        // function generateUniqueCode($id, $names, $mobile)
                        // {
                        //     // Concatenate user's id, name, and phone number
                        //     $dataToEncode = $id . $names . $mobile;

                        //     // Take the first 8 characters to make it alphanumeric
                        //     $code = substr($dataToEncode, 0, 8);

                        //     return $code;
                        // }
                        // $invitationCode = generateUniqueCode($u_id, $name, $phone);

                        //Improvement begin
                        $invitationCode = $res['user_promo'];
                        //Improvement end
                    ?>
                        <label class="invi">Invitation Link</label>
                        <input type="link" id="copyText" class="txt" value="https://investmentsitecloud.xyz/main/register.php?inviteCode=<?php echo $invitationCode; ?>" readonly>
                        <button id="copyButton" onclick="copyToClipboard()" class="copy">Copy</button>
                    <?php
                    }
                    ?>
                </div>
                <div class="crds">
                    <label class="invi">Invitation Code</label>
                    <input type="text" id="copyText1" class="txt" value="<?php echo $invitationCode; ?>" readonly>
                    <button id="copyButton1" onclick="copyToClipboard1()" class="copy">Copy</button>
                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>

        <script>
            function copyToClipboard() {
                // Select the text field
                var copyText = document.getElementById("copyText");

                // Select the text in the input field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text to the clipboard
                document.execCommand("copy");

                // Deselect the text field (remove the selection)
                copyText.setSelectionRange(0, 0);

                // Alert the user that the text has been copied (you can also use a tooltip or other UI)
                alert("Copied: " + copyText.value);
            }

            function copyToClipboard1() {
                // Select the text field
                var copyText = document.getElementById("copyText1");

                // Select the text in the input field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text to the clipboard
                document.execCommand("copy");

                // Deselect the text field (remove the selection)
                copyText.setSelectionRange(0, 0);

                // Alert the user that the text has been copied (you can also use a tooltip or other UI)
                alert("Copied: " + copyText.value);
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