<?php
$host = "localhost";  // Replace with your host if not localhost
$user = "root";       // Replace with your MySQL username
$password = "";       // Replace with your MySQL password
$dbname = "intern_management";  // Database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
