<?php
include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

$id = $_GET['id'];
$sql = "select * from pets where petid = $id";
$result = $conn->query($sql);

$row = mysqli_fetch_array($result);
?>

    <main>
        <img class='detailsImg' src='images/<?=htmlspecialchars($row['image'])?>' alt=<?=htmlspecialchars($row['petname'])?>>
        <div class="detailsContainer">
            <div class="detailsInfo">
                <i class="material-icons" style="font-size:36px">access_alarm</i><br>
                <p><?=$row['age']?> months</p>
            </div>
            <div class="detailsInfo">
                <span class="material-symbols-outlined">pets</span><br>
                <p><?=$row['type']?></p>
            </div>
            <div class="detailsInfo">
                <i class="material-icons" style="font-size:36px">location_on</i><br>
                <p><?=htmlspecialchars($row['location'])?></p>
            </div>
        </div>
        <p class="detailsName"><?=htmlspecialchars($row['petname'])?></p>
        <p class="detailsDescription"><?=htmlspecialchars($row['description'])?></p>
    </main>

<?php
include('includes/footer.inc');
?>