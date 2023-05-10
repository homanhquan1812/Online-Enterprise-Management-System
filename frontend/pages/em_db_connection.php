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

    /* Employee Login Account */
    $name = 'Jack Smith';

    /* Your information */
    $sql = "SELECT department_id, name, level, department_name FROM employee WHERE name = '$name'";
    $result = mysqli_query($connect, $sql);

?>