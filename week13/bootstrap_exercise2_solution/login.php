<?php
$title = "Login";
include('includes/header.inc');
include('includes/nav.inc');
?>
<form action="process_login.php" method="post">
    <h3>Login:</h3>
    <div class="mb-3 mt-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" name="username" id="username" class="form-control">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control">
        <input type="submit" value="Login" class="btn btn-primary">
    </div>
</form>
<?php
include('includes/footer.inc');
?>