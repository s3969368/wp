<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are set in $_POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL query with SHA encryption
        $sql = "INSERT INTO users (username, password, reg_date) VALUES (?, SHA(?), NOW())";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            // Registration successful, set success message
            $_SESSION['usrmsg'] = "You have successfully registered";
            header("Location: index.php"); // Redirect to home or login page
            exit();
        } else {
            // Handle errors during execution
            $_SESSION['err'] = "An error has occurred!";
        }

        $stmt->close();
    } else {
        // Handle case where form fields are not filled
        $_SESSION['err'] = "Please fill in all required fields.";
    }
}

// Close the database connection
$conn->close();
?>

<!-- Bootstrap 5 Form -->
<main>
    <div>
        <h2 class="mt-5">Register</h2>
        <form action="register.php" method="post">
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control w-50" required>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
        </form>
    </div>
</main>

<?php
include('includes/footer.inc');
?>