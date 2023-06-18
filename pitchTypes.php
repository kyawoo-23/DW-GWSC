<?php 
    $title = "Pitch types";
    include('header.php');
?>

<main>
    <section>
        <div class="pitch-type-search">
            <h2 class="section-title">Available Pitch types</h2>

            <div class="container">
                <input type="text" name="text" class="input" placeholder="Search pitch...">
                <button class="search__btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="22" height="22">
                        <path
                            d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"
                            fill="#efeff1"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="features-list">
            <?php
                $select = "SELECT * FROM PitchType";
                $run = mysqli_query($connect, $select);
                while($row = mysqli_fetch_array($run)) :
            ?>
            <div class="feature-item">
                <img src="./assets/static/icons/<?= $row['Name'] ?>.svg" alt="<?= $row['Name'] ?>">
                <span><?= $row['Name'] ?></span>
            </div>
            <?php
                endwhile;
            ?>
        </div>

        <br />

        <?php
            $select2 = "SELECT GROUP_CONCAT(pitch.id) AS PitchIds, pitchtype.* 
                        FROM pitchtype 
                        INNER JOIN pitch ON pitch.PitchTypeId = pitchtype.id 
                        GROUP BY pitchtype.id";
            $run2 = mysqli_query($connect, $select2);
            while($row2 = mysqli_fetch_array($run2)) :
        ?>
        <h2 class="section-title feature">Pitch with <?= $row2['Name'] ?> type <img
                src="./assets/static/icons/<?= $row2['Name'] ?>.svg" alt=""></h2>

        <div class="featured-pitch-list">
            <?php
                $pitchIds = explode(',', $row2['PitchIds']);
                foreach ($pitchIds as $pitchId) {
                    $getPitch = "SELECT * FROM Pitch WHERE Id = '$pitchId' AND IsAvailable = 1";
                    $run3 = mysqli_query($connect, $getPitch);
                    while($row3 = mysqli_fetch_array($run3)) :
            ?>

            <div class="pitch-card">
                <div class="pitch-card-img">
                    <img src="<?= $row3['PrimaryImage'] ?>" alt="<?= $row3['Name'] ?>">
                </div>
                <div class="pitch-card-body">
                    <div>
                        <h3 class="pitch-card-title"><?= $row3['Name'] ?></h3>
                        <p class="pitch-card-desc"><?= $row3['Description'] ?></p>
                    </div>
                    <a class="btn btn-white" href="pitchDetails.php?id=<?= $row3['Id'] ?>">Details</a>
                </div>
            </div>

            <?php
                    endwhile;
                }
            ?>
        </div>

        <br />
        <br />
        <?php
            endwhile;
        ?>

    </section>
</main>

<?php 
    include('footer.php');
?>