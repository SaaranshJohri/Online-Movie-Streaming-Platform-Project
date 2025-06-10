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

// Get the title to delete
$title = $_POST['title'];

// Prepare delete query
$sql = "DELETE FROM movies WHERE title='$title'";

if ($conn->query($sql) === TRUE) {
    echo "Movie deleted successfully";
} else {
    echo "Error deleting movie: " . $conn->error;
}

$conn->close();
?>
