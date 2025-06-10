<?php
// Connect to the database
$servername = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "movie"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query
$search_query = $_GET['query']; // From the search bar

// Prepare and execute the SQL query
$sql = "SELECT * FROM movies WHERE title LIKE ?";
$stmt = $conn->prepare($sql);
$search_term = "%" . $search_query . "%"; // For partial matching
$stmt->bind_param("s", $search_term);
$stmt->execute();
$result = $stmt->get_result();

// Check if any results are returned
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<img src='" . $row['image_path'] . "' alt='" . $row['title'] . "' style='width:200px;height:300px;'><br>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>Genre: " . $row['genre'] . "</p>";
        echo "<p>Release Year: " . $row['release_year'] . "</p>";
        echo "<p>" . $row['description'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No results found for: " . htmlspecialchars($search_query);
}

// Close connection
$stmt->close();
$conn->close();
?>
