<?php
session_start();
// include './config/db.php';

$position = $_POST['position'];
$task = $_POST['task'];
$id_user = $_POST['id_user'];

$sql = "UPDATE Employee SET level= '$position' WHERE employee_id='$id_user'";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "web_programming_assignment";

// $conn = new mysqli($servername, $username, $password, $dbname);
// $conn->query($sql);

echo $sql;

// echo '</br>';
// if ($conn->query($sql) === TRUE) {
//     echo "Record updated successfully";
// } else {
//     echo "Error updating record: " . $conn->error;
// }

// echo '</br>';
// include './app/views/pages/adminPage.php';
// header('Location: http://localhost:8888/web_programming_assignment/index.php?page=admin');
?>
<!-- <a href="http://localhost:8888/web_programming_assignment/index.php?page=admin">Admin page</a> -->