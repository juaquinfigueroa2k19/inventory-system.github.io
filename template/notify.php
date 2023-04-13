<?php
include('connect.php');

$understock = "SELECT * FROM ingredients";
$resultunder = mysqli_query($conn, $understock);

$row = array();

if (mysqli_num_rows($resultunder) > 0) {
	while ($ing = mysqli_fetch_assoc($resultunder)) {
		
		if ($ing['stocks'] <= $ing['minimum']) {
			
			$row[] = $ing;
		}
	}

	$note = count($row);
}

?>



