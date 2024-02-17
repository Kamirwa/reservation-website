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
 //query to retrieve data from database
 if (isset($_POST['query'])) {
    $query = "{$_POST['query']}%";
    $stmt = $con->prepare("SELECT name FROM User WHERE name LIKE ? ORDER BY name ASC");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['name'] . '</li>';
        }
    }
    else{
        //a message to be displayed incase data is not found
        echo "Guest not found";
    }
}
?>