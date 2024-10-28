<?php
$title = "Home";
include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

$sql = "select countryid, countryname, image, caption from country";
$records = $conn->query($sql);

echo '<div class="row">';
foreach ($records as $row) {

    echo "<div class='col-12 col-sm-6 col-lg-4'>";
    echo "<h2> {$row['countryname']} </h2>";
    echo "<img src='images/{$row['image']}' alt='{$row['caption']}' class='img-thumbnail img-fluid'>";
    echo "<p><a href='details.php?id={$row['countryid']}'>Read More</a></p>";
    echo "</div>";
}
echo "</div>";
include('includes/footer.inc');
