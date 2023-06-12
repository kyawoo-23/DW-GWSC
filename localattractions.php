<?php 
    $title = "Local Attractions";
    include('header.php');
?>

<main>
    <section>
        <h2 class="section-title">Local Attractions</h2>
        <div class="flex-two-div">
            <?php
                $query = "SELECT LocalAttraction.Image, LocalAttraction.Name, LocalAttraction.Description, Site.Name AS SiteName FROM LocalAttraction INNER JOIN Site On LocalAttraction.SiteId = Site.Id";
                $run = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
            ?>

            <div class="activity-card local-attraction">
                <img src="<?= $row['Image'] ?>" alt="<?= $row['Name'] ?>">
                <div class="activity-info sites">
                    <h3><?= $row['Name'] ?></h3>
                    <small><?= $row['SiteName'] ?></small>
                </div>
                <span class="local-attraction-description"><?= $row['Description'] ?></span>
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