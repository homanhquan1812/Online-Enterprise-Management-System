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
            $sql = 'SELECT * FROM Director d WHERE d.email = "' . $username . '" AND d.password = "' . $password . '"';
            $result = $this->conn->query($sql);

            if ($result->num_rows) {
                $_SESSION['username'] = $username;
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function getUserList()
    {
        $sql = 'SELECT * FROM Employee';
        $result = $this->conn->query($sql);
        $userList = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $userList;
    }

    public function assign($val1, $val2, $val3){
        echo "Val1: " . $val1 . '</br>';
        echo "Val2: " . $val2 . '</br>';
        echo "Val3: " . $val3 . '</br>';
    }
}
