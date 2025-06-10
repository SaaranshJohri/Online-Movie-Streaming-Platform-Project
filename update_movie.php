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

// Collect data
$title = $_POST['title'];
$newTitle = $_POST['newTitle'];
$newGenre = $_POST['newGenre'];
$newYear = $_POST['newYear'];
$newDescription = $_POST['newDescription'];

// Prepare update query
$updateQuery = "UPDATE movies SET ";

if (!empty($newTitle)) {
    $updateQuery .= "title='$newTitle', ";
}
if (!empty($newGenre)) {
    $updateQuery .= "genre='$newGenre', ";
}
if (!empty($newYear)) {
    $updateQuery .= "year='$newYear', ";
}
if (!empty($newDescription)) {
    $updateQuery .= "description='$newDescription' ";
}

// Remove last comma if needed and add where clause
$updateQuery = rtrim($updateQuery, ', ') . " WHERE title='$title'";

if ($conn->query($updateQuery) === TRUE) {
    echo "Movie updated successfully";
} else {
    echo "Error updating movie: " . $conn->error;
}

$conn->close();
?>
