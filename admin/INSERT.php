<?php
$conn = mysqli_connect("localhost", "root", "", "phone_system");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $Name =  $_REQUEST['Name'];
        $Department = $_REQUEST['Department'];
        $Telno =  $_REQUEST['Telno'];
        $Job_Title = $_REQUEST['Job_Title'];
        $Location = $_REQUEST['Location'];
        $Email = $_REQUEST['Email'];
          
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO identity  VALUES ('$Name', 
            '$Department','$Telno','$Job_Title','$Location','$Email')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully.</h3>"; 
  
            echo nl2br("\n$Name\n $Department\n "
                . "$Telno\n $Job_Title\n $Location\n $Email");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>