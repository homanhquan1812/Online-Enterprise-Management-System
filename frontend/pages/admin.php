<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!-- <!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

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

        .form-container .select_deparment {
            margin-bottom: 10px;
        }
    </style>
    <!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
        <div class="p-3">
            Xin chào admin
        </div>
    </nav>
    <div class="modal" id="employeeCreatedModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Employee Created</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>A new employee has been created successfully.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="tab">
        <button class="tablinks active" onclick="openTab(event, 'employees')">Employees</button>
        <button class="tablinks" onclick="openTab(event, 'departments')">Departments</button>
        <button class="tablinks" onclick="openTab(event, 'tasks')">Tasks</button>
    </div>
    <div id="employees" class="tabcontent show">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Level</th>
                    <th scope="col">Department</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "enterpriseDB";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM employee";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <th scope="row">' . $row['employee_id'] . '</th>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['username'] . '</td>
                            <td>' . $row['password'] . '</td>
                            <td>' . $row['level'] . '</td>
                            <td>' . $row['department_id'] . '</td>
                            <td>
                            <button type="button" class="btn btn-primary">EDIT</button>
                            </td>
                            <td>
                            <button type="button" class="btn btn-danger">DELETE</button>
                            </td>
                        </tr>';
                    }
                } else {
                    echo "No employees found.";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div id="departments" class="tabcontent">
        <h3>Departments</h3>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "enterpriseDB";

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
                echo "Name: " . $row['name'] . "<br>";
            }
        } else {
            echo "No department found.";
        }
        $conn->close();
        ?>
    </div>

    <div id="tasks" class="tabcontent">
        <h3>Tasks</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "enterpriseDB";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM task";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <th scope="row">' . $row['task_id'] . '</th>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['description'] . '</td>
                            <td>' . $row['deadline'] . '</td>
                            <td>' . $row['status'] . '</td>
                        </tr>';
                    }
                } else {
                    echo "No employees found.";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <button onclick="openForm()" class="btn btn-primary">Add Employee</button>

    <!-- HTML code for the popup -->
    <div class="form-popup" id="myForm">
        <form action="../../backend/database/create_employee.php" method="POST" class="form-container">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <label for="level">Level:</label>
            <!-- <input type="number" name="level" min="1" max="4" required><br> -->
            <select name="level" id="level">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <br>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "enterpriseDB";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT department_id, name FROM department";
            $result = $conn->query($sql);
            if ($result) {
            ?>
                <label for="department_id">Department:</label>
                <select name="department_id" class="select_deparment" id="department_id" required>
                    <option value="">Select a Department</option>
                    <?php
                    // Loop through the result set and display options
                    while ($row = $result->fetch_assoc()) {
                        $department_id = $row["department_id"];
                        $department_name = $row["name"];
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
            <button type="submit" class="btn btn-primary">Create Employee</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <script>
        if (sessionStorage.getItem('employee_created') === 'true') {
            console.log("HERE");
            // $('#employeeCreatedModal').modal({
            //     show: false
            // })

            // Show the modal if the flag is set
            $('#employeeCreatedModal').modal('show');
            // Clear the 'employee_created' flag in sessionStorage
            sessionStorage.removeItem('employee_created');
        }
        console.log("THere");

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
    <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
</body>

</html>