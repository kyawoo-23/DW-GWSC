<?php 
    $title = "Admin Pitch";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Pitches</h3>
        <a href="adminPitchCreate.php" class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <span>Create Pitch</span>
        </a>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Site</th>
                <th>Activity</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
            <?php 
                $query = "SELECT Pitch.Name, Pitch.PrimaryImage, Pitch.StartDate, Pitch.EndDate, Pitch.Price, Pitch.IsFeatured, Pitch.IsAvailable, Pitch.Id, Site.Name AS SiteName, Site.Id AS SiteId, Activity.Name AS ActivityName 
                FROM Pitch 
                INNER JOIN Site ON Pitch.SiteId = Site.Id
                INNER JOIN Activity ON Pitch.ActivityId = Activity.Id";
                $run = mysqli_query($connect, $query);
                $index = 1;
                while($row = mysqli_fetch_array($run)) :
            ?>
            <tr>
                <td><?= $index ?>.</td>
                <td>
                    <img src="<?= $row['PrimaryImage'] ?>" alt="<?= $row['Name'] ?>">
                </td>
                <td><?= $row['Name'] ?></td>
                <td>
                    <?php 
                        echo "<a href='adminSiteDetails.php?id=$row[SiteId]' class='admin-link'>" . $row['SiteName'] . "</a>";
                    ?>
                </td>
                <td><?= $row['ActivityName'] ?></td>
                <td><?= $row['StartDate'] ?></td>
                <td><?= $row['EndDate'] ?></td>
                <td>£ <?= $row['Price'] ?></td>
                <td><?= $row['IsFeatured'] === '0' ? 'No' : 'Yes' ?></td>
                <td><?= $row['IsAvailable'] === '0' ? 'No' : 'Yes' ?></td>
                <td>
                    <div class="admin-table-btn-gp">
                        <a href="adminPitchDetails.php?id=<?= $row['Id'] ?>" class="btn admin-table-btn">
                            <img class="icon-sm" src="./assets/static/icons/update.svg" alt="update icon">
                            Update
                        </a>
                        <button class="btn admin-table-btn" onclick="confirmDelete('<?= $row['Id'] ?>')">
                            <img src="./assets/static/icons/delete.svg" alt="delete icon" class="icon-sm">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            <?php
                $index++;
                endwhile;
            ?>
        </table>
    </div>
</main>

<script type="text/javascript">
function confirmDelete(id) {
    var confirmation = confirm("Are you sure you want to delete this pitch?");
    if (confirmation) {
        window.location.href = "adminPitchDelete.php?id=" + id;
    }
}
</script>

<?php 
    include('adminFooter.php');
?>