<?php
session_start();
include './config/db.php';

class UserModel
{
    private $conn;
    public function __construct()
    {
        $db = new db();
        // $this->conn = $db->createdb();
        $this->conn = $db->getConn();
    }

    public function login()
    {
        if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];

            if ($username == 'admin' && $password == 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['current_user_id'] = -1;
                // echo 'Current id (admin): ' . $_SESSION['current_user_id'];
                return true;
            }
            // if ($username == 'employee' && $password == 'employee') {
            //     $_SESSION['username'] = $username;
            //     $_SESSION['current_user_id'] = 2;
            //     return true;
            // }
            $sql = 'SELECT * FROM employee e WHERE e.username = "' . $username . '" AND e.password = "' . $password . '"';
            $result = $this->conn->query($sql);

            if ($result->num_rows) {
                $_SESSION['username'] = $username;
                $userId = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $_SESSION['current_user_id'] = $userId[0]['employee_id'];
                return true;
            } else {
                return false;
            }
            return false;
        }
        return false;
    }

    public function getRole()
    {
        if ($_SESSION['current_user_id'] == -1) return 'admin';
        else {
            $sql = 'SELECT * FROM employee e WHERE e.employee_id = ' . $_SESSION['current_user_id'];
            // echo $sql;
            $result = $this->conn->query($sql);
            $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if ($result->num_rows) return $res[0]['role'];
            return 'Fault role';
        }
    }

    public function getUserList()
    {
        $sql = 'SELECT * FROM Employee';
        $result = $this->conn->query($sql);
        $userList = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $userList;
    }

    public function checkRole($employeeId)
    {
        if ($_SESSION['current_user_id'] == -1) return true;                // Admin using system
        else {
            $role_current_user = 'Head';
            $level_current_user = -1;

            $role_employee = 'Head';
            $level_employee = -1;

            if ($role_current_user == $role_employee) return false;         // The same head cant appoint together
            else if ($role_current_user == 'Head') return true;             // current is head,
            else if ($level_current_user > $level_employee) return true;    // level current > level employee
        }
    }

    public function assign($assignerId, $taskId, $employeeId)
    {
        // Mission 1: Check role is suitable or not
        if ($this->checkRole($employeeId) == false) return false;

        // Mission 2: Assign task to employee
        $sql = "INSERT INTO assignment (submit_id, sender_id, des_when_sending, date_sending, task_id, task_status, receiver_id, des_when_submit, date_submit, result)
        VALUES (NULL, -1, 'Bro, help me this task, ty', '20/11/24', " . $taskId . ", 'Sending', " . $employeeId . ", NULL, NULL, NULL)";
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when assigning_1';

        // Mission 3: Change status from Available to Doing in table TASK
        $sql = "UPDATE task t SET t.status = 'Doing' WHERE t.task_id = " . $taskId;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when assigning_2';

        return true;
    }

    public function getTasksNotCompleted()
    {
        $sql = 'SELECT * FROM task WHERE task.status = "Available"';
        $result = $this->conn->query($sql);
        $taskList = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $taskList;
    }

    public function getAllTasks()
    {
        $sql = 'SELECT * FROM task';
        $result = $this->conn->query($sql);
        $taskList = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $taskList;
    }

    // public function getTaskList()
    // {
    //     $sql = 'SELECT * FROM task';
    //     $result = $this->conn->query($sql);
    //     $taskList = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //     return $taskList;
    // }

    public function getAssignmentList()
    {
        $sql = 'SELECT * FROM assignment';
        $result = $this->conn->query($sql);
        $assignmentList = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignmentList;
    }

    public function getTaskByEmployeeId($employeeId)
    {
        $sql = 'SELECT task.name FROM task INNER JOIN assignment ON task.task_id = assignment.task_id WHERE assignment.receiver_id =  "' . $employeeId . '"';
        // echo 'sql: ', $sql;
        $result = $this->conn->query($sql);
        $taskNamePrivate = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $taskNamePrivate;
    }

    public function AssignTask($assignerId, $taskId, $employeeId)
    {
        return 'assigning';
    }

    public function getTaskById()
    {
    }

    public function getTasksReceiveByEmployeeId($employeeId)
    {
        // $sql = 'SELECT * FROM task INNER JOIN assignment ON assignment.task_id = task.task_id WHERE assignment.receiver_id = ' . $employeeId;
        $sql = 'SELECT * FROM task INNER JOIN assignment ON assignment.task_id = task.task_id WHERE assignment.receiver_id = ' . $employeeId . ' AND assignment.task_status = "Sending"';
        // echo 'result: ' . $sql;
        $result = $this->conn->query($sql);
        $listTask = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $listTask;
    }
    public function getTaskResultByAdminId($adminId)
    {
        $sql = 'SELECT * FROM task INNER JOIN assignment ON assignment.task_id = task.task_id WHERE assignment.sender_id = ' . $adminId . ' AND assignment.task_status = "Submit"';
        // echo $sql;
        $result = $this->conn->query($sql);
        $listTask = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $listTask;
    }

    public function submitProcessing_($submitId, $resultInText)
    {
        $sql = "UPDATE assignment asm
        SET asm.task_status = 'Submit', asm.result = '" . $resultInText . "' WHERE asm.submit_id = " . $submitId;
        // echo $sql;  
        $result = $this->conn->query($sql);
        // return $result;
        if ($result === TRUE) {
            echo "Update oke";
        } else {
            echo 'fault when updating';
        }
    }

    public function approve_($submit_id, $_taskId_)
    {
        // Mission 1: update table Assignment
        $sql = "UPDATE assignment asm SET asm.task_status = 'Approve' WHERE asm.submit_id = " . $submit_id;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when updating_3';

        // Mission 2: update table Task
        $sql = "UPDATE task t SET t.status = 'Done' WHERE t.task_id = " . $_taskId_;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when updating_4';
    }

    public function reject_($submit_id, $_taskId_)
    {
        $sql = "UPDATE assignment asm SET asm.task_status = 'Reject' WHERE asm.submit_id = " . $submit_id;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when updating_5';

        // Mission 2: update table Task
        $sql = "UPDATE task t SET t.status = 'Available' WHERE t.task_id = " . $_taskId_;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when updating_6';
    }

    public function getDepartmentNameById($id)
    {
        $sql = 'SELECT d.name FROM department d WHERE d.department_id = ' . $id;
        $result = $this->conn->query($sql);
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $res;
    }

    public function getDepartmentHeadByDepartmentId($id)
    {
        $sql = 'SELECT e.name FROM employee e WHERE e.role = "head" AND e.department_id = ' . $id;
        $result = $this->conn->query($sql);
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $res;
    }

    public function getDepartments()
    {
        $sql = 'SELECT * FROM department';
        $result = $this->conn->query($sql);
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $res;
    }

    public function getEmloyees()
    {
        $sql = 'SELECT * FROM employee';
        $result = $this->conn->query($sql);
        $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $res;
    }
    public function updateDepartment_($id, $newDepartmentName, $newHeadName, $newNotes)
    {
        $sql = "UPDATE department d SET d.name ='" . $newDepartmentName . "' WHERE d.department_id = " . $id;
        // echo $sql;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when updating_7';

        $sql = "UPDATE employee e SET e.role = 'head', e.department_id = " . $id . " WHERE e.name = '" . $newHeadName . "'";
        echo $sql;
        $result = $this->conn->query($sql);
        if ($result !== TRUE) echo 'Fault when updating_8';
    }
}
