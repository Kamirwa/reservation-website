<?php
$servername = "localhost";
$username = "akamirwa";
$password = "NClQw7";
$dbname = "Group-5";
// creating a connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['lid'])) {
    // Sanitize input
    $clickedId = $con->real_escape_string($_GET['lid']);

    // Prepare a statement using a parameterized query to prevent SQL injection
    $query = "SELECT * FROM location WHERE lid=?";
    $stmt = $con->prepare($query);

    // Bind the parameter
    $stmt->bind_param("i", $clickedId);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $country = htmlspecialchars($row["country"]);
            $city = htmlspecialchars($row["city"]);
            echo "Country: $country<br>";
            echo "City: $city<br>";
        }
    } else {
        echo "Not found";
    }

    // Close the prepared statement
    $stmt->close();
}

echo "<br> <a href='searchform.html'>Go back to forms</a><br>";
?>

