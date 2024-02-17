<!-- Guest-search-results.php -->
<?php
$servername = "localhost";
$username = "akamirwa";
$password = "NClQw7";
$dbname = "Group-5";
// Create a connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the 'id2' parameter is set in the POST request
if (isset($_POST['id2'])) {
    // Query to select countries starting with 'G'
    $query = "SELECT * FROM location WHERE country LIKE 'G%'";

    // Prepare and execute the statement (although 'id2' is not used directly in this query)
    $stmt = $con->prepare($query);
    
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                $field1name = $row["lid"];
                echo "<li><a href='display1.php?lid=$field1name'>$field1name</a></li>";
            }
            echo "</ul>";
        } else {
            echo "Not found";
        }

        $stmt->close();
    } else {
        echo "Error in the prepared statement";
    }
}

// Close the database connection
$con->close();
?>
<!-- <a href = "search.html">GO BACK TO SEARCH</a> -->


