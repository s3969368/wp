<?php
include('includes/header.inc');
?>

<?php
include('includes/nav.inc');
?>

<?php
include("db_connect.inc");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petname = mysqli_real_escape_string($conn, $_POST['petname']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $caption = mysqli_real_escape_string($conn, $_POST['caption']);
    $age = (float) $_POST['age'];
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $target_dir = "a2/images";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        die("There was an error uploading your file.");
    }

    $sql = "INSERT INTO pets (petname, description, caption, age, type, location, image) 
            VALUES ('$petname', '$description', '$caption', '$age', '$type', '$location', '$target_file')";

    if (mysqli_query($conn, $sql)) {
        echo "New pet added successfully!";
        header('Location: pets.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<section class="main-section-3">
        <div class="container">
            <div class="textContent3">
                <h3>Add a pet</h3>
                <p>You can add a new pet here</p>
            </div>
            <form action="/.php" class="addpetform">

                <label for="petname">Pet Name:</label>
                <input type="text" id="petname" name="petname" placeholder="Provide a name for the pet">
              
                <label for="type">Type:</label>
                <select id="type" name="type">
                  <option value="">--Choose an option--</option>
                </select>
              
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" placeholder="Describe the pet briefly"></textarea>
              
                <label for="image">Select an Image:</label>
                <input type="file" id="image" name="image"><br><br>
              
                <label for="imgcaption">Image Caption:</label>
                <input type="text" id="imgcaption" name="imgcaption" placeholder="Describe the image in one word">
              
                <label for="age">Age (months):</label>
                <input type="text" id="age" name="age" placeholder="Age of the pet in months">
              
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Location of the pet">
              
            </form>

                <div class="button-group">
                    <button type="submit" class="btn submit-btn">submit</button>
                    <button type="reset" class="btn clear-btn">clear</button>
                </div>
        </div>
    </section>

<?php
include('includes/footer.inc');
?>