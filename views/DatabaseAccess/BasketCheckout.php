<?php
    session_start();

    $host = "localhost";  

    $dbname = "customer_db";

    $username = "root";   

    $password = "";      

    $ErrorArray = [];
    $Error_Count = 0;
    $id = $_SESSION["UserID"];
    $Name = $_SESSION["First_Name"] . " " . $_SESSION["Last_Name"];

    // Create a connection

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = $conn->real_escape_string($_POST["date"]);
        $IsHamper = $conn->real_escape_string($_POST["IsHamper"]);
        if($IsHamper == True){
            $IsHamper = 1;
        }  else {
            $IsHamper = 0;
        }
        $time = $conn->real_escape_string($_POST["time"]);
        if (is_numeric(str_replace(":","", $time)) === True){
            $time = date("H:i", strtotime($time));
        } else {
            $ErrorArray[] = "Please ensure time is entered as Hour:Minute";
            $Error_Count += 1;
        }
        if (is_numeric(str_replace("/","",$date)) === True){
            $date = date("d/m/Y", strtotime(str_replace("/","-",$date)));
        } else {
            $ErrorArray[] = "Please ensure date is entered as Day/Month/Year";
            $Error_Count += 1;
        }
        if ($Error_Count == 0){
            $sql = "UPDATE orders SET Payed='1', CollectTime='$time', CollectDate='$date', IsHamper='$IsHamper', Name='$Name' WHERE id = '$id' and Payed = '0'";
            $conn->query($sql);
        }
    }
    $_SESSION["Error_Array"] = $ErrorArray;
    header(header: "Location: ../Basket.view.php");
