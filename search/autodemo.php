<?php
 // database details
 $servername = "localhost";
 $username = "akamirwa";
 $password = "NClQw7";
 $dbname = "Group-5";
 //database connection
 $con = new mysqli($servername, $username, $password, $dbname);
 if(mysqli_connect_errno())
 {
 die("Connection failed!" . mysqli_connect_errno());
 }
 //query to retrieve that from database
 if (isset($_POST['query'])) {
    $query = "{$_POST['query']}%";
    $stmt = $con->prepare("SELECT country FROM location WHERE country LIKE ? ORDER BY country ASC");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['country'] . '</li>';
        }
    }
    else{
        //error if data is not found
        echo "Country not found";
    }
}
?>