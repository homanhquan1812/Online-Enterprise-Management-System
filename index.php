<?php
// Section 
session_start();

if (!$_SESSION['username']) $_SESSION['username'] = 'User';
// if (!$_SESSION['password']) $_SESSION['password'] = '';


// Import controller
require_once './app/controllers/UserController.php';

$controller = new UserController();

if (isset($_POST['formAssign'])) {
    $temp = $_POST['id_user'];
    $controller->formAssign("012", "123", "456");
} else {
    $page = 'empty';
    if (isset($_GET['page']))
        $page = $_GET['page'];
    else if (isset($_POST['page']))
        $page = $_POST['page'];

    // redirect to page 
    $page = strtolower($page);
    if ($page == 'home') {
        $controller->home();
    } else if ($page == 'login') {
        $controller->login();
    } else if ($page == 'logout') {
        $controller->logout();
    } else if ($page == 'dashboard') {
        $controller->dashboard();
    } else if ($page == 'admin') {
        $controller->admin();
    } else if ($page == 'task') {
        $controller->task();
    } else if ($page == 'department') {
        $controller->departmenthead();
    } else if ($page == 'employee') {
        $controller->employee();
    } else {
        $controller->error404();
    }
}
