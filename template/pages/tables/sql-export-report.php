<?php
include('../../connect.php');

$fetchrecord = "SELECT id, item_name, stocks, mass, dateT FROM ingredients";
$fetchresult = mysqli_query($conn, $fetchrecord);

$records = array();

if (mysqli_num_rows($fetchresult) > 0) {
    while ($ing = mysqli_fetch_assoc($fetchresult)) {
        $records[] = $ing;
    }
}


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Inventory_Report.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('id','item_name','stocks','mass','datet'));

if (count($records) > 0) {
    foreach ($records as $row) {
        fputcsv($records, $row);
    }
}

?>