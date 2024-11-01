<?php
include('includes/header.inc');
?>

<?php
include('includes/nav.inc');
?>

<?php
include("includes/db_connect.inc");

 $query = "SELECT petid, petname, age, type, location, image FROM pets";
 $result = mysqli_query($conn, $query);
?>

<section class="main-section-2">
        <div class="container">
            <div class="textContent2">
                <h3>Discover Pets Victoria</h3>
                <p>Pets Victoria is a dedicated pet adoption organisation based in Victoria, Austraia, focused on providing a safe and loving environment for pets in need. With a <br>compassionate approach, Pets Victoria works tirelessly to rescue, rehabilitate, and rehome dogs, cats, and other animals. Their mission is to connect these <br>deserving pets with caring individuals and families, creating lifelong bonds. The organisation offers a range of services, including adoption counseling, pet <br>education, and community support programs, all aimed at promoting responsible pet ownership and reducing the number of homeless animals.</p>
            </div>
            <img src="images/pets.jpeg" alt="pets" class="pets">
            <table>
                <thead>
                    <tr>
                        <th>Pet</th>
                        <th>Type</th>
                        <th>Age</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><a href='details.php?id=" . $row['petid'] . "'>" . htmlspecialchars($row['petname']) . "</a></td>";
                            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No pets available at the moment.</td></tr>";
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>

            
        </div>
    </section>

<?php
include('includes/footer.inc');
?>