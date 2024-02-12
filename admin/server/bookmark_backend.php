<?php
require '../pack/config.php';
if (isset($_GET['offset']) && isset($_GET['limit'])) {
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $query_limit = "LIMIT $limit OFFSET $offset";
}
// if (isset($_GET['sort']) && $_GET['order']) {
//     $sort = $_GET['sort'];
//     $order = $_GET['order'];
//     $query_sort = "order by $sort $order";
// }
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query_search = "where (id LIKE '%$search%' OR name LIKE '%$search%' OR mobile LIKE '%$search%')";
}

$result = array();


$bookmarkusers = array();
$selectbmk = "select * from bookmark";
$run = db($selectbmk);

if (mysqli_num_rows($run) > 0) {
    while ($res1 = mysqli_fetch_assoc($run)) {
        $userid = $res1['user_id'];
        array_push($bookmarkusers, $userid);
    }
}


$update = db("select * from bookmark");
$numOfrow = mysqli_num_rows($update);
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow,);
$rrr = array();
$update1 = db("select * from users {$query_search}  AND id IN (" . implode(', ', $bookmarkusers) . ") {$query_limit}");
// echo "select * from users {$query_search} {$query_sort} {$query_limit}";
if ($numOfrow > 0) {
    $i = 1;
    while ($res = mysqli_fetch_assoc($update1)) {
        $user_id = $res['id'];
        array_push($rrr, array(
            "sno" => $i,
            "id" => $res['id'],
            "name" => $res['name'],
            "mobile" => $res['mobile'],
            "password" => $res['password'],
            "promo" => $res['promo'],
            "status" => $res['status'],
            "insertData" => $res['addon']
        ));
        $i++;
    }
} else {
    $result = "No Data";
}
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow, "rows" => $rrr);
echo json_encode($result);
