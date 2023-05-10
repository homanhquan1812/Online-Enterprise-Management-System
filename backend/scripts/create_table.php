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
$sql = array(
    "CREATE TABLE Director (
    director_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    PRIMARY KEY (director_id)
  );",
    "CREATE TABLE Department (
    department_id INT NOT NULL AUTO_INCREMENT,
    department_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (department_id)
  );",
    "CREATE TABLE Employee (
    employee_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    level INT NOT NULL,
    department_id INT,
    PRIMARY KEY (employee_id),
    FOREIGN KEY (department_id) REFERENCES Department(department_id)
  );",
    "CREATE TABLE Task (
    task_id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    deadline DATETIME NOT NULL,
    assigned_to INT NOT NULL,
    assigned_by INT NOT NULL,
    PRIMARY KEY (task_id),
    FOREIGN KEY (assigned_to) REFERENCES Employee(employee_id),
    FOREIGN KEY (assigned_by) REFERENCES Employee(employee_id)
  );"
);

foreach ($sql as $query) {
    if ($conn->query($query) === TRUE) {
        echo "<p>Successfully</p>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$conn->close();
