<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form method="POST" action="dh_db_connection.php">
                        <h2>Login</h2>
                        <div class="inputbox">
                            <ion-icon name="mail-outline"></ion-icon>
                            <input type="username" id="username_com" name="username_com" required>
                            <label for="username_com">Email</label>
                        </div>
                        <div class="inputbox">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                            <input type="password" id="password_com" name="password_com" required>
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