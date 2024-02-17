<?php
     // database details
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
      // get data for booking table
      $checkindate = $_POST['date'];
      $checkoutdate = $_POST['date'];
      $guests = $_POST['number'];
        //using sql to create a data entry query
        $sql = "INSERT INTO bookings (check_in_date, check_out_date, number_of_guests) VALUES (?, ?, ?)";
        // send query to the database to add values and confirm if successful
      if ($stmt = $con->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssi", $checkindate, $checkoutdate, $guests);
          // Attempt to execute the prepared statement
    if ($stmt->execute()) {
      echo "your booking was made successfully";
  } else {
      echo "Error: " . $stmt->error;
  }
  $stmt->close();
}
else {
  echo "Error: " . $con->error;
}
        $con->close();    
?>
<a href ="maintain.html"> Back to maintance form </a>