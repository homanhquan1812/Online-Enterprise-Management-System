<?php
// Start a session
session_start();

// Get the submitted email and password
$email = $_POST['email'];
$password = $_POST['password'];

// Connect to the database
$servername = "localhost";
$username = "root";
$dbpassword = "root";
$dbname = "web_programming_assignment";
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query to check the Director table with email and password
$sql = 'SELECT * FROM Director WHERE email ="' . $email .  '" AND password = "' . $password . '";';


// echo $sql;
// $result = mysqli_query($conn, $sql);
$result = $conn->query($sql);

// echo json_encode($result);

if ($result && $result->num_rows > 0) {
    $_SESSION['email'] = $email;
    header("Location: ../../frontend/pages/admin.php");
} else {
    echo "failed";
}

// Check if there is a match for the email and password
// if (mysqli_num_rows($result) == 1) {
//     // Login successful
//     $_SESSION['email'] = $email;
//     header("Location: dashboard.php"); // Redirect to dashboard page
// } else {
//     // Login failed
//     header("Location: login.php?error=1"); // Redirect back to login page with error message
// }

// Close the database connection
// mysqli_close($conn);
