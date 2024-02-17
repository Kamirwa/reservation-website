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
         // Check if the user is authenticated, if not, redirect to login page
      /*if (!isset($_SESSION['username'])) {
         header("Location: admin.php");
         exit();
     }*/
        // get data for user table
       $name = $_POST['name'];
       $email = $_POST['email'];
       //new ones
       $number= $_POST['phone'];
       $dob = $_POST['dob'];
       $nation = $_POST['nationality'];
       $gender = $_POST['gender'];
         //using sql to create a data entry query
       
       $sql = "INSERT INTO User (name, email, phone_number, date_of_birth, nationality, gender) 
       VALUES (?, ?, ?, ?, ?, ?)";
        // send query to the database to add values and confirm if successful
        if ($stmt = $con->prepare($sql)) {
         // Bind variables to the prepared statement as parameters
         $stmt->bind_param("ssssss", $name, $email, $number, $dob, $nation, $gender);
               // Attempt to execute the prepared statement
         if ($stmt->execute()) {
           echo "New record created successfully";
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