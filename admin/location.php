<?php
     // database details
     $servername = "localhost";
     $username = "akamirwa";
     $password = "NClQw7";
     $dbname = "Group-5";
     $con = new mysqli($servername, $username, $password, $dbname);

     // Check connection
     if ($con->connect_error) {
         die("Connection failed: " . $con->connect_error);
     }
     
     // Validate and sanitize user input
     $country = isset($_POST['country']) ? $_POST['country'] : '';
     $city = isset($_POST['city']) ? $_POST['city'] : '';
     
     // Additional input validation and sanitization (you can extend this based on your requirements)
     $country = trim($con->real_escape_string($country));
     $city = trim($con->real_escape_string($city));
     
     // Using prepared statements to prevent SQL injection
     $sql = "INSERT INTO location (country, city) VALUES (?, ?)";
     
     if ($stmt = $con->prepare($sql)) {
         $stmt->bind_param("ss", $country, $city);
     
         if ($stmt->execute()) {
             echo "New record created successfully";
         } else {
             echo "Error: " . $stmt->error;
         }
     
         $stmt->close();
     } else {
         echo "Error: " . $con->error;
     }
     
     $con->close();
     ?>
     <a href="maintain.html">Back to maintenance form</a>
     