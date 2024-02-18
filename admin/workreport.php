<?php
require 'pack/config.php';
error_reporting(E_ERROR | E_PARSE);
if ($Admin) {

    $id = input($_GET['id']);
    $query='select name from users where id="' . $id . '"';
    $getname=db($query);
    $username='';
        // Fetch payment data
        while ($row = mysqli_fetch_assoc($getname)) {
 
            $username = $row['name'];
        }

    // echo "SELECT amount, addon AS datetime FROM refer where to_uid='$uid' ";
    $plan = "SELECT amountpaid as amount, addon AS datetime FROM orders where uid='$id' ";

    $referal_query = "SELECT amount, addon AS datetime FROM refer where to_uid='$id' ";

    $payments_query = "SELECT amount, addon AS datetime FROM payments where uid='$id' ";

    $withdrawal_query = "SELECT amount, status AS Status, addon AS datetime FROM withdrawal_request where uid='$id' ";

    $asset = "SELECT amount AS amount, status AS Status, date_time AS datetime FROM asset where user_id='$id' ";

    // Fetch data from the database
    $payments_result = db($payments_query);
    $withdrawal_result = db($withdrawal_query);
    // echo "hii";
    $refer_result = db($referal_query);
    $plan_result = db($plan);

    $asset = db($asset);

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
        $row['type'] = 'Referal';
        $row['symbol'] = '+';
        $combined_data[] = $row;
    }
    // Fetch asset data
    while ($row = mysqli_fetch_assoc($asset)) {
        $row['type'] = 'Asset';
        $row['symbol'] = '+';
        $combined_data[] = $row;
    }
    
    $rrr = array();
    if (!empty($combined_data)) {
        $i = 1;
        foreach ($combined_data as $data) {
            array_push($rrr, array(
                "sno" => $i,
                "type" => $data['type'],
                "amount" => $data['symbol'].' '.$data['amount'] . '.00',
                "status" => $data['Status'],
                "insertData" => $data['datetime'],
            ));
            $i++;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/home.css" />
    <title>Admin Dashboard</title>

    <?php include("pack/header.php"); ?>
    <script src="ckeditor/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
    <!--<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table-locale-all.min.js"></script>-->
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/export/bootstrap-table-export.min.js"></script>


</head>

<body>
    <?php include 'pack/SideNav.php'; ?>

    <div class="main">
        <div class="container-fluid family">
            <?php include("pack/nav.php"); ?>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row  mt-5">
                        <div class="col-9">
                            <h3 class="family"><b class="text-secondary"  style="font-size: larger;"> Activity Report</b></h3>
                        </div>
                        <div class="col-3">
                            <p style="font-size: medium;">User Name</p>
                            <h3 class="family"><b class="text-info"><?php echo $username ?></b></h3>
                        </div>
                        <!--<div class="col-4 text-right "><i class="fal fa-plus-circle iconss" aria-hidden="true" data-toggle="modal" data-target="#AddCategory"></i> </div>-->
                    </div>
                    <hr style="height:2px;color:grey;">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <!--;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;-->
                            <div class="select"></div>
                            <table id="table" data-toolbar="#toolbar" data-toggle="table" data-pagination="true"  data-search="true" data-show-refresh="true" data-show-toggle="true"
        data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true"
        data-show-export="true" 
 data-show-pagination-switch="true" data-pagination="true" data-id-field="id"
        data-page-size="10" data-page-list="[10, 25, 50, 100, all]" data-show-footer="true">

            <thead>
                <tr style="color:#fff;background:#162e4f;">
                    <th data-field="sno">S.No</th>
                    <th data-field="type">Type</th>
                    <th data-field="amount">Amount</th>
                    <th data-field="status">Status</th>
                    <th data-field="insertData">Date/Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($rrr as $record) {
                        if($record['status']==0){
                            $status= '<span class="badge bg-warning">pending</span>';
                        }
                        if($record['status']==1){
                            $status= '<span class="badge bg-success" style="color:white">Success</span>';
                        }
                        if($record['status']==2){
                            $status= '<span class="badge bg-danger" style="color:white">Decline</span>';
                        }
                        echo '<tr>';
                        echo '<td>' . $record['sno'] . '</td>';
                        echo '<td>' . $record['type'] . '</td>';
                        echo '<td>' . $record['amount'] . '</td>';
                        echo '<td>' . $status . '</td>';
                        echo '<td>' . $record['insertData'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
                            <!--;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("pack/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
        function detailFormatter(index, row) {
      var html = []
      $.each(row, function(key, value) {
        html.push('<p><b>' + key + ':</b> ' + value + '</p>')
      })
      return html.join('')
    }
</script>
</body>

</html>