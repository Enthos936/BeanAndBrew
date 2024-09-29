<?php
    session_start();

    $host = "localhost";  

    $dbname = "customer_db";

    $username = "root";   

    $password = "";      


    // Create a connection

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $OrderId = $conn->real_escape_string($_POST["Name"]);
        $sql = "DELETE FROM orders WHERE OrderID='$OrderId'";
        $conn->query($sql);
    }
    header(header: "Location: ../Basket.view.php");