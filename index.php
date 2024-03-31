<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ilac_college";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["employee_name"]) || empty($_POST["hours_worked"]) || empty($_POST["employee_id"]) ){
        echo"All fields are required";
    }
    else{
        // validating the name that should be in characters
        if(!preg_match("/^[a-zA-Z]*$/",$_POST["employee_name"])) {

            echo"employee_name should be in characters";
            exit();

        }
        else{
            $employee_name = $_POST["employee_name"];
        }

        //validating the nours worked by employee in numbers only
        if(!preg_match( "/^[0-9]*$/",$_POST["hours_worked"])){
            echo"hours_worked should be in interger";
            exit();
        }
        else{
            $hours_worked = $_POST["hours_worked"];
        }

        // validating the employee id that should be in character only
        if(!preg_match("/^[0-9]*$/", $_POST["employee_id"])){
            echo"employee_id should contain only numbers";
            exit();
        }
        else{
            $employee_id = $_POST["employee_id"];
        }

    }

}


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$employee_name = $_POST['employee_name'];
$hours_worked = $_POST['hours_worked'];
$employee_id = $_POST['employee_id'];

// SQL query
$sql = "INSERT INTO employee_info (employee_name, hours_worked, employee_id) VALUES ('$employee_name', $hours_worked, '$employee_id')";

if ($conn->query($sql) === TRUE) {
    echo "New employee record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql = "SELECT * FROM employee_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "Employee Name: " . $row["employee_name"] . "<br>";
        echo "Hours Worked: " . $row["hours_worked"] . "<br>";
        echo "Employee ID: " . $row["employee_id"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No employees found";
}

$conn->close();
?>
