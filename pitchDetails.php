<?php 
    $title = "Pitch Details";
    include('header.php');

    $pitchId = $_GET['id'];
    if ($pitchId == "") {
        echo "<script>window.location='adminPitch.php'</script>";
        exit();
    }
?>

<main>
    <section>
        <?php
            $query = "SELECT Pitch.Id AS PitchId, Pitch.Name AS PitchName, Pitch.Description AS PitchDesc, Pitch.PrimaryImage AS PrimaryImage, Pitch.Image AS PitchImage, Pitch.Price, Pitch.StartDate, Pitch.EndDate, Activity.Name AS ActivityName, Activity.Id AS ActivityId, PitchType.Name AS PitchTypeName, PitchType.Id AS PitchTypeId, Site.Id AS SiteId, Site.Name AS SiteName, Site.Location AS SiteLocation FROM Pitch
                INNER JOIN Activity ON Pitch.ActivityId = Activity.Id
                INNER JOIN PitchType ON Pitch.PitchTypeId = PitchType.Id
                INNER JOIN Site ON Pitch.SiteId = Site.Id
                WHERE Pitch.Id = '$pitchId'";
            $run = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_array($run)) :
        ?>

        <h2 class="section-title"><?= $row['SiteLocation'] . ' / ' . $row['PitchName'] ?></h2>

        <div class="site-banner">
            <img src="<?= $row['PrimaryImage'] ?>" alt="<?= $row['PitchName'] ?>">
        </div>

        <div class="pitch-description">
            <h3>About</h3>
            <p><?= $row['PitchDesc'] ?></p>

            <h3>Pitch type</h3>
            <div class="pitch-type-item">
                <img src="./assets/static/icons/<?= $row['PitchTypeName'] ?>.svg" alt="<?= $row['PitchTypeName'] ?>">
                <span><?= $row['PitchTypeName'] ?></span>
            </div>

            <h3>Features</h3>
            <div class="pitch-features">
                <?php
                    $getFeat = "SELECT Facilities.Name FROM Feature INNER JOIN Facilities ON Feature.FacilitiesId = Facilities.Id WHERE SiteId = '$row[SiteId]'";
                    $run2 = mysqli_query($connect, $getFeat);
                    while($row2 = mysqli_fetch_array($run2)) :
                ?>
                <div class="pitch-feature-item">
                    <img src="./assets/static/icons/<?= $row2['Name'] ?>.svg" alt="<?= $row2['Name'] ?>">
                    <span><?= $row2['Name'] ?></span>
                </div>
                <?php
                    endwhile;
                ?>
            </div>
        </div>

        <div class="pitch-details">
            <div class="pitch-gallery">
                <?php
                    $imageList = explode(',', $row['PitchImage']);
                    for ($i=0; $i < (count($imageList) - 1); $i++) { 
                ?>
                <img src="<?= $imageList[$i] ?>" alt="<?= $row['PitchName'] ?>">
                <?php
                    }
                ?>
            </div>
            <div class="pitch-booking">
                <form action="booking.php">
                    <h4>Booking form</h4>
                    <div class="booking-form-header">
                        <h3><?= $row['PitchName'] ?> <small>(<?= $row['PitchId'] ?>) | <?= $row['SiteName'] ?></small>
                        </h3>
                    </div>

                    <div class="admin-input-form customer">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Your email address" required>
                    </div>

                    <div class="admin-input-form customer">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="Your phone number" required>
                    </div>

                    <div class="admin-input-form customer headcount">
                        <div>
                            <label for="headCount">Head count</label>
                            <input type="number" min='1' name="headCount" id="headCount" value="1" required>
                        </div>
                        <div>
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" data-price="<?= $row['Price'] ?>"
                                value="<?= $row['Price'] ?>" readonly required>
                        </div>
                    </div>

                    <div class="admin-input-form customer">
                        <label for="remark">Remark</label>
                        <textarea name="remark" id="remark" placeholder="Your remark"></textarea>
                    </div>
                </form>
            </div>
        </div>

        <?php
            endwhile;
        ?>
    </section>
</main>

<?php 
    include('footer.php');
?>

<script type="text/javascript">
$("#headCount").on("keydown", function(evt) {
    var key = evt.key || evt.keyCode || evt.which;
    if (key === "Backspace" || key === "Delete") {
        evt.preventDefault();
        return false;
    }
    evt.preventDefault();
    return false;
});


$("#headCount").change(function() {
    let value = $("#headCount").val()
    let price = $("#price").data('price')
    console.log(price)
    $("#price").val(value * price)
})
</script>