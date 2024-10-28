<?php
$title = "Login";
include('includes/header.inc');
include('includes/nav.inc');
?>
<form action="process_login.php" method="post">
    <h3>Login:</h3>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Login">
</form>
<?php
include('includes/footer.inc');
?>