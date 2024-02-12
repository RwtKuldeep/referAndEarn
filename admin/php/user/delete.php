<?php
require '../../pack/config.php';
if ($Admin) {
    $d = input($_GET['id']);
    $all = explode(",", $d);
    foreach ($all as $delete) {
        $update = db("select * from users where id = '$delete'");
        $num = mysqli_num_rows($update);
        if ($num == 1) {
            $query = db("delete from users where id = '$delete'");
            $query = db("delete from bookmark where user_id = '$delete'");
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
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
