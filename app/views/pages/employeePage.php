<?php
session_start();
$myModel = new UserModel();

if ($_SESSION["employee_current_id"] < 0) $_SESSION["employee_current_id"] = -1;


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

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
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
    </style>
</head>

<body>
    <?php require './app/views/components/navbar_employee.php' ?>

    <h1>Employee page</h1>

    <button class="open-button" onclick="openForm()">Open Form</button>

    <div class="form-popup" id="myForm">
        <!-- <form action="/action_page.php" class="form-container"> -->
        <h1>Form submit</h1>
        <!-- <label for="email"><b>List tasks</b></label>
            <input type="text" placeholder="Enter Email" name="email" required> -->

        <form action="index.php" method="POST">
            <input type="hidden" name="formSubmit" value="-1">
            <input type="text" name="resultFromEmployee" value="result-in-text">
            <input type="submit">
        </form>

        <!-- <button type="submit" class="btn">Assign</button> -->
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        <!-- </form> -->
    </div>

    <div style="background-color: #ccc;">
        <h2>List tasks</h2>
    </div>
    <div style="background-color: #ccc;">
        <h2>Your tasks</h2>
    </div>
    <table>
        <tr>
            <th>Sender id</th>
            <th>Task id</th>
            <th>Take name</th>
            <th>Description</th>
            <th>Dealine</th>
            <th>Task status</th>
            <th>Result</th>
            <th>Submit id</th>
            <th>Submit btn</th>
        </tr>
        <?php
        $listTaskById = $myModel->getTasksReceiveByEmployeeId((int)$_SESSION['current_user_id']);
        for ($i = 0; $i < sizeof($listTaskById); $i++) {
            echo '<tr>';
            echo '<td>' . $listTaskById[$i]['sender_id'] . '</td>';
            echo '<td>' . $listTaskById[$i]['task_id'] . '</td>';
            echo '<td>' . $listTaskById[$i]['name'] . '</td>';
            echo '<td>' . $listTaskById[$i]['description'] . '</td>';
            echo '<td>' . $listTaskById[$i]['deadline'] . '</td>';
            echo '<td>' . $listTaskById[$i]['task_status'] . '</td>';
            echo '<td>' . $listTaskById[$i]['result'] . '</td>';
            echo '<td>' . $listTaskById[$i]['submit_id'] . '</td>';
            echo '<td>';
            echo '    <form action="index.php" method="POST">
        <input type="hidden" name="formPopupSubmit" value="-1">
        <input type="hidden" name="submit_current__id" value="' . $listTaskById[$i]['submit_id'] . '">
        <input type="hidden" name="assigner_current__id" value="' . $listTaskById[$i]['sender_id'] . '">
        <input type="submit" value="submit to assigner">
    </form>';
            echo '</td>';
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