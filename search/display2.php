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

$query = "SELECT * FROM User WHERE id='$clickedId'";

$result = mysqli_query($con, $query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row["name"]);
        $email = htmlspecialchars($row["email"]);

        $number=htmlspecialchars($row["phone_number"]);
       $dob =htmlspecialchars($row["date_of_birth"]);
       $nation =htmlspecialchars($row["nationality"]);
       $gender = htmlspecialchars($row["gender"]);
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "phone: $number<br>";
        echo "date of birth: $dob<br>";
        echo "Nationality: $nation<br>";
        echo "Gender: $gender<br>";
    }
} else {
    echo "not found";
}
}
echo"<br> <a href = searchform.html> Go back to forms</a><br>";
?>
<a href = "search.html">GO BACK TO SEARCH</a>

