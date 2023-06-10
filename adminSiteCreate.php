<?php 
    $title = "Admin Site";
    include('adminHeader.php');

    if (isset($_POST['create'])) {
        $features = $_POST['features'];
        for($i=0; $i < count($features); $i++)
        {
            echo($features[$i] . " ");
        }
    }
?>

<main>
    <div class="admin-page-title">
        <h3>Create Site</h3>
    </div>
    <form action="adminSiteCreate.php" method="POST" class="admin-create-form admin-create-form-3">
        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Site name" required>
        </div>

        <div class="admin-input-form">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" placeholder="Site location" required>
        </div>

        <div class="admin-input-form">
            <label for="map">Map</label>
            <input type="text" name="map" id="map" placeholder="Site map" required>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" rows="5" placeholder="Site descriptions" required></textarea>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="rules">Rules</label>
            <textarea name="rules" id="rules" rows="5" placeholder="Site rules" required></textarea>
        </div>

        <div class="admin-input-form">
            <label for="siteImage">Site Image</label>
            <input type="file" name="image" id="siteImage" accept="image/*" placeholder="Site image" required>
        </div>

        <div class="col-span-2 chosen-img">
            <span class="img-preview">Image preview</span>
            <img title="image preview" id="siteChosenImg" src="./assets/static/images/no-image.jpg" alt="site image">
        </div>

        <div class="col-span-3">
            <label for="">Features</label>
            <div class="admin-site-features">
                <?php
                    $query = "SELECT * FROM Facilities";
                    $run = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
                ?>

                <div class="admin-site-feature">
                    <input class="checkbox" type="checkbox" id="<?= $row["Name"] ?>" name="features[]"
                        value="<?= $row["Id"] ?>">
                    <label for="<?= $row["Name"] ?>">
                        <?= $row["Name"] ?>
                    </label>
                </div>

                <?php
                    endwhile;
                ?>
            </div>
        </div>

        <button class="admin-submit-btn" name="create" type="submit">Create Site</button>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>