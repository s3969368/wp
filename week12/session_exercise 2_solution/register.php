<?php
$title = "Register";
include('includes/header.inc');
include('includes/nav.inc');
?>
<div>
    <form action="process_register.php" method="post">
        <h3>Register:</h3>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Register">
    </form>
</div>
<?php
include('includes/footer.inc');
?>