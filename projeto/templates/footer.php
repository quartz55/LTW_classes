        </div> <!-- main -->
        <aside id="user_panel">
            <?php if (isset($_SESSION['username'])) { ?>
                <form action="action_logout.php" method="post">
                    User
                    <a href="show_user.php?username=<?=$_SESSION['username']?>">
                        <?=$_SESSION['username']?>
                    </a>
                    <br>
                    <input type="submit" onclick="setRedirect();" name="relogin_btn" value="Change user">
                    <input type="submit" value="Logout">
                </form>
            <?php } else { ?>
                <ul>
                    <li>
                        <a href="login.php" onclick="setRedirect();">Login</a>
                    </li>
                    <li>
                        <a href="register.php" onclick="setRedirect();">Register</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div> <!-- content -->
    <div id="footer">
        <p>LTW Project</p>
    </div>
</body>
</html>
