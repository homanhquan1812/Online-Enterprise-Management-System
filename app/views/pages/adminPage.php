<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require './app/views/components/navbar.php' ?>

    <h1>Admin page</h1>
    <div style="background-color: #ccc;">
        <h2>List employees</h2>

    </div>

    <!-- <div style="background-color: #ccc;">
        <h2>List tasks</h2>
        <div>
            <h4>Task name, description, deadline, receiver name</h4>
            <div>Task 1, Requirement gathering, 20/11/2023, NO</div>
            <div>Task 2, Deployment, 21/22/2025, NO</div>
            <div>Task 3, Maintenance, 23/23/2332, NO</div>
            <div>Task 4, Testing, 43/12/1231, NO</div>
            <div>Task 5, Debugging, 12/34/2987, NO </div>
        </div>
    </div> -->

    </br>
    </br>

    <div style="background-color: #F6FAFE; color: #418CFC">
        <?php

        for ($i = 0; $i < sizeof($userList); $i++) {
            echo
            $userList[$i]['employee_id'] . ', ' .
                $userList[$i]['name'] . ', ' .
                $userList[$i]['username'] . ', ' .
                $userList[$i]['password'] . ', ' .
                $userList[$i]['level'] . ', ' .
                $userList[$i]['department_id'];
            
            echo '<button>Assign</button>';
            echo '</br>';
            // echo '
            //     <form action="./app/models/Assign.php" method="POST">
            //         <label for="task">Task </label>
            //         <input type="hidden" id="id_user" name="id_user" value = "1">
            //         <select name="task" id="task">
            //             <option value="task0">--</option>
            //             <option value="task1">Task1</option>
            //             <option value="task2" selected>Task2</option>
            //             <option value="task3">Task3</option>
            //             <option value="task4">Task4</option>
            //             <option value="task5">Task5</option>
            //         </select>
        
            //         <label for="position">Position </label>
            //         <select name="position" id="position">
            //             <option value="noposition">--</option>
            //             <option value="3">Director</option>
            //             <option value="2">Apartment header</option>
            //             <option value="1">Employee</option>
            //         </select>
            //         <input type="submit" value="Assign">
            //     </form> </br>
            //     ';
        }
        ?>
    </div>



</body>

</html>