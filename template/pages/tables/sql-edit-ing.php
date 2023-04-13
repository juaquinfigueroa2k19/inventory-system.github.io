<?php
include('../../connect.php');
include('../../date.php');

if (empty($_SESSION['admin_id'])) {
	header('location: table.php');
}else{

	$name = $_POST['name'];
	$cate = $_POST['cate'];
	$quan = $_POST['quan'];

	if(preg_match('/^[a-z]+$/i', $name) AND preg_match('/^[0-9]+$/i', $quan)) {

		$sql = "UPDATE ingredients SET item_name = '$name', mass = '$mass', stocks = '$quan'";

		$row = "updated - (" . $dateT . ") :" . $name . "-" . $cate . "-" . $quan;

		if (mysqli_query($conn, $sql)) {

			$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', '$row', '$timeT', '$dateT')";
			echo mysqli_query($conn,$insert);

			header('location: table.php');
		}else{

			$_SESSION['error_msg-edit-form'] = 2;
			header('location: edit-form.php');

		}

	}else{

		$_SESSION['error_msg-edit-form'] = 1;
		header('location: edit-form.php');
	}
}

?>