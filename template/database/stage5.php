<?php
$servername='localhost';
$username='root';
$password='';
$dbname='inventory';

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("error in connecting: ".mysqli_connect_error());
}

$sql="CREATE TABLE ingredients (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    unit int(255) NOT NULL,
    stocks INT(255) NOT NULL,
    unit_pcs INT(255) NOT NULL,
    minimum INT(255) NOT NULL,
    maximum INT(255) NOT NULL,
    measure VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    dateT VARCHAR(255) NOT NULL)";

if(mysqli_query($conn,$sql)){
    //echo "pass!!";
    Header("location:stage6.php");
}else{
    echo "error: ".mysqli_error($conn);
}
mysqli_close($conn);