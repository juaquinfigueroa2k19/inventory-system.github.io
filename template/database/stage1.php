<?php
$servername='localhost';
$username='root';
$password='';

$conn=mysqli_connect($servername,$username,$password);

if(!$conn){
    die("error in connecting: ".mysqli_connect_error());
}
header("location:stage2.php");