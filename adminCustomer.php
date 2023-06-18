<?php 
    $title = "Admin Customer";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Customer list</h3>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>View count</th>
            </tr>

            <?php
                $query = "SELECT * FROM Customer";
                $run = mysqli_query($connect, $query);
                $index = 1;
                while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
            ?>

            <tr>
                <td><?= $index; ?>.</td>
                <td>
                    <img src="<?= $row['Image'] ?>" alt="<?= $row['SurName'] ?>">
                </td>
                <td><?= $row['FirstName'] . ' ' . $row['SurName'] ?></td>
                <td><?= $row['Email'] ?></td>
                <td><?= $row['Phone'] ?></td>
                <td><?= $row['ViewCount'] ?? '0' ?></td>
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