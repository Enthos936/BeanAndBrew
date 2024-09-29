<?php

session_start();

    $host = "localhost";  

    $dbname = "customer_db";

    $username = "root";   

    $password = "";      

    $ErrorArray = [];
    $Error_Count = 0;
    $id = $_SESSION["UserID"];
    // Create a connection

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $conn->real_escape_string($_POST["Date"]);
        $time = $conn->real_escape_string($_POST["Time"]);
        $location = $conn->real_escape_string($_POST["Location"]);
        // Assigns the data from the html to php variables

        if (is_numeric(str_replace("/","",$date)) === True){
            $date = date("d/m/Y", strtotime(str_replace("/","-",$date)));
        } else {
            $ErrorArray[] = "Please ensure date is entered as Day/Month/Year";
            $Error_Count += 1;
        }format: 
        // checks to see whether or not the data has been entered in the right format
        if(strtotime(str_replace("/","-",$date)) < strtotime("now")){
            $ErrorArray[] = "Day Selected has already passed"; 
            $Error_Count +=1;
        }
        // checks to see whether the date has already passed
        if ($Error_Count == 0){
            $sql = "INSERT INTO bookings(UserID, bookingType, Location, Date, Time) 
            VALUES ('$id','Table','$location','$date','$time')";
            $conn->query($sql);
        // will only run the code depending on if no errors occur, if not code below is ran
        } else {
            $_SESSION["Error_Array"] = $ErrorArray;
            $_SESSION["ErrorCount"] = $count;
            // Creates a error for the error array a well as returning user back to log in page
        };

        header(header: "Location: ../Booking.view.php");
    }