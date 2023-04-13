<?php
$servername='localhost';
$username='root';
$password='';
$dbname='inventory';

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("error in connecting: ".mysqli_connect_error());
}

$sql="CREATE TABLE log_stocks (
    product_name VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    timeT VARCHAR(255) NOT NULL,
    dateT VARCHAR(255) NOT NULL)";

if(mysqli_query($conn, $sql)){
    echo "pass!!";
    // Header("location:stage4.php");
}else{
    echo "error: ".mysqli_error($conn);
}
mysqli_close($conn);

?>