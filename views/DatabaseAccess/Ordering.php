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

        $ProductName = $conn->real_escape_string($_POST["Name"]);

        $sql = "SELECT * FROM products WHERE ProductName = '$ProductName'";

        $result = $conn->query($sql);

        while($row = mysqli_fetch_array($result)){
            $ProductID = $row["ProductID"];
        }

        $UserID = $_SESSION["UserID"];

        $sql = "INSERT INTO orders (ProductID, id, Payed) VALUES ('$ProductID','$UserID','0')" ;

        $conn->query($sql);
    }
    header(header: "Location: ../Products.view.php");
