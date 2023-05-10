<?php
session_start();
?>

<div style="background-color: #ccc;">
    <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=home">Home</a>
    <?php
    echo '<a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=' . $_SESSION['loginBtn'] . '">' . $_SESSION['loginBtn'] . '</a>';
    ?>
    <!-- <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=logout">Logout</a> -->
    <!-- <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=dashboard">Dashboard page</a> -->
    <!-- <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=task">List tasks</a> -->
    <!-- <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=admin">Director page</a> -->
    <!-- <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=department">Department header page</a> -->
    <!-- <a style="border: 1px solid black;" href="http://localhost:8888/Assignment/index.php?page=employee">Employee page</a> -->
    <!-- <div style="border: 1px solid black; display: inline-block" class="which-user"><?php echo 'Welcome: ' . $_SESSION['username'] . ', userId: ' . $_SESSION['current_user_id'] ?></div> -->
    <!-- <div style="border: 1px solid black; display: inline-block" class="which-user"><?php echo 'You are choosing: ' . $_SESSION["employee_current_id"] ?></div> -->
    
</div>