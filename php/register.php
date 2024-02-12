<?php
include "../admin/pack/config.php";

$name = $_POST["name"];
$mobileNumber = $_POST["mobile"];
$password = $_POST["password"];
$promoCode = $_POST["promo"];

// Check if mobile number already exists in the database
$checkQuery = "SELECT mobile FROM users WHERE mobile = '$mobileNumber'";
$result = db($checkQuery);
$checkpromo = db("SELECT user_promo FROM users WHERE user_promo = '$promoCode'");

if (mysqli_num_rows($result) >= 1) {
    // Mobile number already exists, show an error message
    $_SESSION['class'] = "success";
    $_SESSION['msg'] = "Mobile number already exists in the database";
    header("Location: ../login.php");
} elseif (mysqli_num_rows($checkpromo) == 0 && $promoCode != "") {
    $_SESSION['class'] = "success";
    $_SESSION['msg'] = "Invalid Promo Code";
    header("Location: ../login.php");
} else {
    // The user is new, so grant them the 100 rs signup bonus
    $bonusAmount = 60;


    $insertQuery = "INSERT INTO users (name, mobile, password, promo, status) VALUES ('$name', '$mobileNumber', '$password', '$promoCode', '0')";
    $insert = db($insertQuery);
    $uid = $last_id;

    if ($insert) {

        // Insert the new user into the database
        // function generateUniqueCode($u_id, $names, $mobile)
        // {
        //     // Concatenate user's id, name, and phone number
        //     $dataToEncode = $u_id . $names . $mobile;

        //     // Take the first 8 characters to make it alphanumeric
        //     $code = substr($dataToEncode, 0, 8);

        //     return $code;
        // }
        // $invitationCode = generateUniqueCode($uid, $name, $mobileNumber);


        //Imporvement begin
        function generateReferralCode($length = 8)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            $referralCode = '';
            for ($i = 0; $i < $length; $i++) {
                $referralCode .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $referralCode;
        }

        $invitationCode = generateReferralCode();

        // Improvment end

        // Grant the signup bonus to the new user
        $updateBalanceQuery = "UPDATE users SET asset ='$bonusAmount',user_promo='$invitationCode' WHERE mobile = '$mobileNumber'";
        $updateBalance = db($updateBalanceQuery);

        if ($updateBalance) {
            $_SESSION['class'] = "success";
            $_SESSION['msg'] = "Successfully Registered.";
            header("Location: ../login.php");
        } else {
            $_SESSION['class'] = "error";
            $_SESSION['msg'] = "Error";
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['class'] = "error";
        $_SESSION['msg'] = "Error Occurred";
        header("Location: ../login.php");
    }
}
