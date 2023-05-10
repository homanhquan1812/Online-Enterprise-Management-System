<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        .tab {
            display: flex;
            justify-content: center;
            margin-bottom: 1rem;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: #f1f1f1;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #0f52ba;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #0f52ba;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        /* Show the specific tab content */
        .tabcontent.show {
            display: block;
        }

        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        .form-container input[type=text],
        .form-container input[type=password],
        .form-container input[type=email],
        .form-container input[type=number] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus,
        .form-container input[type=email]:focus,
        .form-container input[type=number]:focus {
            background-color: #ddd;
            outline: none;
        }

        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover,
        .open-button:hover {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="tab">
        <button class="tablinks active" onclick="openTab(event, 'employees')">Employees</button>
        <button class="tablinks" onclick="openTab(event, 'departments')">Departments</button>
        <button class="tablinks" onclick="openTab(event, 'tasks')">Tasks</button>
    </div>

    <div id="employees" class="tabcontent show">
        <h3>Employees</h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "web_programming_assignment";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM employee";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Employee ID: " . $row['employee_id'] . "<br>";
                echo "Name: " . $row['name'] . "<br>";
                echo "Email: " . $row['email'] . "<br>";
                echo "Password: " . $row['password'] . "<br>";
                echo "Level: " . $row['level'] . "<br>";
                echo "Department ID: " . $row['department_id'] . "<br><br>";
            }   
        } else {
            echo "No employees found.";
        }
        $conn->close();
        ?>
    </div>

    <div id="departments" class="tabcontent">
        <h3>Departments</h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "web_programming_assignment";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM department";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Department ID: " . $row['department_id'] . "<br>";
                echo "Name: " . $row['department_name'] . "<br>";
            }
        } else {
            echo "No department found.";
        }
        $conn->close();
        ?>
    </div>

    <div id="tasks" class="tabcontent">
        <h3>Tasks</h3>
        <p>List of Tasks</p>
    </div>
    <button onclick="openForm()">Add Employee</button>

    <!-- HTML code for the popup -->
    <div class="form-popup" id="myForm">
        <form action="../../backend/database/create_employee.php" method="POST" class="form-container">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <label for="level">Level:</label>
            <!-- <input type="number" name="level" min="1" max="4" required><br> -->
            <select name="level" id="cars">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <!-- <label for="department_id">Department ID:</label>
            <input type="number" name="department_id" required><br> -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "web_programming_assignment";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT department_id, department_name FROM department";
            $result = $conn->query($sql);
            if ($result) {
            ?>
                <label for="department_id">Department:</label>
                <select name="department_id" id="department_id" required>
                    <option value="">Select a Department</option>
                    <?php
                    // Loop through the result set and display options
                    while ($row = $result->fetch_assoc()) {
                        $department_id = $row["department_id"];
                        $department_name = $row["department_name"];
                        echo "<option value='$department_id'>$department_name</option>";
                    }
                    ?>
                </select>
            <?php
                // Free result set
                $result->free_result();
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
            $conn->close();
            ?>
            <button type="submit">Create Employee</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("show");
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).classList.add("show");
            evt.currentTarget.classList.add("active");
        }
    </script>
</body>

</html>