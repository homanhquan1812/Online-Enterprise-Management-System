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
    
    <form action="" method="POST">
        <p>
            <label>Username</label>
            <input type="text" id="username" value="" name="username" required>
        </p>
        <p>
            <label>Password</label>
            <input type="text" id="password" value="" name="password" required>
        </p>
        <button type="submit"><span>Login</span></button>

    </form>
</body>

</html>