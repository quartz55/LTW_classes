<!DOCTYPE html>
<html>

<head>
    <title>LTW Project</title>
    <meta charset="UTF-8">
</head>

<body>
    <div id="menu" >
    <?php if (isset($_SESSION['username'])) { ?>
        <form action="action_logout.php" method="post">
            Logged in as:
            <label><b><?=$_SESSION['username']?></b></label>
            <input type="submit" value="Logout">
        </form>
    <?php } else { ?>
        <ul>
            <li> <a href="login.php" >Login</a></li>
            <li> <a href="register.php" >Register</a></li>
        </ul>
    <?php } ?>
    <h2>Menu</h2>
    <ul>
        <li><a href="index.php">Home</a>
        <li><a href="list_users.php">Users</a>
        <li><a href="list_events.php">Events</a>
    </ul>
    </div>
    <div id="content" >
