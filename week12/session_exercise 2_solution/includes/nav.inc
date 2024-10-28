<nav>
    <ul class="flex-nav">
        <li><a href="index.php">Home</a></li>
        <?php if (!isset($_SESSION['username'])) { ?>
            <li><a href=register.php>Register</a></li>
            <li><a href=login.php>Login</a></li>
        <?php } ?>
        <?php if (!empty($_SESSION['username'])) { ?>
            <li><a href="insert_form.php">Insert</a></li>
            <li><a href="modify_table.php">Modify</a></li>
            <li><a href=logout.php>Logout</a></li>
        <?php } ?>

    </ul>
</nav>