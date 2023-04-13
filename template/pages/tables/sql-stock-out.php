<?php
include('../../connect.php');
include('../../date.php');

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
			$quanA = $ing['stocks'];
			$row = $ing['product_name'] . " / " . $quan ." - ". $ing['stocks'];
			$prdname = $ing['product_name'];
			$meas = $ing['measure'];
		}


		if ($quan >= $quanA) {
			
			$_SESSION['error_msg-stock-out'] = 1;
			header('location: stock-out-form.php');

		}else{

			$newquan = $quanA - $quan;
			$mob = "stock-out - ($row = $newquan/$meas)";
			$insert = "INSERT INTO log_stocks (product_name, status, timeT, dateT) VALUES ('$prdname', '$mob', '$timeT24', '$dateT')";
			echo mysqli_query($conn,$insert);

			$sqlB = "UPDATE ingredients SET stocks = '$newquan' WHERE id = '$ingid' ";

			if (mysqli_query($conn, $sqlB)) {
				
				$_SESSION['error_msg-stock-out'] = 4;
				header('location: stock-out-form.php');

			}else{

				$_SESSION['error_msg-stock-out'] = 2;
				header('location: stock-out-form.php');
			}

		}

	}else{

		$_SESSION['error_msg-stock-out'] = 3;
		header('location: stock-out-form.php');

	}

}

?>