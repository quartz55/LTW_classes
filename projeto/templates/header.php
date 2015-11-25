<!DOCTYPE html>
<html>

<head>
    <title>LTW Project</title>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/cookies.js"></script>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <h1>LTW Project</h1>
    <div id="menu">
        <div class="nav_buttons">
            <h2>Menu</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="list_users.php">Users</a></li>
                <li><a href="list_events.php">Events</a></li>
            </ul>
        </div>
        <div id="user_panel">
            <?php if (isset($_SESSION['username'])) { ?>
                <form action="action_logout.php" method="post">
                    Logged in as:
                    <label><b><?=$_SESSION['username']?></b></label>
                    <input type="submit" value="Logout">
                    <input type="submit" onclick="setRedirect();" name="relogin_btn" value="Change user">
                </form>
            <?php } else { ?>
                <ul>
                    <li> <a href="login.php" onclick="setRedirect();">Login</a></li>
                    <li> <a href="register.php">Register</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div id="content">
