<?php
$servername='localhost';
$username='root';
$password='';
$dbname='inventory';

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("error in connecting: ".mysqli_connect_error());
}

$sql="CREATE TABLE admin_account (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dateT VARCHAR(255) NOT NULL)";

if(mysqli_query($conn,$sql)){
    //echo "success in makeing database and table";

    $dateT = date('d/m/Y');
    $pass = hash("md5", 'admin123');

    $insert = "INSERT INTO admin_account ( fullname, username, password, dateT) VALUES ('Admin', 'admin', '$pass', '$dateT')";

    if (mysqli_query($conn, $insert)) {
        Header("location:stage4.php");
    }

    
}else{
    echo "error: ".mysqli_error($conn);
}
mysqli_close($conn);