<?php
// Connection to MySQL database
session_start();

$host = "localhost";  

$dbname = "customer_db";

$username = "root";   

$password = "";      


// Create a connection

$conn = new mysqli($host, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}


// Process the form data

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $conn->real_escape_string($_POST["first_name"]);

    $last_name = $conn->real_escape_string($_POST["last_name"]);

    $email = $conn->real_escape_string($_POST["email"]);

    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);  
    // Hash the password for security

    $VerifyPassword = $conn->real_escape_string($_POST["confirm_password"]);


    // Insert the customer data into the database

    $email_check_query = "SELECT * FROM customers WHERE email='$email' LIMIT 1";
    $result = $conn->query($email_check_query);
    $count = 0;
    $ErrorArray = [];

    //Creates and runs a sql query to check whether email exists
    //Also defines variaables

    if ($result->num_rows > 0){
        $count += 1;
        $ErrorArray[] = "Email Already Registered!";
    } 
    if((password_verify($VerifyPassword, $password)) == False) {
        $count =+ 1;
        $ErrorArray[] = "Passwords Do Not match!";
    } 
    if(filter_var($email,FILTER_VALIDATE_EMAIL) == False){
        $count =+ 1;
        $ErrorArray[] = "Email is not valid";
    }
    // error handling techniques used to check if the 
    // data has been entered properly or not
    if($count == 0){
        $sql = "INSERT INTO customers (first_name, last_name, email, password)

                VALUES ('$first_name', '$last_name', '$email', '$password')";
        // sql query used to add data to the database


        if (Count( $ErrorArray) == 0 && $conn->query($sql) === TRUE) {

            echo "Registration successful!";
            // if no errors found executes sql
        } else {

            echo "Error: " . $sql . "<br>" . $conn->error;

        }
        header("Location: ../Login.view.php");
        $_SESSION["ErrorCount"] = $count;
        $_SESSION["Errors_Present"] = False;
        // redirectes user to home page as well as adding to error count
    } else {
        $_SESSION["Error_Array"] = $ErrorArray;
        $_SESSION["ErrorCount"] = $count;
        header(header: "Location: ../Register.view.php");
        // adds errors to error array and redirects back to register page
    };



};
 

$conn->close();
die;



