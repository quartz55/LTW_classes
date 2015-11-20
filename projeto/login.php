<?php
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <form action="action_login.php" method="post">
            <input type="text" name="username" placeholder="username">
            <br>
            <input type="password" name="password" placeholder="password">
            <br>
            <input type="submit" name="login_btn" value="Login">
            <input type="submit" name="cancel_btn" value="Cancel">
        </form>
    </body>
</html>
