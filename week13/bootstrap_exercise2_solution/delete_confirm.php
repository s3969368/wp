<?php
require_once('includes/db_connect.inc');
$title = "Delete Confirmation";
include('includes/header.inc');
include('includes/nav.inc');
if (isset($_SESSION['username'])) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from country where countryid=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $records = $stmt->get_result();
        if ($records->num_rows > 0) {
            foreach ($records as $row) {
                echo "<div class='container-fluid mx-auto mt-4'>";
                echo "<h2>Are you sure you want to delete this record?</h2>";
                echo "<h3>{$row['countryname']}</h3>";
                echo "<p>{$row['description']}</p>";
                echo "<img src='images/{$row['image']}' alt='{$row['caption']}' class='img-fluid rounded'>";
                echo "<p class='mt-3'>";
                echo "<a href='modify_table.php' class='btn btn-primary mr-2' role='button'>Cancel</a>&nbsp;";
                // encode url to make html valid
                $imagename = urldecode("images/{$row['image']}");
                echo "<a href='delete.php?id={$row['countryid']}&image=$imagename' class='btn btn-danger' role='button'>Delete</a>";
                echo "</p>";
                echo '</div>';
            }
        }
    }
}
include('includes/footer.inc');
