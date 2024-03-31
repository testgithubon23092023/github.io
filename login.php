<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "georgianilacstudents";

    // Create connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get username and password from form
    $entered_username = $_POST["username"];
    $entered_password = $_POST["password"];

    // SQL query to fetch user from the database
    $sql = "SELECT * FROM studentsilac WHERE name='$entered_username' AND password='$entered_password'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        // User exists, login successful
        echo "Login successful";
    } else {
        // User doesn't exist or incorrect credentials
        echo "Incorrect username or password. please try again later";
    }


    // Close connection
    $conn->close();
}