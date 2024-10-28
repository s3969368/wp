<?php
require_once('includes/db_connect.inc');
$title = "Update Form";
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
        foreach ($records as $row) { ?>
            <form method="post" action="update.php" enctype="multipart/form-data">
                <h3>Update country details: <?php echo $row['countryname'] ?> </h3>
                <div class="mb-3 mt-3">
                    <input type="hidden" name="countryid" value="<?php echo $row['countryid'] ?>" class="form-control">
                    <label class="form-label">Description</label>
                    <textarea cols="50" rows="5" name="description" class="form-control"><?php echo $row['description'] ?></textarea>
                    <label class="form-label">Select an Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <div><?php echo $row['image'] ?></div>
                    <label class="form-label">Caption</label>
                    <input type="text" name="caption" value="<?php echo $row['caption'] ?>" class="form-control">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
<?php
        }
    }
}
include('includes/footer.inc');
?>