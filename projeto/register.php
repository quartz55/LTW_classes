<?php
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <script type="text/javascript" src="js/regform.js"></script>
    </head>
    <body>
        <h1>Registration form</h1>
        <ul>
            <li>Username may contain only digits, upper and lowercase letters and underscores</li>
            <li>Password must be at least 3 characters long</li>
            <li>Passwords must match</li>
        </ul>
        <form action="action_register.php" method="post">
            Username: <input type="text" name="username">
            <br>
            Password: <input type="password" name="password">
            <br>
            Confirm password: <input type="password" name="confirm">
            <br>
            <input type="button" value="Confirm"
                   onclick="return regform(this.form,
                            this.form.username,
                            this.form.password,
                            this.form.confirm);">
            <input type="submit" name="cancel_btn" value="Cancel">
        </form>
    </body>
</html>
