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
      // get data for payment table
      $method = $_POST['text'];
      $amount = $_POST['number'];
      $date = $_POST['date'];
        //using sql to create a data entry query
      $sql = "INSERT INTO payment (payment_method, amount,payment_date) 
       VALUES (?,?,? )";
     
        // send query to the database to add values and confirm if successful
       if ($stmt = $con->prepare($sql)) {
        $stmt ->bind_param("sss",$method, $amount, $date);
        if($stmt ->execute()){
           echo "New record created successfully";
        } else {
           echo "Error: "  . $stmt->error;
       }
       $stmt ->close();
      }
      else{
        echo "Error: " .$con ->error;
      }

        $con->close();
?>
<a href ="maintain.html"> Back to maintance form </a>