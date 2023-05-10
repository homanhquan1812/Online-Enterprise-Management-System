<?php
session_start();
$myModel = new UserModel();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
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

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
        .my-width-des-cell {
            max-width: 400px;
        }

        .de-container {
            display: none;
            position: fixed;
            top: 300px;
            left: 600px;
            background-color: #ccc;
            width: 300px;
        }
    </style>
</head>

<body>
    <?php require './app/views/components/navbar_admin.php' ?>
    <h1>Admin page</h1>

    <!-- <button class="open-button" onclick="openForm()">Open Form</button> -->
    <!-- TODO: -->
    <div style="background-color: #ccc;">
        <h2>List Departments</h2>
    </div>
    <button style="border: 1px solid black">_Add new department</button>

    <!-- <form>
        <input type="button" value="Update department" onclick="showUpdatePopup(1)">
    </form> -->


    <!-- <form action="index.php" method="POST" id="form002">
        <input type="text" name="showPopupByPost" value="thisisvalue">
        <input type="text" name="id" value="2">
        <input type="submit">
    </form>


    <select id="cars_2">
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="vw" selected="selected">VW</option>
        <option value="audi">Audi</option>
    </select> -->

    <table>
        <tr>
            <th>No</th>
            <th>Department name</th>
            <th>Department head</th>
            <th>Notes</th>
            <th>Update</th>
            <th>Remove</th>
        </tr>
        <?php
        $departments = $myModel->getDepartments();

        for ($i = 0; $i < sizeof($departments); $i++) {
            echo '<tr>';
            echo '<td>' . $departments[$i]['department_id'] . '</td>';
            echo '<td>' . $departments[$i]['name'] . '</td>';
            $headName = $myModel->getDepartmentHeadByDepartmentId($departments[$i]['department_id']);
            echo '<td>' . $headName[0]['name'] . '</td>';
            echo '<td>...</td>';
            // echo "<td><button onclick="pop_Up_Department("" . $departments[$i]['name'] . '", "' .  $headName[0]['name'] . '", 123)">This is button oke</button></td>";
            // echo '<td><button onclick="pop_Up_Department("" . ';
            // echo $departments[$i]['name'] . '", "' . $headName[0]['name'] . '"st, 123';
            // echo ')">This is button oke</button></td>';

            $temp1 = "$departments[$i]['name']";
            // echo '<td><button onclick="pop_Up_Department(\\"' . $departments[$i]['name'] . '\\", 123, 123)">This is button oke</button></td>';
            echo '<td><button onclick="pop_Up_Department(\'' . $departments[$i]['department_id'] .  '\', \'' . $departments[$i]["name"] . '\', \'' .  $headName[0]["name"] . '\', 123)">This is button oke</button></td>';

            echo '<td><button>Remove department</button></td>';
            echo '</tr>';
        }
        ?>
    </table>


    <!-- TODO: -->
    <div style="background-color: #ccc;">
        <h2>List tasks</h2>
    </div>
    <button style="border: 1px solid black">Add new task</button>
    <table>
        <tr>
            <th>No</th>
            <th>Task name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Date assign</th>
            <th>Date submit</th>
            <th>Update</th>
            <th>Remove</th>
        </tr>
        <?php
        $taskList = $myModel->getAllTasks();
        for ($i = 0; $i < sizeof($taskList); $i++) {
            echo '<tr>';
            echo '<td>' . $taskList[$i]['task_id'] . '</td>';
            echo '<td>' . $taskList[$i]['name'] . '</td>';
            echo '<td>' . $taskList[$i]['description'] . '</td>';
            echo '<td>' . $taskList[$i]['status'] . '</td>';
            echo '<td>' . $taskList[$i]['deadline'] . '</td>';
            echo '<td>../../2024</td>';
            echo '<td>../../2024</td>';
            echo '<td><button style="border: 1px solid black">Update task</button></td>';
            echo '<td><button style="border: 1px solid black">Remove task</button></td>';
            echo '</tr>';
        }
        ?>
    </table>


    <div style="background-color: #ccc;">
        <h2>List to review</h2>
    </div>

    <table>
        <tr>
            <th>#</th>
            <th colspan="3">Admin information</th>
            <th colspan="2">Deadline</th>
            <th colspan="4">Employee information</th>
            <th colspan="2">Modify</th>
        </tr>
        <tr>
            <th>No</th>
            <th>Task name</th>
            <th>Description when sending</th>
            <th>Date sending</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Receiver</th>
            <th>Description when submit</th>
            <th>Date submit</th>
            <th>Result</th>
            <th>Approve btn</th>
            <th>Reject btn</th>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($listTaskById); $i++) {
            $j = $i + 1;
            echo '<tr>';
            echo '<td>' . $j . '</td>';
            echo '<td>' . $listTaskById[$i]['sender_id'] . '</td>';
            echo '<td>' . $listTaskById[$i]['sender_id'] . '</td>';
            echo '<td>' . $listTaskById[$i]['task_id'] . '</td>';
            echo '<td>' . $listTaskById[$i]['name'] . '</td>';
            echo '<td class="my-width-des-cell">' . $listTaskById[$i]['description'] . '</td>';
            echo '<td>' . $listTaskById[$i]['deadline'] . '</td>';
            echo '<td>' . $listTaskById[$i]['task_status'] . '</td>';
            echo '<td>' . $listTaskById[$i]['result'] . '</td>';
            echo '<td>' . $listTaskById[$i]['submit_id'] . '</td>';
            echo '<td><form action="index.php" method="POST">
                    <input type="hidden" name="approveForm" value="-1">
                    <input type="hidden" name = "approveValue" value="' . $listTaskById[$i]['submit_id'] . '">
                    <input type="hidden" name = "_taskId" value="' . $listTaskById[$i]['task_id'] . '">
                    <input type="submit" value="Approve">
                </form></td>';
            echo '<td><form action="index.php" method="POST">
                    <input type="hidden" name="rejectForm" value="-1">
                    <input type="hidden" name = "rejectValue" value="' . $listTaskById[$i]['submit_id'] . '">
                    <input type="hidden" name = "_taskId" value="' . $listTaskById[$i]['task_id'] . '">
                    <input type="submit" value="Reject">
                </form></td>';
            echo '</tr>';
            // echo $listTaskById[$i]['task_id'] . '</br>' .
            //     $listTaskById[$i]['name'] . '</br>' .
            //     $listTaskById[$i]['description'] . '</br>' .
            //     $listTaskById[$i]['deadline'] . '</br>' .
            //     $listTaskById[$i]['status'] . '</br>';
            // echo '<button>Submit to assigner</button>';
        }
        ?>
    </table>

    <div style="background-color: #ccc;">
        <h2>List employees</h2>
    </div>

    </br>
    <div style="background-color: #F6FAFE; color: #418CFC">
        <table>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Account</th>
                <th>Password</th>
                <th>Role</th>
                <th>Level</th>
                <th>Department</th>
                <th>Tasks</th>
                <th>Assign</th>
                <th>Appoint to head</th>
            </tr>
            <?php
            $userList = $myModel->getUserList();
            for ($i = 0; $i < sizeof($userList); $i++) {
                echo '<tr>';
                echo '<td>' . $userList[$i]['employee_id'] . '</td>';
                echo '<td>' . $userList[$i]['name'] . '</td>';
                echo '<td>' . $userList[$i]['username'] . '</td>';
                echo '<td>' . str_repeat('*', strlen($userList[$i]['password'])) . '</td>';
                $myRole = 'Employee';
                if ($userList[$i]['level'] == -1) $myRole = 'Head';
                echo '<td>' . $myRole . '</td>';
                $tempLevel = '';
                if ($userList[$i]['level'] > 0)  $tempLevel = $userList[$i]['level'];
                echo '<td>' . $tempLevel . '</td>';
                $departmentname = $myModel->getDepartmentNameById((int)$userList[$i]['department_id']);
                echo '<td>' . $departmentname[0]['name'] . '</td>';

                echo '<td>';
                $tempName = $myModel->getTaskByEmployeeId($userList[$i]['employee_id']);
                for ($j = 0; $j < sizeof($tempName); $j++) {
                    echo $tempName[$j]['name'] . ', ';
                }
                echo '</td>';
                //     echo '<td><div style="display: inline-block; width: 100px">
                //     <form action="index.php" method="POST">
                //         <input type="hidden" name="formPopup" value="-1">
                //         <input type="hidden" name="current__Id" value=" ' . $userList[$i]['employee_id'] . '">
                //         <input type="submit" value="popup assign task">
                // </form></div></td>';
                echo '<td><div style="display: inline-block; width: 100px">
                <form>
                <input type="button" value="popup assign task" onclick="assignPopupFormFunction(' . $userList[$i]['employee_id'] . ')">
            </form></div></td>';
                echo '<td><button>Upgrade</button></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>

    <div class="form-popup" id="myForm" style="background-color: #ccc;">
        <h1>List tasks</h1>
        <ul>
            <?php
            echo '<div style="display: block;" id="tester">Id: ' . $_SESSION["employee_current_id"] . '</div>';
            echo 'Name: ' . $userList[(int)$_SESSION["employee_current_id"]]['name'];
            for ($i = 0; $i < sizeof($tasksNotCompleted); $i++) {
                echo '<li>Task name: ' . $tasksNotCompleted[$i]['name'] . ', status: ' . $tasksNotCompleted[$i]['status'] . ', ' . '<button">Assign<button>View task infor</button></li>';
                echo '
                <form action="index.php" method="POST">
                    <input type="hidden" name="formAssign" value="-1">
                    <input type="hidden" name="assignerId" value="' . $_SESSION['current_user_id'] . '">
                    <input type="hidden" name="taskId" value="' . $tasksNotCompleted[$i]['task_id'] . '">
                    <input type="hidden" name="employeeId" value="' . $_SESSION["employee_current_id"] . '">
                    <input type="submit">
                </form> 
                ';
                echo '</br>';
            }
            ?>
        </ul>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </div>

    <div class="de-container" id="form001">
        <form action="index.php" method="POST">
            <h3>Update department</h3>
            <input type="hidden" id="form001_id" name="fixId">
            <input type="text" id="form001_name" name="newDepartmentName">
            <input type="text" id="form001_head" value="0" name="oldDepartmentHeadName">
            <select name="newHeadName" id="cars">
                <?php
                $list = $myModel->getEmloyees();
                for ($i = 0; $i < sizeof($list); $i++) {
                    echo '<option value="' . $list[$i]['name'] . '">' . $list[$i]['name'] . '</option>';
                }
                ?>
            </select>
            <input type="text" id="form001_notes" name="newNotes">
            <input type="hidden" name="formUpdateDepartment" value="-1">
            <input type="submit">
        </form>
    </div>


    <script>
        function assignTaskFunction(userId, taskId) {
            console.log('UserId and taskId: ', userId, taskId)
        }

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function assignPopupFormFunction(input_id) {
            $.ajax({
                url: "index.php",
                type: "POST",
                data: {
                    assignPopupForm: "assignPopupForm",
                    id: input_id
                },
                success: function(response) {}
            });
            document.getElementById("myForm").style.display = "block";
        }

        function showUpdatePopup(input_id) {
            // $.ajax({
            //     url: "index.php",
            //     type: "POST",
            //     data: {
            //         showPopup: "showPopup",
            //         id: input_id
            //     },
            //     success: function(response) {}
            // });
            document.getElementById("form001").style.display = "block";
            // location.reload();
        }

        function pop_Up_Department(id, name, head, notes) {
            document.getElementById("form001_id").value = id;
            document.getElementById("form001_name").value = name;
            document.getElementById("form001_head").value = head;
            document.getElementById("form001_notes").value = notes;
            document.getElementById("form001").style.display = "block";
        }
    </script>


</body>

</html>