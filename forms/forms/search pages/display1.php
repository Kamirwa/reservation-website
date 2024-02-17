<?php
$servername = "localhost";
$username = "akamirwa";
$password = "NClQw7";
$dbname = "Group-5";
// creating a connection
$con = new mysqli($servername, $username, $password, $dbname);

// to ensure that the connection is made
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if(isset($_GET['id'])){
    $clickedId = $_GET['id'];

$query = "SELECT * FROM location WHERE id='$clickedId'";
$result = mysqli_query($con, $query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $country = htmlspecialchars($row["country"]);
        $city = htmlspecialchars($row["city"]);
        echo "Country: $country<br>";
        echo "city: $city<br>";
    }
} else {
    echo "not found";
}
}
echo"<br> <a href = maintain.html> Go back to forms</a><br>";
?>
<a href = "search1.html">GO BACK TO SEARCH</a>

