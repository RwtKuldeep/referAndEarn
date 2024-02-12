<?php
session_start();

date_default_timezone_set('Asia/Kolkata');

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data =  addslashes($data);
    return $data;
}


$last_id;

function db($sql)
{
    global $last_id;

    $conn = mysqli_connect("localhost", "root", "", "u818422208_investment") or die("connection error");

    $res = mysqli_query($conn, $sql);

    $last_id = mysqli_insert_id($conn);

    mysqli_close($conn);

    return $res;
}

$Admin = false;
if (isset($_SESSION['TheAdmin'])) {
    $Admin = true;
}
$User = false;

if (isset($_SESSION['TheUser'])) {
    $User = true;
}
