<?php

$servername = "localhost";
$username = "admin95_ad9ad5m";
$password = "KVV959595Ua!!!ukr2001usp";
$dbname = "admin95_job_db";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>