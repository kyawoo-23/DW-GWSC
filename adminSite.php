<?php 
    $title = "Admin Site";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Sites</h3>
        <a href="adminSiteCreate.php" class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <span>Create Site</span>
        </a>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Location</th>
                <th>Action</th>
            </tr>

            <?php
                $query = "SELECT * FROM Site";
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
                <td><?= $row['Location'] ?></td>
                <td>
                    <div class="admin-table-btn-gp">
                        <a href="adminSiteDetails.php?id=<?= $row['Id'] ?>" class="btn admin-table-btn">
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
function confirmDelete(siteId) {
    var confirmation = confirm("Are you sure you want to delete this site?");
    if (confirmation) {
        window.location.href = "adminSiteDelete.php?id=" + siteId;
    }
}
</script>

<?php 
    include('adminFooter.php');
?>