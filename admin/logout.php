<?php
require 'pack/config.php';

unset($_SESSION['TheAdmin']);

$_SESSION['msg'] = "Successfully Logout...";
header("location:index.php");

?>
