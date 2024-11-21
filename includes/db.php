<?php
// Database connection details
$servername = "localhost"; // Usually "localhost" on shared hosting
$username = "a30084179_user";  // Your database username
$password = "Singla@64500";  // Your database password
$dbname = "a30084179_db";  // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
