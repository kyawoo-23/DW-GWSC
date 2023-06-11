<?php 
    $title = "Admin Site";
    include('adminHeader.php');

    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $map = $_POST['map'];
        $description = $_POST['description'];
        $rules = $_POST['rules'];

        $imgFolder = "assets/images/sites/" . $name . "/";
        if (!is_dir($imgFolder)) {
            mkdir($imgFolder, 0755, true); 
        }

        $image = $_FILES['image']['name'];
        $imageName = $imgFolder . $image;
        $copy = copy($_FILES['image']['tmp_name'], $imageName);
        if (!$copy) {
            echo "<script>alert('Cannot upload image')</script>";
            exit();
        }

        $insert = "INSERT INTO Site (`Name`, `Description`, `Location`, `Map`, `Rules`, `Image`) VALUES ('$name', '$description', '$location', '$map', '$rules', '$imageName')";
        $run = mysqli_query($connect, $insert);
        
        if ($run) {
            $siteId = $connect->insert_id;
            $features = $_POST['features'];
            for ($i = 0; $i < count($features); $i++) {
                $feature = $features[$i];
                $insertFeature = "INSERT INTO Feature (`SiteId`, `FacilitiesId`) VALUES ('$siteId', '$feature')";
                $runInsertFeature = mysqli_query($connect, $insertFeature);

                if (!$runInsertFeature) {
                    echo "<script>alert('Failed to insert feature: $feature')</script>";
                }
            }
            echo "<script>alert('Site created successfully')</script>";
            echo "<script>window.location='adminSite.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in creating site')</script>";
        }
    }
?>

<main>
    <div class="admin-page-title">
        <h3>Create Site</h3>
    </div>
    <form action="adminSiteCreate.php" method="POST" class="admin-create-form admin-create-form-3"
        enctype="multipart/form-data">
        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Site name" required>
        </div>

        <div class="admin-input-form">
            <label for="location">Location</label>
            <div class="dropdown-gp">
                <select name="location" id="location">
                    <option value="Myanmar" selected>Myanmar</option>
                    <option value="Japan">Japan</option>
                    <option value="South Korea">South Korea</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Finland">Finland</option>
                    <option value="Australia">Australia</option>
                    <option value="Canada">Canada</option>
                </select>
            </div>
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