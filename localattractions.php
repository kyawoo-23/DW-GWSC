<?php 
    $title = "Local Attractions";
    include('header.php');
?>

<main>
    <section>
        <h2 class="section-title">Local Attractions</h2>
        <p class="section-sub-title">
            <img src="./assets/static/icons/info.svg" alt="info">
            Find stunning hiking trails, serene lakes, historic landmarks, wildlife sanctuaries,
            adventure activities, and local culinary delights near our camping sites
        </p>

        <?php
            $query = "SELECT * FROM Site";
            $run = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
                $getAttraction = "SELECT * FROM LocalAttraction WHERE SiteId = '$row[Id]'";
                $run2 = mysqli_query($connect, $getAttraction);
                if (mysqli_num_rows($run2) > 0) {
        ?>

        <h2 class="section-title">Local attractions in <?= $row['Name'] ?></h2>
        <div class="flex-two-div">
            <?php
                    while ($row2 = mysqli_fetch_array($run2)) :
            ?>
            <div class="activity-card local-attraction">
                <img src="<?= $row2['Image'] ?>" alt="<?= $row2['Name'] ?>">
                <div class="activity-info sites">
                    <h3><?= $row2['Name'] ?></h3>
                </div>
                <span class="local-attraction-description"><?= $row2['Description'] ?></span>
            </div>
            <?php    
                    endwhile;
                }
            ?>
        </div>
        <?php
            endwhile;
        ?>
    </section>
</main>

<?php 
    include('footer.php');
?>