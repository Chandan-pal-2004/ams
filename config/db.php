<?php
$host = "localhost";  // XAMPP runs on localhost
$user = "root";       // Default MySQL user in XAMPP
$password = "";       // Default is empty in XAMPP
$database = "ams"; // Your database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>