<?php
include('../../connect.php');
include('../../date.php');
date_default_timezone_set('Asia/Manila');

$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', 'ingredient-added', '$timeT', '$dateT')";
echo mysqli_query($conn,$insert);

if (empty($_SESSION['admin_id'])) {
	header('location: ../../index.php');
}else{

	$name = $_POST['name'];
	$meas = $_POST['meas'];
	$cate = $_POST['cate'];
	$min = $_POST['min'];
	$max = $_POST['max'];

	$check = "SELECT * FROM ingredients WHERE product_name LIKE '$name'";
	$resultcheck = mysqli_query($conn, $check);

	if (mysqli_num_rows($resultcheck) > 0) {

		$_SESSION['error_msg-add-ing'] = 1;
		header('location: add-new-ing.php');

	}else{

		$insertitem = "INSERT INTO ingredients (product_name, measure, minimum, maximum, category, dateT) VALUES ('$name', '$meas', '$min', '$max', '$cate', '$dateT') ";

		if (mysqli_query($conn, $insertitem)) {
			
			$_SESSION['error_msg-add-ing'] = 2;
			header('location: table.php');

		}else{

			$_SESSION['error_msg-add-ing'] = 3;
			header('location: add-new-ing.php');

		}
	}


	
}


 ?>