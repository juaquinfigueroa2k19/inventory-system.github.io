<?php
include('../../connect.php');
include('../../date.php');

if (empty($_SESSION['admin_id'])) {
  header("location: ../form/login.php");
}else{

	$ingid = $_POST['id'];
	$quan = $_POST['quan'];

	$sqlA = "SELECT * FROM ingredients WHERE id = '$ingid' ";
	$resultA = mysqli_query($conn, $sqlA);

	if (mysqli_num_rows($resultA) > 0) {
		while ($ing = mysqli_fetch_assoc($resultA)) {
			$quanA = $ing['stocks'];
			$row = $ing['name'] . " / " . $quan . "pcs";
		}

		$mob = "minus- ($row)";
		$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', '$mob', '$timeT', '$dateT')";
		echo mysqli_query($conn,$insert);

		$decquan = $quanA - $quan;
		echo $decquan;

		$sqlB = "UPDATE ingredients SET stocks = '$decquan' WHERE id = '$ingid' ";

		if (mysqli_query($conn, $sqlB)) {
			header('location: destock.php');
			
		}else{
			echo "<script type='text/javascript'>alert('Failed to update item!!');</script>";
		}

		
	}else{
		echo 'fail';
	}

}

?>