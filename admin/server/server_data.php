<?php
// SQL server connection information
$sql_details = array(
    'user' => 'hypertonic_agrawaltoys',
    'pass' => 'agrawaltoys@123',
    'db'   => 'hypertonic_agrawaltoys',
    'host' => 'localhost'
);
//  * See http://datatables.net/usage/server-side for full details on the server-
 
// DB table to use
$table = 'product';
 
// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' =>  0),
    array( 'db' => 'name', 'dt' => 1),
    array( 'db' => 'size',     'dt' => 2 ),
    array( 'db' => 'cbm',     'dt' => 3 ),
    array( 'db' => 'quantity',     'dt' => 4 ),
    array( 'db' => 'mrp',     'dt' => 5 ),
    array( 'db' => 'cost',     'dt' => 6 ),
    array( 'db' => 'add_on',     'dt' => 7 ),
    
    
);
 
// SQL server connection information

 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
?>