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

// Prepare the query to retrieve movies
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table><tr><th>Title</th><th>Genre</th><th>Release Year</th><th>Description</th></tr>";
    echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["genre"] . "</td><td>" . $row["year"] . "</td><td>" . $row["description"] . "</td></tr>";
    }
    echo "</table>";
} 
else {
    echo "0 results";
}
echo "------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------";
$conn->close();
?>
