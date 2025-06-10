<?php
// Start session
session_start();

// Database connection (replace with your database credentials)
$conn = new mysqli('localhost', 'root', '', 'movie');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password before comparison (assuming passwords are stored hashed)
    $password = md5($password);

    // Query to check if email and password exist in the database
    $sql = "SELECT * FROM userlogin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login success
        $_SESSION['email'] = $email;
        // Redirect to structure.html
        header("Location: structure.html");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid email or password.";
    }
}

$conn->close();
?>