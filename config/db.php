<?php
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "web_programming_assignment";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected successfully";

class db
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->dbname = "enterpriseDB";

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) die("Connection failed: " . $this->conn->connect_error);
    }

    // public function createdb()
    // {
    //     $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    //     if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    //     return $conn;
    // }

    public function getConn(){
        return $this->conn;
    }

    public function closeConn(){
        $this->conn->close();
    }
}
