<?php
    $host = "localhost";
    $username = "root";
    $password = null;
    $database = "enterprisedb";
    $connect = mysqli_connect($host, $username, $password, $database);

    if (!$connect)
    {
        die("Connection failed." . mysqli_connect_error());
    }

    /* Department Head Login Account */
    $username_com = "101";
    $department_id = "1";

    // if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //    $username_com = $_SESSION['username'];
    //    $department_id = $_SESSION['department_id'];

        /* Your information */
        $sql = "SELECT department_id, name, level, department_name, username FROM employee WHERE username = '$username_com'";
        $result = mysqli_query($connect, $sql);

        $sql4 = "SELECT department_id, name, level, department_name, username FROM employee WHERE username = '$username_com'";
        $result4 = mysqli_query($connect, $sql4);

        /* List of all members in the company */
        $sql1 = "SELECT department_id, name, level, department_name, username FROM employee";
        $result1 = mysqli_query($connect, $sql1);

        /* List of members from your department */
        $sql2 = "SELECT department_id, name, level, department_name, username FROM employee WHERE department_id = '$department_id'";
        $result2 = mysqli_query($connect, $sql2);

        /* Information after signing in */
        $sql3 = "SELECT department_id, name, level, department_name, username FROM employee WHERE username = '$username_com'";
        $result3 = mysqli_query($connect, $sql3);

        /* Add members */
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $sql_login = "SELECT department_id, department_name FROM employee WHERE username = '$username_com'";
            $result_login = mysqli_query($connect, $sql_login);
            $row_login = mysqli_fetch_assoc($result_login);
            $department_id = $row_login['department_id'];
            $department_name = $row_login['department_name'];

            $sql_change = "UPDATE employee SET department_id = '$department_id', department_name = '$department_name' WHERE name = '$name'";
            $result_change = mysqli_query($connect, $sql_change);

            if ($result_change)
            {
                if(mysqli_affected_rows($connect) > 0) 
                {
                    echo "Member updated successfully.";
                } 
                else 
                {
                    echo "No records were updated.";
                }
            }
            else {
                echo "Error." . $sql_change . "<br>" . $connect->error;
            }
        }
    // }
?>