<?php
 session_start();
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
        //creating username and password
        $username =$_POST['username'];
        $pass = $_POST['password'];
        //validating credentials
        $query = "SELECT * from admin where username = '$username' AND password = '$pass'";
        $result = mysqli_query($con,$query);
        if (mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $username;
            header("Location: maintain.html");
            exit();
        }
        else{
          echo "Invalid username and password! try again";
        }
        ?>