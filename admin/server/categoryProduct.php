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
    $query_search = "AND (id LIKE '%$search%' OR c_id LIKE '%$search%' OR name LIKE '%$search%')";
}

if(isset($_GET['category_id'])) {
    $category_id = input($_GET['category_id']);
}

$result = array();

$update = db("SELECT * FROM product WHERE c_id = '$category_id'");
$numOfrow = mysqli_num_rows($update);
$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow);
$rrr = array();

$update1 = db("SELECT * FROM product WHERE c_id = '$category_id' $query_search $query_sort $query_limit");

if ($numOfrow > 0) {
    $i = 1;
    while($res = mysqli_fetch_assoc($update1)) {{
            $c_id = $res['c_id'];
            $update2 = db("SELECT * FROM `category` WHERE id = '$c_id'");
            $res2 = mysqli_fetch_assoc($update2);
            $c_name = $res2['name'];
            
            $sc_id = $res['sc_id'];
            $update3 = db("SELECT * FROM `category_sub` WHERE cId = '$c_id' and id = '$sc_id'");
            $res3 = mysqli_fetch_assoc($update3);
            $cs_name = $res3['name'];
            
            array_push($rrr,array(
                "sno" => $i,
                "id" => $res['id'],
                "name" => $res['name'],
                "cname" => $c_name,
                "size" => $res['size'],
                "quantity" => $res['quantity'],
                "mrp" => $res['mrp'], 
                "cost" => $res['cost'], 
                "description" => $res['description'], 
                "status" => $res['status'],
                "insertData" => $res['add_on']));
            $i++;
        }}    
} else {
    $result = "No Data";
}

$result = array("total" => $numOfrow, "totalNotFiltered" => $numOfrow, "rows" => $rrr);
echo json_encode($result);
?>
