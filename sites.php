<?php 
    $title = "Sites";
    include('header.php');
?>

<main>
    <section>
        <h2 class="section-title">Available sites from us</h2>
        <div class="flex-two-div">
            <?php
                $query = "SELECT * FROM Site";
                $run = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
            ?>

            <div class="activity-card">
                <img src="<?= $row['Image'] ?>" alt="<?= $row['Name'] ?>">
                <div class="activity-info sites">
                    <h3><?= $row['Name'] ?></h3>
                    <small><?= $row['Location'] ?></small>
                </div>
            </div>

            <?php
                endwhile;
            ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>