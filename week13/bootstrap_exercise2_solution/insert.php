<?php
$title = "Insert";
include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

if (isset($_SESSION['username'])) {

    foreach ($_POST as $key => $val) {
        $$key = trim($val);
    }
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    $sql = "INSERT INTO country(countryname,description,image,caption) VALUES (?,?,?,?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        exit("An error occurred");
    }

    $stmt->bind_param("ssss", $countryname, $description, $image, $caption);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo '<div class="alert alert-success alert-dismissible">';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
        echo "<p>New record successfully inserted into the database</p>";
        echo '</div>';
        if (move_uploaded_file($temp, 'images/' . $image)) {
            echo '<div class="alert alert-success alert-dismissible">';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo "<p>Image moved to folder</p>";
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible">';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo "<p>Image not moved to folder</p>";
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible">';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
        echo "<p>Record not inserted into the database</p>";
        echo '</div>';
    }
}
include('includes/footer.inc');
