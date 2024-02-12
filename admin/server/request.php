<?php
    require '../pack/config.php';
    if(isset($_GET['offset']) && isset($_GET['limit']))
    {
        $offset = $_GET['offset'];
        $limit = $_GET['limit'];
        $query_limit = "LIMIT $limit OFFSET $offset";
    }
    if(isset($_GET['sort']) && $_GET['order'])
    {
        $sort = $_GET['sort'];
        $order = $_GET['order'];
        $query_sort = "order by $sort $order";
    }
    if(isset($_GET['search']))
    {
        $search = $_GET['search'];
        $query_search = "where id LIKE '%$search%' OR name LIKE '%$search%'";
    }
    
    $result = array();
    $update = db("select * from request");
    $numOfrow = mysqli_num_rows($update);
    $result = array("total" => $numOfrow,"totalNotFiltered" => $numOfrow,);
    $rrr = array();
    $update1 = db("select * from request {$query_search} {$query_sort} {$query_limit}");
    if ($numOfrow > 0) 
    {
        $i = 1;
        while($res = mysqli_fetch_assoc($update1))
        {
            $user_id = $res['id'];
            array_push($rrr,array(
                "sno" => $i,
                "id" => $res['id'],
                "name" => $res['name'],
                "phone" => $res['phone'],
                "email" => $res['email'],
                "message" => $res['message'],
                "company" => $res['company'],
                "status" => $res['status'],
                "insertData" => $res['addon']));
            $i++;
        }
        
    }

    else
    {
        $result = "No Data";    
    }
    $result = array("total" => $numOfrow,"totalNotFiltered" => $numOfrow,"rows"=> $rrr);
    echo json_encode($result);
?>