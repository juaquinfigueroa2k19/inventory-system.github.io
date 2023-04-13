<?php
include('../../connect.php');
include('../../date.php');

$oprice = $_POST['oprice'];
$profite = $_POST['profite'];

$sqla = "SELECT SUM(price) FROM ingredients";
$rowa = mysqli_query($conn, $sqla);
$total_rowsa = mysqli_fetch_array($rowa)[0];

$result = $total_rowsa - $oprice;


echo $oprice."<br>";
echo $total_rowsa."<br>";
echo $result;
?>