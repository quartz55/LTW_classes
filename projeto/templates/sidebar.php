<aside id="user_panel">
    <?php if (isset($_SESSION['username'])) { ?>
        User
        <a href="show_user.php?username=<?=$_SESSION['username']?>">
            <?=$_SESSION['username']?>
        </a>
        <form action="show_user.php" method="get">
            <input type="hidden" name="username" value="<?=$_SESSION['username']?>">
            <input type="submit" value="Profile" class="button">
        </form>
        <form action="action_logout.php" method="post">
            <br>
            <input type="submit" onclick="setRedirect();" name="relogin_btn" value="Change user" class="button">
            <input type="submit" value="Logout" class="button">
        </form>
    <?php } else { ?>
        <form action="login.php" method="get">
            <input type="submit" value="Login" class="button" onclick="setRedirect();">
        </form>
        <form action="register.php" method="get">
            <input type="submit" value="Register" class="button" onclick="setRedirect();">
        </form>
    <?php } ?>
</aside>
