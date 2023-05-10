<?php
session_start();
include './app/models/UserModel.php';

class UserController
{
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function home()
    {
        include './app/views/pages/homePage.php';
    }

    public function login()
    {
        $loginSuccess = $this->model->login();
        if ($loginSuccess == true) {
            $_SESSION['loginBtn'] = 'Logout';
            $role = $this->model->getRole();
            if ($role == 'admin') header("location: http://localhost:8888/Assignment/index.php?page=admin");
            else if ($role == 'employee') include './app/views/pages/employeePage.php';
            else include './app/views/pages/departmentPage.php';
        } else {
            include './app/views/pages/loginPage.php';
        }
    }

    public function logout()
    {
        // session_destroy();
        $_SESSION['username'] = 'User';
        $_SESSION['loginBtn'] = 'Login';
        $_SESSION['current_user_id'] = -2;
        include './app/views/pages/homePage.php';
    }

    public function dashboard()
    {
        include './app/views/pages/dashboard.php';
    }

    public function admin()
    {
        // $userList = $this->model->getUserList();
        $tasksNotCompleted = $this->model->getTasksNotCompleted();
        // $taskList = $this->model->getAllTasks();
        $listTaskById = $this->model->getTaskResultByAdminId((int)$_SESSION['current_user_id']);
        include './app/views/pages/adminPage.php';
    }

    public function departmenthead()
    {
        
        include './app/views/pages/departmentHeadPage.php';
    }

    public function employee()
    {
        $userList = $this->model->getUserList();
        // $taskList = $this->model->getAllTasks();
        // $listTaskById = $this->model->getTasksReceiveByEmployeeId((int)$_SESSION['current_user_id']);
        // $listTaskById = $this->model->getTasksReceiveByEmployeeId(2);
        include './app/views/pages/employeePage.php';
    }

    public function error404()
    {
        require_once './app/views/pages/error404.php';
    }

    public function formAssign($val1, $val2, $val3)
    {
        $this->model->assign($val1, $val2, $val3);
    }

    public function task()
    {
        include './app/views/pages/taskPage.php';
    }

    public function submitProcessing($submitId, $resultInText)
    {
        $this->model->submitProcessing_($submitId, $resultInText);
        // echo 'Submit processding: ' . $resultInText . ', ' . $assignerId;
    }

    public function approve($submit_id, $_taskId_)
    {
        $this->model->approve_($submit_id, $_taskId_);
    }

    public function reject($submit_id, $_taskId_)
    {
        $this->model->reject_($submit_id, $_taskId_);
    }
    public function updateDepartment($id, $newDepartmentName, $newHeadName, $newNotes) {
        $this->model->updateDepartment_($id, $newDepartmentName, $newHeadName, $newNotes);
    }
}
