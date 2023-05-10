<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enterpriseDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["level"];
    $department_id = $_POST["department_id"];

    $sql = "INSERT INTO employee (name, username, password, level, department_id) 
    VALUES ('$name', '$username', '$password', $level, $department_id)";
    if (mysqli_query($conn, $sql)) {
        echo "<script>sessionStorage.setItem('employee_created', 'true');</script>";
        header("Location: ../../frontend/pages/admin.php");
        // echo "Employee created successfully";
    } else {
        echo "Employee created falied";
    }
} else {
    echo "FAILED";
}
