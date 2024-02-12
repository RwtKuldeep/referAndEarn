<?php
require '../pack/config.php';

if(isset($_GET['offset']) && isset($_GET['limit'])) {
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $query_limit = "LIMIT $limit OFFSET $offset";
}

if(isset($_GET['sort']) && isset($_GET['order'])) {
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    $query_sort = "ORDER BY $sort $order";
}

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $query_search = "AND (id LIKE '%$search%' OR cid LIKE '%$search%' OR name LIKE '%$search%')";
}

if(isset($_GET['category_id'])) {
    $category_id = input($_GET['category_id']);
}

$result = array();
$update = db("SELECT * FROM category_sub WHERE cid = '$category_id'");
$numOfrow = mysqli_num_rows($update);
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow);
$rrr = array();

$update1 = db("SELECT * FROM category_sub WHERE cid = '$category_id' $query_search $query_sort $query_limit");

if ($numOfrow > 0) {
    $i = 1;
    while($res = mysqli_fetch_assoc($update1)) {
        $user_id = $res['id'];
        array_push($rrr, array(
            "sno" => $i,
            "id" => $res['id'],
            "cid" => $res['cid'],
            "name" => $res['name'],
            "insertData" => $res['insertDate']
        ));
        $i++;
    }    
} else {
    $result = "No Data";
}

$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow, "rows" => $rrr);
echo json_encode($result);
?>
