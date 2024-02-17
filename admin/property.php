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
     $name = isset($_POST['name']) ? $_POST['name'] : '';
     $room = isset($_POST['room']) ? $_POST['room'] : '';
     
     // Additional input validation and sanitization (you can extend this based on your requirements)
     $name = trim($con->real_escape_string($name));
     $room = trim($con->real_escape_string($room));
     
     // Using prepared statements to prevent SQL injection
     $sql = "INSERT INTO property (name, rooms) VALUES (?, ?)";
     
     if ($stmt = $con->prepare($sql)) {
         $stmt->bind_param("ss", $name, $room);
     
         if ($stmt->execute()) {
             echo "Your chosen property was secured";
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
     