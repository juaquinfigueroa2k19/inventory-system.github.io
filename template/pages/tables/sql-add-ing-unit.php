<?php
include('../../connect.php');
include('../../date.php');
date_default_timezone_set('Asia/Manila');

if (empty($_SESSION['admin_id'])) {
  header("location: ../form/login.php");
}else{

	$ingid = $_POST['id'];
	$fetching = "SELECT * FROM ingredients WHERE id = '$ingid'";
	$resultfetch = mysqli_query($conn, $fetching);

	if (mysqli_num_rows($resultfetch) > 0) {
		while ($ing = mysqli_fetch_assoc($resultfetch)) {
			$min = $ing['minimum'];
			$row = $ing['product_name'] ." / ". $ing['stocks'];
			$prdname = $ing['product_name'];
			$pcsunit = $ing['unit_pcs'];

		}

		if (!preg_match('/^[0-9]*$/', $_POST['byunit'])) {
			$_SESSION['error_msg-add-unit'] = 1;
			header('location: stock-in-form.php');
			//echo "error code 1";
		}

		if (!preg_match('/^[0-9]*$/', $_POST['quan'])) {
			$_SESSION['error_msg-add-unit'] = 2;
			header('location: stock-in-form.php');
			//echo "error code 2";
		}
		

		if (empty($_POST['byunit'])) {
			$_SESSION['error_msg-add-unit'] = 6;
			header('location: stock-in-form.php');
		}else{

			$byunit = $_POST['byunit'];
			$unitpcs = $_POST['quan'];

			if (empty($pcsunit)) {
				$sqlB = "UPDATE ingredients SET stocks = '$byunit', unit_pcs = '$unitpcs' WHERE id = '$ingid' ";
				if (mysqli_query($conn, $sqlB)) {
					
					echo "update item stocks and unit pcs";
				}else{
					
					echo "error code 3";
				}
			}else{
				$sqlc = "UPDATE ingredients SET stocks = '$byunit', unit_pcs = '$pcsunit' WHERE id = '$ingid' ";
				if (mysqli_query($conn, $sqlc)) {
				
					echo "update item stocks only";
				}else{
					
					echo "error code 3";
				}
			}

		}

		
	}else{
		$_SESSION['error_msg-add-unit'] = 5;
		header('location: stock-in-form.php');
		//echo "error code 5";
	}

	

}

?>