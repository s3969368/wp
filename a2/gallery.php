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

            <div class="responsive">
                <div class="gallery">
                  <a target="_blank" href="images/milo.jpeg">
                    <img src="images/milo.jpeg" alt="Milo" class="milo">
                  </a>
                  <div class="overlay">
                    <div class="text">
                      <i class="material-icons" style="font-size:36px">search</i>
                      <p><a href="details.php">Discover more!</a></p>
                    </div>
                  </div>
                  <div class="name">Milo</div>
                </div>
            </div>
              
            <div class="responsive">
                <div class="gallery">
                  <a target="_blank" href="images/baxter.jpeg">
                    <img src="images/baxter.jpeg" alt="Baxter" class="baxter">
                  </a>
                  <div class="name">Baxter</div>
                </div>
            </div>  

            <div class="responsive">
                <div class="gallery">
                  <a target="_blank" href="images/luna.jpeg">
                    <img src="images/luna.jpeg" alt="Luna" class="luna">
                  </a>
                  <div class="name">Luna</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                  <a target="_blank" href="images/willow.jpeg">
                    <img src="images/willow.jpeg" alt="Willow" class="willow">
                  </a>
                  <div class="name">Willow</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                  <a target="_blank" href="images/oliver.jpeg">
                    <img src="images/oliver.jpeg" alt="Oliver" class="oliver">
                  </a>
                  <div class="name">Oliver</div>
                </div>
            </div>

            <div class="responsive">
                <div class="gallery">
                  <a target="_blank" href="images/bella.jpeg">
                    <img src="images/bella.jpeg" alt="Bella" class="bella">
                  </a>
                  <div class="name">Bella</div>
                </div>
            </div>
            
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<div class='responsive'>";
                  echo "<div class='gallery'>";
                  echo "<a href='details.php?id=" . $row['petid'] . "'>";
                  echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['caption']) . "'>";
                  echo "</a>";
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