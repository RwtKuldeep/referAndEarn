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
    $query_search = "where id LIKE '%$search%' OR orderid LIKE '%$search%' OR uid IN (SELECT id FROM users WHERE name LIKE '%$search%' OR mobile LIKE '%$search%')";
}

    
    $result = array();
    $update = db("select * from payments");
    $numOfrow = mysqli_num_rows($update);
    $result = array("total" => $numOfrow,"totalNotFiltered" => $numOfrow,);
    $rrr = array();
    $update1 = db("select * from payments {$query_search} {$query_sort} {$query_limit}");
    // echo "select * from users {$query_search} {$query_sort} {$query_limit}";
    if ($numOfrow > 0) 
    {
        $i = 1;
        while($res = mysqli_fetch_assoc($update1))
        {
            $uid = $res['uid'];
            $s=db("select * from users where id='$uid'");
            $u_res=mysqli_fetch_assoc($s);
            array_push($rrr,array(
                "sno" => $i,
                "id" => $uid,
                "name" => $u_res['name'],
                "mobile" => $u_res['mobile'],
                "orderid" => $res['orderid'],
                "amount" => $res['amount'],
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