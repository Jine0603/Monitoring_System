<?php
// Replace these with your actual database credentials
$hostname = "localhost"; // Usually "localhost" if the database is on the same server
$username = "root";
$password = "";
$dbname = "fixedassets";

// Create the database connection
$conn = new mysqli($hostname, $username, $password, $dbname);

// Check the connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected to the database successfully.";

// $conn->close();
?>