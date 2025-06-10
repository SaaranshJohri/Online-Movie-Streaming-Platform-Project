<?php
// Database connection (replace with your database credentials)
$conn = new mysqli('localhost', 'root', '', 'movie');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    // Password validation
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password before storing it
    $password = md5($password);

    // Insert data into the database
    $sql = "INSERT INTO userlogin (username, email, phone, password, gender, country) 
            VALUES ('$username', '$email', '$phone', '$password', '$gender', '$country')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: structure.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>