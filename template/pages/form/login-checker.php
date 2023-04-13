<?php 
include('../../connect.php');
include('../../date.php');


$user = $_POST['user'];
$pass = hash("md5", $_POST['pass']);

if (empty($user && $pass)) {
	header('location: login.php');
}else{
	$sql = "SELECT * FROM admin_account WHERE username = '$user' AND password = '$pass' ";
	$result = mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
		while ($admin = mysqli_fetch_assoc($result)) {
			$_SESSION['admin_id'] = $admin['id'];
			$_SESSION['admin_name'] = $admin['fullname'];

			$name = $admin['fullname'];
		}

		$name = $_SESSION['admin_name'];
		$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', 'log-in', '$timeT', '$dateT')";

		if (mysqli_query($conn, $insert)) {
			header('location: ../../index.php');
		}

	}else{
		$_SESSION['error_msg-login'] = 1;
		header("location: login.php");
	}
}
mysqli_close($conn);
?>