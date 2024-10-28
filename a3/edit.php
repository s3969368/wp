<?php
session_start(); // Start session at the top of the file

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit(); // Stop executing the rest of the page
}

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");
?>

<main class="">
        <div class="container">
          
        </div>
</main>

<?php
include('includes/footer.inc');
?>