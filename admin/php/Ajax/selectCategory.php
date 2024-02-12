<?php
require '../../pack/config.php';
if ($admin_Login_Agrawal_toys){
    $id = input($_POST['id']);
    $up1 = db("SELECT * FROM `category_sub` WHERE cid='$id'");
    $num1 = mysqli_num_rows($up1);
    $res = '<option></option>';
    if($num1 > 0)
    {
        while($res1 = mysqli_fetch_assoc($up1))
        {
            $res = $res."<option value='".$res1['id']."'>".$res1['name']."</option>";
        }
    }
    echo $res;
}