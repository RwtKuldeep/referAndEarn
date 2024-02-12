<?php
require '../pack/config.php';

if (isset($_GET['offset']) && isset($_GET['limit'])) {
    $offset = $_GET['offset'];
    $limit = $_GET['limit'];
    $query_limit = "LIMIT $limit OFFSET $offset";
}

if (isset($_GET['sort']) && isset($_GET['order'])) {
    $sort = $_GET['sort'];
    $order = $_GET['order'];
    $query_sort = "ORDER BY $sort $order";
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query_search = "WHERE (p.id LIKE '%$search%' OR p.name LIKE '%$search%' OR p.mrp LIKE '%$search%' OR p.cost LIKE '%$search%' OR p.size LIKE '%$search%' OR p.description LIKE '%$search%') AND (c.name LIKE '%$search%' OR sc.name LIKE '%$search%')";
} else {
    $query_search = "";
}

$query = "SELECT p.*, c.name AS c_name, sc.name AS sc_name, img.path AS img FROM product AS p LEFT JOIN category AS c ON p.c_id = c.id LEFT JOIN category_sub AS sc ON p.sc_id = sc.id LEFT JOIN img_src AS img ON p.id = img.p_id $query_search $query_sort $query_limit";
$result = db($query);
$totalRows = mysqli_num_rows($result);

$rows = array();
if ($totalRows > 0) {
    $i = 1;
    while ($res = mysqli_fetch_assoc($result)) {
        $imagePath = $res['img']; // Adjust the column name as per your table structure

        // You can process the image path as needed, such as generating a complete URL or base64 encoding the image

        // Example: Generate complete URL
        $imageUrl = '../image/product/' . $imagePath;


        $rows[] = array(
            "sno" => $i,
            "id" => $res['id'],
            "name" => $res['name'],
            "cname" => $res['c_name'],
            "csname" => $res['sc_name'],
            "size" => $res['size'],
            "cbm" => $res['cbm'],
            "mrp" => $res['mrp'],
            "cost" => $res['cost'],
            "description" => $res['description'],
            "status" => $res['status'],
            "insertData" => $res['add_on'],
            "image_url" => '<img src="'.$imageUrl.'" style="width:40px;height:40px;">', // Add the image URL to the response
        );
        $i++;
    }
}

$response = array(
    "total" => $totalRows,
    "totalNotFiltered" => $totalRows,
    "rows" => $rows
);

echo json_encode($response);
?>
