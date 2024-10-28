<nav class="navbar navbar-expand-sm bg-dark navbar-dark rounded">
    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <?php if (!isset($_SESSION['username'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href=register.php>Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=login.php>Login</a>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['username'])) { ?>
            <li class="nav-item">
                <a class="nav-link" href="insert_form.php">Insert</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modify_table.php">Modify</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=logout.php>Logout</a>
            </li>
        <?php } ?>
    </ul>
</nav>
<?php
if (isset($_SESSION['usrmsg'])) { ?>
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong>
        <?php print $_SESSION['usrmsg'];
        unset($_SESSION['usrmsg']); ?>
    </div>
<?php } ?>

<?php
if (isset($_SESSION['err'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong>
        <?php print $_SESSION['err'];
        unset($_SESSION['err']); ?>
    </div>
<?php } ?>