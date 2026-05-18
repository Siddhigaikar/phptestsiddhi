<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host="localhost";
$username="root";
$password="";
$database_name="php";

$conn = new mysqli($host,$username,$password,$database_name);

if($conn->connect_error){
    echo "Not connected: " . $conn->connect_error;
}else{
    echo "Connected successfully";
}
?>

