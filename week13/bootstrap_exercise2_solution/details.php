<?php
$title = "Details";
include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

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

    //loop through the table of results printing each row
    if ($records->num_rows > 0) {
        foreach ($records as $row) {
            echo "<div>";
            echo "<h2> {$row['countryname']} </h2>";
            echo "<img src='images/{$row['image']}' alt=' {$row['caption']} ' class='img-fluid rounded'>";
            echo "<p>{$row['description']}</p>";
            echo "</div>";
        }
    }
}
include('includes/footer.inc');
