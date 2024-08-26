<?php
$servername = "127.0.0.1"; // your server name
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "web"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
