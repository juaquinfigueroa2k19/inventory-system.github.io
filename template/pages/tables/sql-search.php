<?php
include('../../connect.php');
include('../../date.php');

if (empty($_SESSION['admin_id'])) {
	header('location: pages/form/login.php');
}

if (empty($_POST['search'])) {
	header('location: stock-out-form.php');
}else{

	$sear = $_POST['search'];
	$search = "SELECT * FROM ingredients WHERE product_name LIKE '%$sear%' ";
	$resultsearch = mysqli_query($conn, $search);

  if (mysqli_num_rows($resultsearch) > 0) {
    while ($search = mysqli_fetch_assoc($resultsearch)) {
      $_SESSION['ing_search_id'] = $search['id'];
    }

    header('location: stock-out-form.php');
  }else{
  	$_SESSION['error_msg-search'] = 1;
  	header('location: stock-out-form.php');
  }
}

?>
 