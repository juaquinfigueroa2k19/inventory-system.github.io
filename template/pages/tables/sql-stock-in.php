<?php
include('../../connect.php');
include('../../date.php');
date_default_timezone_set('Asia/Manila');

if (empty($_SESSION['admin_id'])) {
  header("location: ../form/login.php");
}else{

	if (empty($_POST['quan'])) {
		$quan = 0;
	}else{
		$quan = $_POST['quan'];
	}

	$ingid = $_POST['id'];
	$sqlA = "SELECT * FROM ingredients WHERE id = '$ingid' ";
	$resultA = mysqli_query($conn, $sqlA);

	if (mysqli_num_rows($resultA) > 0) {
		while ($ing = mysqli_fetch_assoc($resultA)) {
			$quanA = $ing['stocks'] + $quan ."/". $ing['measure'];
			$row = $ing['product_name'] ." / ". $ing['stocks'];
			$prdname = $ing['product_name'];
		}

		$mob = "stock-in - ($row / $quan = $quanA)";
		$insert = "INSERT INTO log_stocks (product_name, status, timeT, dateT) VALUES ('$prdname', '$mob', '$timeT24', '$dateT')";
		echo mysqli_query($conn,$insert);

		$sqlB = "UPDATE ingredients SET stocks = '$quanA' WHERE id = '$ingid' ";

		if (mysqli_query($conn, $sqlB)) {

			$_SESSION['error_msg-stock-in'] == 3;
			header('location: stock-in-form.php');

		}else{

			$_SESSION['error_msg-stock-in'] = 1;
			header('location: stock-in-form.php');

		}

	}else{

		$_SESSION['error_msg-stock-in'] = 2;
		header('location: stock-in-form.php');
	}

}

?>