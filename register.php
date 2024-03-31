<?php
// create the connection with  Database
$dbHost = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "georgianilacstudents";

// CREATE THE DATABASE CONNECTION:
$conn = new mysqli($dbHost, $dbUsername, $dbpassword, $dbName);

//  Verification
//verify  that the connected is built
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have fields like username and password in your registration form
    $username = $_POST['username'];
    $password =password_hash($_POST['password'],PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO studentsilac (name, password) VALUES('$username','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";

    } // TAKE ME BACK TO THE HOME PAGE after three seconds
    // header("Location: Home.html");
    header("refresh:3; url=Home.html");
    exit;

}