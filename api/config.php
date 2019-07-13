<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "findjob";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
} 



 ?>