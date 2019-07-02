<?php
$servername = "localhost";
$server_username = "root";
$server_password = "";
$database = "ccap";

// Create connection
$conn = mysqli_connect($servername, $server_username, $server_password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
