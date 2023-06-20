<?php 
    $title = "Admin Local Attraction";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Local Attractions</h3>
        <a href="adminLocalAttractionCreate.php" class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <span>Create Local Attraction</span>
        </a>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Site</th>
                <th>Action</th>
            </tr>

            <?php
                $query = "SELECT LocalAttraction.Id, LocalAttraction.Name, LocalAttraction.Image, Site.Name AS SiteName, Site.Id AS SiteId FROM LocalAttraction INNER JOIN Site ON LocalAttraction.SiteId = Site.Id";
                $run = mysqli_query($connect, $query);
                $index = 1;
                while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
            ?>

            <tr>
                <td><?= $index; ?>.</td>
                <td>
                    <img src="<?= $row['Image'] ?>" alt="<?= $row['Name'] ?>">
                </td>
                <td><?= $row['Name'] ?></td>
                <td>
                    <?php
                        echo "<a href='adminSiteDetails.php?id=$row[SiteId]' class='admin-link'>" . $row['SiteName'] . "</a>";
                    ?>
                </td>
                <td>
                    <div class="admin-table-btn-gp">
                        <a href="adminLocalAttractionDetails.php?id=<?= $row['Id'] ?>" class="btn admin-table-btn">
                            <img class="icon-sm" src="./assets/static/icons/update.svg" alt="update icon">
                            Update
                        </a>
                        <button class="btn admin-table-btn" onclick="confirmDelete(<?= $row['Id'] ?>)">
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
    let confirmation = confirm("Are you sure you want to delete this local attraction?");
    if (confirmation) {
        window.location.href = "adminLocalAttractionDelete.php?id=" + id;
    }
}
</script>

<?php 
    include('adminFooter.php');
?>