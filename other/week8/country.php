<?php
$title = "Country";
include("includes/header.inc");
include("includes/db_connect.inc");

//execute a select all query and assign result to a variable called $results
$sql = "select * from country";
$result = $conn->query($sql);

//loop through the table of results printing each row
while ($row = $result->fetch_array()) {
    print "<div>";
    print "<h2>" . $row['countryid'] . "</h2>";
    print "<h2>{$row['countryname']}</h2>";
    print "<h3>{$row['description']}</h3>";
    print "<p><img src='images/{$row['image']}' alt='{$row['caption']}'></p>";
    print "</div>";

}



include("includes/footer.inc");
?>