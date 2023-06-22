<?php 
    $title = "Admin";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Pitches</h3>
        <a href="adminCreate.php" class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <span>Create Admin</span>
        </a>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <?php 
                $query = "SELECT * FROM Admin";
                $run = mysqli_query($connect, $query);
                $index = 1;
                while($row = mysqli_fetch_array($run)) :
            ?>
            <tr>
                <td><?= $index ?>.</td>
                <td>
                    <img src="<?= $row['Image'] ?>" alt="<?= $row['Name'] ?>">
                </td>
                <td>
                    <?php 
                        echo "<a href='adminProfile.php?id=$row[Id]' class='admin-link'>" . $row['Name'] . "</a>";
                    ?>
                </td>
                <td><?= $row['Email'] ?></td>
            </tr>
            <?php
                $index++;
                endwhile;
            ?>
        </table>
    </div>
</main>

<?php 
    include('adminFooter.php');
?>