<?php
require '../../pack/config.php';
if ($Admin) {
    $id = input($_GET['id']);
    // echo "SELECT amount, addon AS datetime FROM refer where to_uid='$uid' ";
    $plan = "SELECT amountpaid as amount, addon AS datetime FROM orders where uid='$id' ";

    $referal_query = "SELECT amount, addon AS datetime FROM refer where to_uid='$id' ";

    $payments_query = "SELECT amount, addon AS datetime FROM payments where uid='$id' ";

    $withdrawal_query = "SELECT amount, status AS Status, addon AS datetime FROM withdrawal_request where uid='$id' ";

    // Fetch data from the database
    $payments_result = db($payments_query);
    $withdrawal_result = db($withdrawal_query);
    // echo "hii";
    $refer_result = db($referal_query);
    $plan_result = db($plan);

    $combined_data = array();

    // Fetch payment data
    while ($row = mysqli_fetch_assoc($plan_result)) {
        $row['type'] = 'Plan Purchase';
        $row['status'] = 'success';
        $row['symbol'] = '-';
        $combined_data[] = $row;
    }
    while ($row = mysqli_fetch_assoc($payments_result)) {
        $row['type'] = 'Recharge';
        $row['status'] = 'success';
        $row['symbol'] = '+';
        $combined_data[] = $row;
    }

    // Fetch withdrawal data
    while ($row = mysqli_fetch_assoc($withdrawal_result)) {
        $row['type'] = 'Withdrawal';
        $row['symbol'] = '-';
        $combined_data[] = $row;
    }

    // Fetch withdrawal data
    while ($row = mysqli_fetch_assoc($refer_result)) {
        $row['type'] = 'referal';
        $row['symbol'] = '+';
        $combined_data[] = $row;
    }
    $rrr = array();

    if (!empty($combined_data)) {
        $i = 1;
        foreach ($combined_data as $data) {
            array_push($rrr, array(
                "sno" => $i,
                "insertData" => $data['datetime'],
                "type" => $data['type'],
                "symbol" => $data['symbol'],
                "amount" => $data['amount'] . '.00',
            ));
            $i++;
        }
    } else {
        $result = "No Data";
    }

    $result = array("total" => 10, "totalNotFiltered" => 10, "rows" => $rrr);

    echo json_encode($result);
} else {
    $_SESSION['msg'] = "Invalid Login!";
    header('location:../../index.php');
}
