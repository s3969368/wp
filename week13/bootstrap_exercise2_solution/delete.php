<?php
$title = "Delete Record";
include('includes/header.inc');
include('includes/nav.inc');
require_once('includes/db_connect.inc');
if (isset($_SESSION['username'])) {
    $error = false;
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
                $oldimage = $row['image'];
            }
        }
        $sql = "delete from country where countryid = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            exit("prepare failed: " . $conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo '<div class="alert alert-success alert-dismissible">';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo "<p>Record deleted</p>";
            echo '</div>';
            if (file_exists('images/' . $oldimage)) {
                unlink('images/' . $oldimage);
            }
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
    if ($error) {
        echo '<div class="alert alert-danger alert-dismissible">';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
        echo "<p>Record NOT deleted</p>";
        echo '</div>';
    }
}
include('includes/footer.inc');
