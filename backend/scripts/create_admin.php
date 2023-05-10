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

// sql to create table
$sql = "INSERT INTO `Director` (`email`, `password`) VALUES
('admin@gmail.com', 'admin');
";

if ($conn->query($sql) === TRUE) {
    echo "Superuser was created. Login with admin@gmail.com. Password: admin.";
} else {
    echo "Error creating superuser: " . $conn->error;
}

$conn->close();
