<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$title = $_POST['title'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$description = $_POST['description'];

$sql = "INSERT INTO movies (title, genre, year, description) VALUES ('$title', '$genre', '$year', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New movie added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
