<?php
session_start();
date_default_timezone_set('Asia/Manila');

$timeT = date('h:i:s A');
$timeT24 = date('H:i:s A');
$dateT = date('d/m/Y');
$name = $_SESSION['admin_name'];

?>