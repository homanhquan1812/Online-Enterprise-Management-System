<?php
session_start();
$myModel = new UserModel();




// if (isset($_POST["currentID"])) {
//     // echo $_POST["currentID"];
//     $_SESSION["employee_current_id"] = $_POST["currentID"];
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>

<body>
    <?php require './app/views/components/navbar.php' ?>

    <h1>Admin page</h1>

    <button class="open-button" onclick="openForm()">Open Form</button>

    <div class="form-popup" id="myForm">
        <!-- <form action="/action_page.php" class="form-container"> -->
        <h1>List tasks</h1>
        <!-- <label for="email"><b>List tasks</b></label>
            <input type="text" placeholder="Enter Email" name="email" required> -->

        <ul>
            <?php

            echo '<div style="display: block;" id="tester">Id: ' . $_SESSION["employee_current_id"] . '</div>';
            echo 'Name: ' . $userList[(int)$_SESSION["employee_current_id"]]['name'];

            for ($i = 0; $i < sizeof($taskList); $i++) {
                echo '<li>Task name: ' . $taskList[$i]['name'] . ', status: ' . $taskList[$i]['status'] . ', ' .'<button">Assign<button>View task infor</button></li>';
                echo '
                <form action="index.php" method="POST">
                    <input type="hidden" name="formAssign" value="-1">
                    <input type="hidden" name="assignerId" value="' . $_SESSION['current_user_id'] . '">
                    <input type="hidden" name="taskId" value="' . $taskList[$i]['task_id'] . '">
                    <input type="hidden" name="employeeId" value="' . $_SESSION["employee_current_id"] . '">
                    <input type="submit">
                </form> 
                ';
                echo '</br>';
            }
            ?>

        </ul>
        <!-- <button type="submit" class="btn">Assign</button> -->
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        <!-- </form> -->
    </div>

    <div style="background-color: #ccc;">
        <h2>List tasks</h2>
    </div>

    <div style="background-color: #ccc;">
        <h2>List to review</h2>
    </div>
    <?php
    for ($i = 0; $i < sizeof($listTaskById); $i++) {
        echo '<li>';
        echo '<div style="display: inline-block;">Sender id: ' . $listTaskById[$i]['sender_id'] . '<div>';
        echo '<div style="display: inline-block;">Task id: ' . $listTaskById[$i]['task_id'] . '<div>';
        echo '<div style="display: inline-block;">Task name: ' . $listTaskById[$i]['name'] . '<div>';
        echo '<div style="display: inline-block;">Task description: ' . $listTaskById[$i]['description'] . '<div>';
        echo '<div style="display: inline-block;">Deadline: ' . $listTaskById[$i]['deadline'] . '<div>';
        echo '<div style="display: inline-block;">Task status: ' . $listTaskById[$i]['task_status'] . '<div>';
        echo '<div style="display: inline-block;">Task result: ' . $listTaskById[$i]['result'] . '<div>';
        echo '<div style="display: inline-block;">Submit id: ' . $listTaskById[$i]['submit_id'] . '<div>';
        // echo '<button style="display: inline-block">Submit to assigner</button>';
        echo '    <form action="" method="POST">
        <input type="hidden" name="noname" value="-1">

        
        <input type="submit" value="approve">
        <button>Reject</button>
    </form>';
        echo '</li>';
        // echo $listTaskById[$i]['task_id'] . '</br>' .
        //     $listTaskById[$i]['name'] . '</br>' .
        //     $listTaskById[$i]['description'] . '</br>' .
        //     $listTaskById[$i]['deadline'] . '</br>' .
        //     $listTaskById[$i]['status'] . '</br>';
        // echo '<button>Submit to assigner</button>';
    }
    ?>


    <div style="background-color: #ccc;">
        <h2>List employees</h2>
    </div>

    </br>
    <div style="background-color: #F6FAFE; color: #418CFC">
        <ul>
            <?php
            function php_func($userId)
            {
                echo 'Userid: ' . $userId;
            }
            ?>

            <?php
            for ($i = 0; $i < sizeof($userList); $i++) {
                echo '<li>';
                echo '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">';
                $tempName = $myModel->getTaskByEmployeeId($userList[$i]['employee_id']);

                echo '<div style="display: inline-block; width: 50px">' . $userList[$i]['employee_id'] . '</div>';
                echo '<div style="display: inline-block; width: 120px">' . $userList[$i]['name'] . '</div>';
                echo '<div style="display: inline-block; width: 150px">' . $userList[$i]['username'] . '</div>';
                echo '<div style="display: inline-block; width: 150px">' . str_repeat('*', strlen($userList[$i]['password'])) . '</div>';
                echo '<div style="display: inline-block; width: 50px">' . $userList[$i]['level'] . '</div>';
                echo '<div style="display: inline-block; width: 50px">' . $userList[$i]['department_id'] . '</div>';
                echo '<div style="display: inline-block; width: 200px">';
                for ($j = 0; $j < sizeof($tempName); $j++) {
                    echo $tempName[$j]['name'] . ', ';
                }
                echo '</div>';

                // echo '<button>Assign</button>';
                // <button onClick = "AssignFunction(' . $userList[$i]['employee_id'] . ')">Assign</button>
                // echo '<div style="display: inline-block; width: 100px">
                //         <button onClick = "AssignFunction(' . $userList[$i]['employee_id'] . ')">Assign</button>
                //     </div>';

                echo '<div style="display: inline-block; width: 100px">
                    <form action="index.php" method="POST">
                        <input type="hidden" name="formPopup" value="-1">
                        <input type="hidden" name="current__Id" value=" ' . $userList[$i]['employee_id'] . '">
                        <input type="submit">
                </form></div>';

                // <button type="submit" value="' . $userList[$i]['employee_id'] . '" name="currentID">Assign_</button>
                echo '<div style="display: inline-block; width: 200px"><button>View employee infor</button></div>';
                echo '</li>';
            }
            ?>

        </ul>
        <!-- <form action="index.php" method="POST">
            <input type="text" name='formAssign' value="-1">
            <input type="text" name='assignerId' value="-1">
            <input type="text" name='taskId' value="-1">
            <input type="text" name='employeeId' value="-1">
            <input type="submit">
        </form> -->

    </div>

    <script>
        function assignTaskFunction(userId, taskId) {
            console.log('UserId and taskId: ', userId, taskId)
        }

        function AssignFunction(userId) {
            var result = '<?php php_func('userId'); ?>'
            console.log(result)
            // document.write(result);
            document.getElementById("myForm").style.display = "block";
        }

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>


</body>

</html>