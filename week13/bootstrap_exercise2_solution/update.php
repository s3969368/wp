<?php
$title = "Update Confirmation";
include('includes/header.inc');
include('includes/nav.inc');
require_once('includes/db_connect.inc');

if (isset($_SESSION['username'])) {
	$error = false;
	echo "<div id='message'>";
	if (!empty($_POST['countryid'])) {

		foreach ($_POST as $key => $val) {
			$$key = trim($val);
		}
		$image = $_FILES['image']['name'];
		$temp = $_FILES['image']['tmp_name'];

		$sql = "select * from country where countryid=?";
		$stmt = $conn->prepare($sql);
		if (!$stmt) {
			exit("prepare failed: " . $conn->error);
		}
		$stmt->bind_param("i", $countryid);
		$stmt->execute();
		$records = $stmt->get_result();
		if ($records->num_rows > 0) {
			foreach ($records as $row) {
				$countryname = $row['countryname'];
				$oldimage = $row['image'];
			}
		}
		if (empty($image)) {
			$image = $oldimage;
		}
		$sql = "UPDATE country SET description=?,image=?, caption=? WHERE countryid=?";

		$stmt = $conn->prepare($sql);

		if (!$stmt) {
			exit("prepare failed: " . $conn->error);
		}

		$stmt->bind_param("sssi", $description, $image, $caption, $countryid);
		$stmt->execute();
		if ($stmt->affected_rows > 0) {
			echo '<div class="alert alert-success alert-dismissible">';
			echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
			echo "<p>Record $countryname updated</p>";
			echo '</div>';

			if ($oldimage != $image) {
				//Delete old image
				if (file_exists('images/' . $oldimage)) {
					unlink('images/' . $oldimage);
				}
				//Upload new one
				if (move_uploaded_file($temp, 'images/' . $image)) {
					echo '<div class="alert alert-success alert-dismissible">';
					echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
					echo "<p>Image moved to folder</p>";
					echo '</div>';
				} else {
					echo '<div class="alert alert-danger">';
					echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
					echo "<p>Image NOT moved to folder</p>";
					echo '</div>';
				}
			}
		} else {
			$error = true;
		}
	} else {
		$error = true;
	}
	if ($error) {
		echo '<div class="alert alert-danger">';
		echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
		echo "<p>Record NOT updated</p>";
		echo '</div>';
	}

	echo "</div>";
}
include('includes/footer.inc');
