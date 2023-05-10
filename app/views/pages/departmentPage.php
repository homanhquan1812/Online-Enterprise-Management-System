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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Deparment head homepage</title>
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
            display: block;
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

        /* table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        } */

        /* tr:nth-child(even) {
            background-color: #dddddd;
        } */
        .my-width-des-cell {
            max-width: 400px;
        }


        .container {
            margin-right: 0;
            margin-left: 0;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-repeat: no-repeat;
            background-image: url("Background.jpg");
            background-size: cover;
            background-attachment: fixed;
        }

        .dropbtn {
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        #box {
            display: absolute;
            height: 600px;
            width: 55%;
            backdrop-filter: blur(15px);
            justify-content: center;
            align-items: center;
            margin: auto;
            margin-top: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background: #dbddf0a6;
            box-sizing: border-box;
            overflow: hidden;
            box-shadow: 0 20px 50px rgb(23, 32, 90);
            border: 2px solid #2a3cad;
            overflow: auto;
        }

        #box::-webkit-scrollbar {
            background-color: transparent;
            width: 0.5em;
        }

        #box::-webkit-scrollbar-thumb {
            background-color: transparent;
        }

        .information {
            font-size: 30px;
            color: black;
            margin-top: 50px;
        }

        p {
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 20px;
            text-align: justify;
            font-size: 25px;
        }

        .information li {
            padding-left: 40px;
            padding-right: 20px;
            padding-top: 20px;
            text-align: justify;
            font-size: 20px;
        }

        h2 {

            padding-top: 50px;
            /* padding-bottom: 20px;
            text-align: center;
            font-size: 30px; */
        }

        /*
.employee_tasks section {
    text-decoration: none;
    border: 0;
    margin-left: 10%;
    margin-right: 10%;
    font-family: --font-stack;
    height: 370px;
    width: 30%;
    text-align: justify;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    background-color: whitesmoke;
    box-shadow: 0 20px 50px rgb(23, 32, 90);
    border: 2px solid #2a3cad;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    &.left {
        float: left;
    }
    &.right {
        float: right;
    }
}
*/

        .employee_tasks {
            text-decoration: none;
            border: 0;
            margin-left: 10%;
            margin-right: 10%;
            font-family: --font-stack;
            height: 600px;
            width: 80%;
            text-align: justify;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
            background-color: whitesmoke;
            box-shadow: 0 20px 50px rgb(23, 32, 90);
            border: 2px solid #2a3cad;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .employee_tasks .button_to_do {
            margin-left: 250px;
        }

        .task_number_decoration {
            margin: -10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-weight: 700;
            height: 50px;
            background-color: yellow;
        }

        .task_number_information {
            padding-top: 10px;
            font-size: 25px;
        }

        .button_to_do {
            margin-top: 140px;
            margin-left: 42px;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 17px;
            text-align: center;
            background-color: gainsboro;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .redo_tasks {
            text-decoration: none;
            border: 0;
            margin-left: 10%;
            margin-right: 10%;
            font-family: --font-stack;
            height: 600px;
            width: 80%;
            text-align: justify;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 10px;
            background-color: whitesmoke;
            box-shadow: 0 20px 50px rgb(23, 32, 90);
            border: 2px solid #2a3cad;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .redo_tasks .button_to_do {
            margin-left: 205px;
        }

        li .dropdown-content {
            min-width: 300px;
        }

        /* POP UP */
        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.8);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .wrapper {
            margin: 70px auto;
            padding: 20px;
            background: #e7e7e7;
            border-radius: 5px;
            width: 70%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .wrapper h2 {
            margin-top: 0;
            color: #333;
        }

        .wrapper .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .wrapper .close:hover {
            color: #06D85F;
        }

        .wrapper .content {
            max-height: 30%;
            overflow: auto;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        table,
        th,
        td {
            place-items: center;
            min-height: 200px;
            border: 5px solid;
            padding: 1rem;
        }

        .wrapper {
            max-height: 600px;
            /* or any other value you prefer */
            overflow-y: auto;
        }

        .wrapper::-webkit-scrollbar {
            background-color: transparent;
            width: 0.5em;
        }

        .wrapper::-webkit-scrollbar-thumb {
            background-color: transparent;
        }
    </style>
</head>

<body>
    <?php require './app/views/components/navbar_head.php' ?>

    <!-- <h1>Department head page</h1> -->

    <!-- <button class="open-button" onclick="openForm()">Open Form</button> -->

    <!-- <div style="background-color: #04AA6D;">
        <h2>List tasks</h2>
    </div> -->
    <h2>List of tasks</h2>

    <button class="btn btn-primary">Add new task</button>
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
            echo '<td><button class="btn btn-primary">Update task</button></td>';
            echo '<td><button class="btn btn-danger">Remove task</button></td>';
            echo '</tr>';
        }
        ?>
    </table>


    <!-- <div style="background-color: #ccc;">
        <h2>List to review</h2>
    </div> -->
    <h2>Tasks to review</h2>
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
        $listTaskById = $myModel->getTasksReceiveByEmployeeId((int)$_SESSION['current_user_id']);
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
                    <button type="submit" class="btn btn-success">Approve</button>
                </form></td>';
            echo '<td><form action="index.php" method="POST">
                    <input type="hidden" name="rejectForm" value="-1">
                    <input type="hidden" name = "rejectValue" value="' . $listTaskById[$i]['submit_id'] . '">
                    <input type="hidden" name = "_taskId" value="' . $listTaskById[$i]['task_id'] . '">
                    <button type="submit" class="btn btn-danger">Reject</button>

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

    <h2>List of employees</h2>

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
                <button type="button" class="btn btn-primary" onclick="assignPopupFormFunction(' . $userList[$i]['employee_id'] . ')">Assign</button>

            </form></div></td>';

                echo '<td><button type="button" class="btn btn-success">Upgrade</button></td>';
                echo '</tr>';
            }
            ?>
        </table>
        <!-- <form action="index.php" method="POST">
            <input type="text" name='formAssign' value="-1">
            <input type="text" name='assignerId' value="-1">
            <input type="text" name='taskId' value="-1">
            <input type="text" name='employeeId' value="-1">
            <input type="submit">
        </form> -->

    </div>


    <!-- <form action="index.php" method="POST" id="form1">
        <input type="button" value="popup assign task" onclick="assignPopupFormFunction(123)">
    </form>

    <form action="index.php" method="POST" id="form1">
        <input type="button" value="popup assign task" onclick="assignPopupFormFunction(456)">
    </form> -->

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

    <h2>Employee in your department</h2>

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
    </script>


</body>

</html>