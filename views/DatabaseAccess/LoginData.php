<?php
    session_start();
// Connection to MySQL database


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

    $email = $conn->real_escape_string($_POST["email"]);

    $password = $conn->real_escape_string($_POST["password"]);
    // gathers the data from the input fields

    $sql = "SELECT password FROM customers WHERE email='$email'";
    // gathers sql query above for execution below
    $result = $conn->query($sql);

    while($row = mysqli_fetch_array($result)){
        $hash = $row["password"];
    }
    // gathers the password for hash comparison

    if ($result->num_rows >= 1){
        // checks to see if the password enters matches one found
        if (password_verify($password, $hash)){
            $sql = "SELECT * FROM customers WHERE email='$email'";   
            $result = $conn->query($sql);
            while($row = mysqli_fetch_array($result)){
                $_SESSION["First_Name"] = $row["first_name"];
                $_SESSION["Last_Name"] = $row["last_name"];
                $_SESSION["Email"] = $row["email"];
                $_SESSION["UserID"] = $row["id"];
                $_SESSION["LoggedIn"] = "True";
            }
            // if passwords match it will then gather all the users data
            // into session variables for use through whole code
            // and redirect user to home page
            header("Location: ../Home.view.php");
        } else {
            $_SESSION["Error_Array"] = ["Incorrect password has been entered"];
            header("Location: ../Login.view.php");
            // if passwords do not match will return error and redirect to log in page
        }
    // if data is found code above is ran if not code below is ran
    } else {
        $_SESSION["Error_Array"] = ["No accounts have been found"];
        header("Location: ../Login.view.php"); 
        // Creates a error for the error array a well as returning user back to log in page
    } 


}
