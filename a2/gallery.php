<?php
include('includes/header.inc');
?>

<?php
include('includes/nav.inc');
?>

<?php
include('includes/db_connect.inc');

$sql = "SELECT petid, image, caption FROM pets";
$result = mysqli_query($conn, $sql);
?>

<section class="main-section-4">
        <div class="container">
            <div class="textContent4">
                <h3>Pets Victoria has a lot to offer!</h3>
                <p>For almost two decades, Pets Victoria has helped in creating true social change by bringing pet adoption into the mainstream. Our work has helped make a <br>difference to the Victorian rescue community and thousands of pets in need of rescue and rehabilitation. But, until every pet is safe, respected, and loved, we all <br>still have big, hairy work to do.</p>
            </div>
            
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<div class='responsive'>";
                  echo "<div class='gallery'>";
                  echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['caption']) . "'>";
                  echo "<div class='overlay'>";
                  echo "<div class='text'>";
                  echo "<i class='material-icons' style='font-size:36px'>search</i>";
                  echo "<p><a href='details.php?id=" . $row['petid'] . "'>Discover more!</a></p>";
                  echo "</div>";
                  echo "</div>";
                  echo "<div class='name'>" . htmlspecialchars($row['caption']) . "</div>";
                  echo "</div></div>";
              }
            } else {
              echo "<p>No pets available at the moment.</p>";
            }
          
            mysqli_close($conn);
            ?>

            <div class="clearfix"></div>
        </div>
    </section>

<?php
include('includes/footer.inc');
?>