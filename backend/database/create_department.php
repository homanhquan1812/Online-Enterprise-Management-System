<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "web_programming_assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department_name = $_POST["department_name"];

    $sql = "INSERT INTO deparment (department_name) 
    VALUES ($department_name)";
    if (mysqli_query($conn, $sql)) {
        echo "Values have been inserted";
    } else {
        echo "Insert falied";
    }
} else {
    echo "FAILED";
}
