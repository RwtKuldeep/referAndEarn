<?php
include '../admin/pack/config.php';
    unset($_SESSION['TheUser']);
    unset($_SESSION['userid']);
    $_SESSION['class'] = "success";
    $_SESSION['msg'] = 'Logged out Successfully.';
    header('location:../login.php');

?>