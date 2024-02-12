<?php
require '../pack/config.php';
if (isset($_GET['offset']) && isset($_GET['limit'])) {
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $query_limit = "LIMIT $limit OFFSET $offset";
}
if (isset($_GET['sort']) && $_GET['order']) {
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    $query_sort = "order by $sort $order";
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query_search = "WHERE 
    id LIKE '%$search%' OR 
    uid IN (SELECT id FROM users WHERE name LIKE '%$search%' OR mobile LIKE '%$search%') OR
    uid IN (SELECT uid FROM bank WHERE b_name LIKE '%$search%' OR b_no LIKE '%$search%' OR ifsc LIKE '%$search%')";
}


$result = array();
$update = db("select * from withdrawal_request");
$numOfrow = mysqli_num_rows($update);
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow,);
$rrr = array();
$update1 = db("select * from withdrawal_request {$query_search} {$query_limit}");
// echo "select * from users {$query_search} {$query_sort} {$query_limit}";
if ($numOfrow > 0) {
    $i = 1;
    while ($res = mysqli_fetch_assoc($update1)) {
        $statusText = '';
        if ($res['status'] == 0) {
            $statusText = '<span class="status waiting" style="color: black;">Pending..</span>';
        } elseif ($res['status'] == 1) {
            $statusText = '<span class="status accept" style="color: black;">Approved..</span>';
        } elseif ($res['status'] == 2) {
            $statusText = '<span class="status shipped" style="color: black;">Declined..</span>';
        }
        $uid = $res['uid'];
        $bank = db("select * from bank where uid='$uid'");
        if ($b_num = mysqli_num_rows($bank) > 0) {
            $b_res = mysqli_fetch_assoc($bank);
            $bname = $b_res['b_name'];
            $bnumber = $b_res['b_no'];
            $ifsc = $b_res['ifsc'];
        } else {
            $bname = '-';
            $bnumber = '-';
            $ifsc = '-';
        }
        $s = db("select * from users where id='$uid'");
        $u_res = mysqli_fetch_assoc($s);
        array_push($rrr, array(
            "sno" => $i,
            "id" => $res['id'],
            "uid" => $uid,
            "name" => $u_res['name'],
            "mobile" => $u_res['mobile'],
            "amount" => $res['amount'],
            "bname" => $bname,
            "bno" => $bnumber,
            "ifsc" => $ifsc,
            "status" => $statusText,
            "status_change" => $res['status'],
            "insertData" => $res['addon']
        ));
        $i++;
    }
} else {
    $result = "No Data";
}
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow, "rows" => $rrr);
echo json_encode($result);
