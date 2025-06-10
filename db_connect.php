<?php
$servername = "localhost";  // XAMPP uses 'localhost'
$username = "root";         // Default XAMPP MySQL username
$password = "password";             // Default password is empty
$dbname = "movie"; // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
