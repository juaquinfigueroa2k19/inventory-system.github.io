<?php
include('../../connect.php');

$name = $_POST['name'];
$user = $_POST['user'];
$pass = hash("md5", $_POST['pass']);
$dateT = date('m/d/Y');

if (empty($name && $user && $pass)) {
	header('location: ../../login.php');
}else{
	$sql = "INSERT INTO admin_account (fullname, username, password, dateT) VALUES ('$name', '$user', '$pass', '$dateT')";

	if (mysqli_query($conn, $sql)) {
		header("location: login.php");
	}else{
		header("location: signup.php");
		//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
mysqli_close($conn);
?>