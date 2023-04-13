<?php
include('connect.php');
include('date.php');

$insert = "INSERT INTO log_record (name, activity, timeT, dateT) VALUES ('$name', 'log-out', '$timeT', '$dateT')";
echo mysqli_query($conn,$insert);

session_destroy();

header('location: pages/form/login.php');

?>