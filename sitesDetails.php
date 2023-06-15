<?php 
    $title = "Sites";
    include('header.php');

    $siteId = $_GET['id'];
    if ($siteId == "") {
        echo "<script>window.location='sites.php'</script>";
        exit();
    }
?>

<main>
    <section>
        <?php
            $select = "SELECT * FROM Site WHERE Id = '$siteId'";
            $run = mysqli_query($connect, $select);
            while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
        ?>
        <h2 class="section-title"><?= $row['Location'] . ' / ' . $row['Name'] ?></h2>

        <div class="site-banner">
            <img src="<?= $row['Image'] ?>" alt="<?= $row['Name'] ?>">
        </div>

        <div class="site-details">
            <h3>Site details</h3>
            <div class="site-details-container">
                <div>
                    <h4>Description</h4>
                    <p><?= $row['Description'] ?></p>
                </div>
                <div>
                    <h4>Rules</h4>
                    <p><?= $row['Rules'] ?></p>
                </div>
            </div>
        </div>

        <?php
            endwhile;
        ?>

        <div class="featured-pitch-list">
            <?php
                $query = "SELECT Pitch.Id, Pitch.PrimaryImage, Pitch.Name, Pitch.Description FROM Pitch INNER JOIN Site ON Pitch.SiteId = Site.Id WHERE Site.Id = '$siteId';";
                $run2 = mysqli_query($connect, $query);
                while($row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC)) :
            ?>

            <div class="pitch-card">
                <div class="pitch-card-img">
                    <img src="<?= $row2['PrimaryImage'] ?>" alt="<?= $row2['Name'] ?>">
                </div>
                <div class="pitch-card-body">
                    <div>
                        <h3 class="pitch-card-title"><?= $row2['Name'] ?></h3>
                        <p class="pitch-card-desc"><?= $row2['Description'] ?>a sfdla sdlf asldfjlasjfljaslf alsd flasfl
                            jaslf asldf
                        </p>
                    </div>
                    <a class="btn btn-white" href="pitchDetails.php?id=<?= $row2['Id'] ?>">Details</a>
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