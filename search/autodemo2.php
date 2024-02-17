<?php
 // database details
 $servername = "localhost";
 $username = "akamirwa";
 $password = "NClQw7";
 $dbname = "Group-5";
 $con = new mysqli($servername, $username, $password, $dbname);
 //database connection
 if(mysqli_connect_errno())
 {
 die("Connection failed!" . mysqli_connect_errno());
 }
 //query to display database details
 if (isset($_POST['query'])) {
    $query = "{$_POST['query']}%";
    $stmt = $con->prepare("SELECT review FROM review WHERE rate LIKE ? ORDER BY rate ASC");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['review'] . '</li>';
        }
    }
    else{
        //incase rate is not found
        echo "rate not found";
    }
}
?>