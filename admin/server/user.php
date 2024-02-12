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
} else {
    $query_sort = "order by id desc";
}
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query_search = "WHERE (id LIKE '%$search%' OR name LIKE '%$search%' OR user_email LIKE '%$search%' OR phone LIKE '%$search%' OR password LIKE '%$search%')";
}

$result = array();
$update = db("select * from users");
$numOfrow = mysqli_num_rows($update);
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow,);
$rrr = array();
$update1 = db("select * from users {$query_search} {$query_sort} {$query_limit}");
if ($numOfrow > 0) {
    $i = 1;
    while ($res = mysqli_fetch_assoc($update1)) {
        $user_id = $res['id'];
        array_push($rrr, array(
            "sno" => $i,
            "id" => $res['id'],
            "name" => $res['name'],
            "user_email" => $res['user_email'],
            "phone" => $res['phone'],
            "password" => $res['password'],
            "status" => $res['status'],
            "profile" => $res['profile'],
            "insertData" => $res['insertData']
        ));
        $i++;
    }
} else {
    $result = "No Data";
}
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow, "rows" => $rrr);
echo json_encode($result);
