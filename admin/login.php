<?php
session_start();

// Database details
$servername = "localhost";
$usernameDB = "akamirwa";
$passwordDB = "NClQw7";
$dbname = "Group-5";

// Creating a connection
$con = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Validating credentials using prepared statements
$username = isset($_POST['username']) ? $_POST['username'] : '';
$pass = isset($_POST['password']) ? $_POST['password'] : '';

// Additional input validation and sanitization
$username = trim($con->real_escape_string($username));
$pass = trim($con->real_escape_string($pass));

// Creating prepared statement
$query = "SELECT * FROM admin WHERE username = ? AND password = ?";
$stmt = $con->prepare($query);

if ($stmt) {
    $stmt->bind_param("ss", $username, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: maintain.html");
        exit();
    } else {
        echo "Invalid username and password! Try again";
    }

    $stmt->close();
} else {
    echo "Error in the prepared statement: " . $con->error;
}

$con->close();
?>
