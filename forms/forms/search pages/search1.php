

<!-- Guest-search-results.php -->
<?php
$servername = "localhost";
$username = "akamirwa";
$password = "NClQw7";
$dbname = "Group-5";
   // creating a connection
   $con = new mysqli($servername, $username, $password, $dbname);

   // to ensure that the connection is made
   if(mysqli_connect_errno())
   {
    die("Connection failed!" . mysqli_connect_errno());
   }
    if (isset($_POST['id2'])){
   $id = mysqli_real_escape_string($con, $_POST['id2']);
   //query
   //$query = "SELECT * FROM location WHERE id > '$id'";
   $query = "SELECT * FROM location WHERE country like 'G%'";
   $result = mysqli_query($con, $query);
   if($result){
      echo "<ul>";
   while ($row = $result->fetch_assoc()) {
       $field1name = $row["id"];
       echo "<li><a href='display1.php?id=$field1name'>$field1name</a></li>";
    }
   echo "</ul>";
}
else{
    echo "Not found";
}
    }
?>
<!-- <a href = "search.html">GO BACK TO SEARCH</a> -->


