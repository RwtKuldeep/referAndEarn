<?php
require '../../pack/config.php';
if ($Admin) {
    $d = input($_GET['id']);
    $all = explode(",", $d);
    foreach ($all as $bookmark) {

        $chekuser = db("select * from bookmark where user_id = '$bookmark'");
        $count = mysqli_num_rows($chekuser);

        if ($count) {
            $_SESSION['msg'] = 'User Already Exist!';
            header("location:../../users.php");
        } else {
            $getuser = db("select * from users where id = '$bookmark'");
            $num = mysqli_num_rows($getuser);
            if ($num == 1) {
                $query = db("INSERT INTO `bookmark`(`user_id`) VALUES ('$bookmark')");
                if ($query) {
                    $_SESSION['msg'] = "Success";
                } else {
                    $_SESSION['msg'] = 'Fail';
                }
                header("location:../../users.php");
            } else {
                $_SESSION['msg'] = 'Error!';
                header("location:../../users.php");
            }
        }
    }
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
