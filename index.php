<?php
// Section 
session_start();

if (!$_SESSION['username']) $_SESSION['username'] = 'User';
if (!$_SESSION['current_user_id']) $_SESSION['current_user_id'] = 0;
if ($_SESSION["employee_current_id"] < 0) $_SESSION["employee_current_id"] = -1;
if (!$_SESSION['loginBtn']) $_SESSION['loginBtn'] = 'Login';
// if (!$_SESSION['selectedUser']) $_SESSION['selectedUser'] = 'Unkno';

// echo 'btn: ' . $_SESSION['loginBtn'];

// if ($_SESSION["assigner_current_id"] < 0) $_SESSION["assigner_current_id"] = -1;
if ($_SESSION["submit_current_id"] < 0) $_SESSION["submit_current_id"] = -1;
// if (!$_SESSION['password']) $_SESSION['password'] = '';

// Import controller
require_once './app/controllers/UserController.php';

$controller = new UserController();

if (isset($_POST['showPopup'])) {
    $_SESSION["employee_current_id"] = (int)$_POST['id'];
}

else if (isset($_POST['showPopupByPost'])) {
    $_SESSION["employee_current_id"] = (int)$_POST['id'];
    $controller->admin();
}

else if (isset($_POST['formUpdateDepartment'])) {
    $id = $_POST['fixId'];

    $newDepartmentName = $_POST['newDepartmentName'];
    $newHeadName = $_POST['newHeadName'];
    $newNotes = $_POST['newNotes'];

    // echo 'id: ' . $id;
    // echo ', new name: ' . $newDepartmentName;
    // echo ', new Department head: ' . $newHeadName;
    // echo ', notes: ' . $newNotes;

    $controller->updateDepartment($id, $newDepartmentName, $newHeadName, $newNotes);
    $controller->admin();
}

else if (isset($_POST['formUpdateDepartmentPopup'])) {

}

else if (isset($_POST['formRemoveDepartment'])) {

}

else if (isset($_POST['formAddDepartment'])) {

}


else if (isset($_POST['formAssign'])) {
    $assigner_Id = $_POST['assignerId'];
    $task_Id = $_POST['taskId'];
    // $employee_Id = $_POST['employeeId'];
    $employee_Id = $_SESSION["employee_current_id"];
    $controller->formAssign($assigner_Id, $task_Id, $employee_Id);
    $controller->admin();
} else if (isset($_POST['assignPopupForm'])) {
    $_SESSION["employee_current_id"] = (int)$_POST['id'];
    // echo json_encode(array('success' => true));
} else if (isset($_POST['formPopup'])) {
    // new
    echo $_POST['name'] . "<br />";
    echo $_POST['email'] . "<br />";
    echo $_POST['phone'] . "<br />";
    echo $_POST['gender'] . "<br />";
    echo "==============================<br />";
    echo "All Data Submitted Successfully!";


    // oke
    // if (isset($_POST["current__Id"])) {
    //     // echo $_POST["currentID"];
    //     $_SESSION["employee_current_id"] = $_POST["current__Id"];
    // }
    // // echo 'here' . $_SESSION["employee_current_id"];
    // $controller->admin();
} else if (isset($_POST['formSubmit'])) {
    // $submitId = $_POST['submitId_'];
    $result = $_POST['resultFromEmployee'];
    $controller->submitProcessing((int)$_SESSION["submit_current_id"], $result);
    $controller->employee();
} else if (isset($_POST['formPopupSubmit'])) {
    if (isset($_POST["assigner_current__id"])) {
        echo 'assigner id currently: ' . $_SESSION["assigner_current_id"];
        // $_SESSION["assigner_current_id"] = $_POST["assigner_current__id"];
        $_SESSION["submit_current_id"] = $_POST["submit_current__id"];
    }
    $controller->employee();
} else if (isset($_POST['approveForm'])) {
    $submit_id = $_POST['approveValue'];
    $_taskId_ = $_POST['_taskId'];
    $controller->approve($submit_id, $_taskId_);
    $controller->admin();
} else if (isset($_POST['rejectForm'])) {
    $submit_id = $_POST['rejectValue'];
    $_taskId_ = $_POST['_taskId'];
    $controller->reject($submit_id, $_taskId_);
    $controller->admin();
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
        echo 'Page: ' . $page;
        $controller->error404();
    }
}
