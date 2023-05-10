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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $level = $_POST["level"];
    $department_id = $_POST["department_id"];

    $sql = "INSERT INTO employee (name, email, password, level, department_id) 
    VALUES ('$name', '$email', '$password', $level, $department_id)";
    if (mysqli_query($conn, $sql)) {
        echo "Values have been inserted";
    } else {
        echo "Insert falied";
    }
} else {
    echo "FAILED";
}
