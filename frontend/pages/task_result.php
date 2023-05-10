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

    $sql_tr = "SELECT task_name, task_description FROM task_new";
    $result_tr = mysqli_query($connect, $sql_tr);

    $sql_tr1 = "SELECT task_name, task_description FROM task_new";
    $result_tr1 = mysqli_query($connect, $sql_tr1);

    $start = 0;
    $start1 = 0;
    $rows_per_page = 1;

    $nr_of_rows = mysqli_num_rows($result_tr);
    $nr_of_rows1 = mysqli_num_rows($result_tr1);

    $page_alt = ceil($nr_of_rows / $rows_per_page);
    $page1_alt = ceil($nr_of_rows1 / $rows_per_page);

    if(isset($_GET['check'])){
        $page = $_GET['check'] - 1;
        $start = $page * $rows_per_page;
    }

    if(isset($_GET['assign'])){
        $page1 = $_GET['assign'] - 1;
        $start1 = $page1 * $rows_per_page;
    }

    $sql_limit = "SELECT task_name, task_description FROM task_new LIMIT $start, $rows_per_page";
    $record = mysqli_query($connect, $sql_limit);

    $sql_limit1 = "SELECT task_name, task_description FROM task_new LIMIT $start1, $rows_per_page";
    $record1 = mysqli_query($connect, $sql_limit1);

?>