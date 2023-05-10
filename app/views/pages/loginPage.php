<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* body {
            background-repeat: no-repeat;
            background-image: url("Login_Background.jpg");
            background-size: cover;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        .login {
            background-color: #fff;
            margin: auto;
            margin-top: 150px;
            width: 50%;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #888888;
            text-align: center;
        }

        h1 {
            margin-top: 20px;
            padding-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            width: 100%;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            border: none;
            width: 100%;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        } */

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;

            background-repeat: no-repeat;
            background-image: url('public/img/Login_Background.jpg');
            background-size: cover;
            background-attachment: fixed;
        }

        .form-box {
            position: relative;
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;

        }

        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
        }

        .inputbox {
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
            transition: .5s;
        }

        input:focus~label,
        input:valid~label {
            top: -5px;
        }

        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        .inputbox ion-icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }

        button {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            background: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php require './app/views/components/navbar.php' ?>
    <!-- <div class="login">
        <h1>Login</h1>
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
    </div> -->

    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="username" id="username" name="username" required>
                        <label for="username_com">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" required>
                        <label for="password_com">Password</label>
                    </div>
                    <button type="submit" name="login_submit" id="login_submit">Login</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>