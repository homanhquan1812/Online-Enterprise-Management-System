<?php
session_start();
include './app/models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function home(){
        include './app/views/pages/homePage.php'; 
    }

    public function login(){
        $loginSuccess = $this->model->login();
        if ($loginSuccess == true){
            include './app/views/pages/dashboard.php';
        } else {
            include './app/views/pages/loginPage.php';
        }
    }

    public function logout(){
        // session_destroy();
        $_SESSION['username'] = 'User';
        include './app/views/pages/homePage.php';
    }

    public function dashboard(){
        include './app/views/pages/dashboard.php';
    }

    public function admin(){
        $userList = $this->model->getUserList();
        include './app/views/pages/adminPage.php';
    }

    public function departmenthead(){
        include './app/views/pages/departmentHeadPage.php';
    }

    public function employee(){
        include './app/views/pages/employeePage.php';
    }

    public function error404(){
        require_once './app/views/pages/error404.php';
    }

    public function formAssign($val1, $val2, $val3){
        $this->model->assign($val1, $val2, $val3);
    }

    public function task() {
        include './app/views/pages/taskPage.php';
    }
}
