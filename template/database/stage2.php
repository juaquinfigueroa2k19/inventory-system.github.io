<?php
$servername='localhost';
$username='root';
$password='';

$conn=mysqli_connect($servername,$username,$password);

if(!$conn){
    die("error in connecting: ".mysqli_connect_error());
}

$sql="CREATE DATABASE inventory";
if(mysqli_query($conn,$sql)){
    header("location:stage3.php");
}else{
    echo "error: ".mysqli_error($sonn);
}

mysqli_close($conn);