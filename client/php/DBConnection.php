<?php
$servername = "localhost"; // database server name
$username = "root"; // database username
$password = ""; // database password
$database = "Ecommerce"; // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>
