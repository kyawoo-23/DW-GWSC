<?php 
    $title = "Features";
    include('header.php');
?>

<main>
    <section>
        <h2 class="section-title">Available Features</h2>

        <div id="feature-section">
            <div class="features-list-section">
                <div>
                    <p class="section-sub-title">
                        <img src="./assets/static/icons/info.svg" alt="info">
                        Here are a few typical facilities available at our sites
                    </p>

                    <div class="features-list">
                        <?php
                    $select = "SELECT * FROM Facilities";
                    $run = mysqli_query($connect, $select);
                    while($row = mysqli_fetch_array($run)) :
                ?>
                        <div class="feature feature-item">
                            <img src="./assets/static/icons/<?= $row['Name'] ?>.svg" alt="<?= $row['Name'] ?>">
                            <span><?= $row['Name'] ?></span>
                        </div>
                        <?php
                    endwhile;
                ?>
                    </div>
                </div>
                <div>
                    <p class="section-sub-title">
                        <img src="./assets/static/icons/info.svg" alt="info">
                        Wearable technologies
                    </p>
                    <div class="wearables-list">
                        <div class="wearable feature-item">
                            <img src="./assets/static/icons/smart-glasses.svg" alt="smart-glasses">
                            <hr>
                            <span>Smart glasses</span>
                            <small>Providing augmented reality and underwater vision capabilities</small>
                        </div>
                        <div class="wearable feature-item">
                            <img src="./assets/static/icons/headphone-symbol.svg" alt="headphone">
                            <hr>
                            <span>Smart headphones</span>
                            <small>Combining music, durability, and water resistance in one</small>
                        </div>
                        <div class="wearable feature-item">
                            <img src="./assets/static/icons/smart-watch.svg" alt="smart-watch">
                            <hr>
                            <span>Smart watch</span>
                            <small>The versatile smartwatch, combining GPS, water resistance, and activity
                                tracking</small>
                        </div>
                        <div class="wearable feature-item">
                            <img src="./assets/static/icons/goggles.svg" alt="goggles">
                            <hr>
                            <span>Smart goggles</span>
                            <small>The ultimate companion for adventureers, combining high-tech features with outdoor
                                adventure</small>
                        </div>
                        <div class="wearable feature-item">
                            <img src="./assets/static/icons/fitness-tracker.svg" alt="fitness-tracker">
                            <hr>
                            <span>Fitness tracker</span>
                            <small>Enhances camping and swimming experiences with advanced activity tracking</small>
                        </div>
                        <div class="wearable feature-item">
                            <img src="./assets/static/icons/earbuds.svg" alt="earbuds">
                            <hr>
                            <span>Smart earbuds</span>
                            <small>Waterproof, immersive audio for outdoor adventures and underwater workouts</small>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $select2 = "SELECT Facilities.Name AS FeatName, GROUP_CONCAT(Feature.SiteId) AS SiteIds 
                            FROM Feature
                            INNER JOIN Facilities ON
                            Feature.FacilitiesId = Facilities.Id
                            GROUP BY Feature.FacilitiesId";
                $run2 = mysqli_query($connect, $select2);
                while($row2 = mysqli_fetch_array($run2)) :
            ?>
            <h2 class="section-title feature">Sites with <?= $row2['FeatName'] ?> facility <img
                    src="./assets/static/icons/<?= $row2['FeatName'] ?>.svg" alt=""></h2>

            <div class="flex-two-div">
                <?php
                    $siteIds = explode(',', $row2['SiteIds']);
                    foreach ($siteIds as $siteId) {
                        $getSite = "SELECT * FROM Site WHERE Id = $siteId";
                        $run3 = mysqli_query($connect, $getSite);
                        while($row3 = mysqli_fetch_array($run3)) :
                ?>
                <div class="activity-card">
                    <img src="<?= $row3['Image'] ?>" alt="<?= $row3['Name'] ?>">
                    <div class="activity-info sites">
                        <h3><?= $row3['Name'] ?></h3>
                        <small class="site-location"><img src="./assets/static/icons/globe.svg" alt="country icon">
                            <?= $row3['Location'] ?></small>
                        <a href="sitesDetails.php?id=<?= $row3['Id'] ?>" class="btn btn-white">Details</a>
                    </div>
                </div>
                <?php
                        endwhile;
                    }
                ?>
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