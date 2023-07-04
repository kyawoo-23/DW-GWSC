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
            $row = mysqli_fetch_array($run, MYSQLI_ASSOC)
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

        <h2 class="section-title">Local attractions</h2>
        <div class="pitch-attractions">
            <?php
                $getAttraction = "SELECT * FROM LocalAttraction WHERE SiteId = '$siteId'";
                $run5 = mysqli_query($connect, $getAttraction);
                if (mysqli_num_rows($run5) > 0) {
                    while($row5 = mysqli_fetch_array($run5, MYSQLI_ASSOC)) :
            ?>

            <div class="activity-card local-attraction">
                <img src="<?= $row5['Image'] ?>" alt="<?= $row5['Name'] ?>">
                <div class="activity-info sites">
                    <h3><?= $row5['Name'] ?></h3>
                </div>
                <span class="local-attraction-description"><?= $row5['Description'] ?></span>
            </div>

            <?php
                    endwhile;
                }
                else {
                    echo "<span class='not-found-text col-span-3'>No local attractions found</span>";
                }
            ?>
        </div>

        <h2 class="section-title">Map</h2>
        <div class="site-map">
            <?= $row['Map'] ?>
        </div>

        <h2 class="section-title">Pitches</h2>
        <div class="featured-pitch-list">
            <?php
                $query = "SELECT Pitch.* FROM Pitch INNER JOIN Site ON Pitch.SiteId = Site.Id WHERE Site.Id = '$siteId';";
                $run2 = mysqli_query($connect, $query);
                if (mysqli_num_rows($run2) > 0) {
                    while($row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC)) :
            ?>

            <a href="pitchDetails.php?id=<?= $row2['Id'] ?>" class="pitch-card">
                <div class="pitch-card-img">
                    <img src="<?= $row2['PrimaryImage'] ?>" alt="<?= $row2['Name'] ?>">
                </div>
                <div class="pitch-card-body">
                    <div>
                        <h3 class="pitch-card-title"><?= $row2['Name'] ?></h3>
                        <p class="pitch-card-desc">£ <?= $row2['Price'] ?></p>
                        <div class="pitch-time">
                            <img class="icon-sm" src="./assets/static/icons/calendar.svg" alt="calendar">
                            <span><?= $row2['StartDate'] ?></span>
                            ~
                            <span><?= $row2['EndDate'] ?></span>
                        </div>
                    </div>
                </div>
            </a>

            <?php
                    endwhile;
                }
                else {
                    echo "<span class='not-found-text col-span-3'>No pitches found</span>";
                }
            ?>
        </div>

        <h2 class="section-title">Reviews</h2>
        <div class="featured-pitch-list">
            <?php
                $query = "SELECT Review.*, Site.name AS SiteName, Site.id AS SiteId, Site.image AS SiteImage, Customer.*, Customer.image AS CustomerImage FROM Review 
                        INNER JOIN Site ON Review.SiteId = Site.Id
                        INNER JOIN Customer ON Customer.Id = Review.CustomerId
                        WHERE Site.Id = '$siteId'";
                $run3 = mysqli_query($connect, $query);
                if (mysqli_num_rows($run3) > 0) {
                    while($row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC)) :
            ?>

            <div class="review-card">
                <div class="review-title">
                    <h3><?= $row3['SiteName'] ?></h3>
                    <span class="review-star">
                        <?= $row3['Rating'] ?>
                        <img src="./assets/static/icons/star.svg" class="icon-md" alt="star">
                    </span>
                </div>
                <img src="<?= $row3['SiteImage'] ?>" class="review-site-img" alt="<?= $row3['SiteName'] ?>" />
                <div class="review-user">
                    <small class="review-time">
                        <?php 
                           $datetime = new DateTime($row3['CreatedAt']);
                            $formattedDatetime = $datetime->format("F j, Y");
                            echo $formattedDatetime;
                        ?>
                    </small>
                    <div class="review-user-info">
                        <img src="<?= $row3['CustomerImage'] ?>" alt="<?= $row3['FirstName'] ?>">
                        <span><?= $row3['FirstName'] . ' ' . $row3['SurName'] ?></span>
                    </div>
                    <p><?= $row3['Message'] ?></p>
                </div>
            </div>

            <?php
                    endwhile;
                }
                else {
                    echo "<div class='not-found-text col-span-3'>No reviews yet!</div>";
                }
            ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>