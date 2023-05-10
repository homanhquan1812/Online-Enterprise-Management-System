<?php

session_start();
if ($page == 'home' || $page == 'Home') {
    $controller->home();
} else if ($page == 'login' || $page == 'Login') {
    $controller->login();
} else if ($page == 'logout' || $page == "Logout") {
    $controller->logout();
} else if ($page == 'dashboard' || $page == "Dashboard") {
    $controller->dashboard();
} else if ($page == 'admin' || $page == "Admin") {
    $controller->admin();
} else if ($page == 'department' || $page == "Department") {
    $controller->departmenthead();
} else if ($page == 'employee' || $page == 'Employee') {
    $controller->employee();
} else {
    $controller->error404();
}
