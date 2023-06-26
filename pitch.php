<?php 
    $title = "Pitches";
    include('header.php');

    $queryId = $_GET['q'];
    if($queryId !== 'all' && $queryId !== '1' && $queryId !== '2') {
        echo "<script>window.location='index.php'</script>";
    }
?>

<main>
    <section>
        <h2 class="section-title">Exciting pitches from us</h2>
        <div class="pitch-filter-container">
            <span>Filter</span>
            <div class="dropdown-gp">
                <select name="pitchFilter" id="pitchFilter">
                    <option value="all" <?= $queryId === 'all' ? 'selected' : '' ?>>See All</option>
                    <?php
                        $select = "SELECT * FROM Activity";
                        $run = mysqli_query($connect, $select);
                        while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
                    ?>
                    <option value="<?= $row['Id'] ?>" <?= $row['Id'] === $queryId ? 'selected' : '' ?>>
                        <?= $row['Name'] ?></option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
        </div>
        <div class="featured-pitch-list">
            <?php
                if ($queryId === 'all') {
                    $query = "SELECT * FROM Pitch WHERE IsAvailable = 1";
                } else {
                    $query = "SELECT * FROM Pitch WHERE ActivityId = '$queryId' AND IsAvailable = 1";
                }
                $run2 = mysqli_query($connect, $query);
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
            ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>

<script type="text/javascript">
$("#pitchFilter").change(function() {
    let value = $("#pitchFilter").val()
    window.location = `pitch.php?q=${value}`
})
</script>