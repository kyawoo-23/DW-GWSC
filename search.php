<?php 
    $title = "Search";
    include('header.php');

    $day = $_GET['day'];
    $place = $_GET['place'];
?>

<main>
    <section>
        <?php
            if ($day === "" AND $place === "") {
                $query = "SELECT * FROM Pitch WHERE Pitch.IsAvailable = 1";
            } 
            else if ($day === "" AND $place !== "") {
                $query = "SELECT * FROM Pitch INNER JOIN Site ON Pitch.SiteId = Site.Id WHERE Site.Location = '$place' AND Pitch.IsAvailable = 1";
            }
            else if ($day !== "" AND $place === "") {
                $query = "SELECT * FROM Pitch WHERE Pitch.StartDate <= '$day' AND Pitch.EndDate > '$day' AND Pitch.IsAvailable = 1";
            }
            else {
                $query = "SELECT * FROM Pitch INNER JOIN Site ON Pitch.SiteId = Site.Id WHERE Site.Location = '$place' AND Pitch.StartDate <= '$day' AND Pitch.EndDate > '$day' AND Pitch.IsAvailable = 1";
            }
            
            $run = mysqli_query($connect, $query);
        ?>

        <h4 class="section-title search">
            <small><?= '(' . mysqli_num_rows($run) . ')' ?></small>
            Searched result:
            <?php 
                if (empty($day) && empty($place)) {
                    echo "All";
                } 
                else {
                    echo $day . ' ' . $place;
                } 
            ?>
        </h4>

        <div class="featured-pitch-list">
            <?php
                if (mysqli_num_rows($run) > 0) {
                    while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
            ?>

            <a href="pitchDetails.php?id=<?= $row['Id'] ?>" class="pitch-card">
                <div class="pitch-card-img">
                    <img src="<?= $row['PrimaryImage'] ?>" alt="<?= $row['Name'] ?>">
                </div>
                <div class="pitch-card-body">
                    <div>
                        <h3 class="pitch-card-title"><?= $row['Name'] ?></h3>
                        <p class="pitch-card-desc">£ <?= $row['Price'] ?></p>
                        <div class="pitch-time">
                            <img class="icon-sm" src="./assets/static/icons/calendar.svg" alt="calendar">
                            <span><?= $row['StartDate'] ?></span>
                            ~
                            <span><?= $row['EndDate'] ?></span>
                        </div>
                    </div>
                </div>
            </a>

            <?php
                    endwhile;
                }
                else {
                    echo "<span class='not-found-text col-span-3'>Sorry! We couldn't find any available pitch matching your search :(</span>";
                }
            ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>