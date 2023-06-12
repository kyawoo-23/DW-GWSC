<?php 
    $title = "Admin Site";
    include('adminHeader.php');

    if (!isset($_GET['id'])) {
        echo "<script>window.location='adminSite.php'</script>";
    }
    $siteId = $_GET['id'];
    
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $location = $_POST['location'];
        $map = $_POST['map'];
        $description = $_POST['description'];
        $rules = $_POST['rules'];

        $image = $_FILES['image']['name'];

        if ($image === "") {
            $update = "UPDATE Site SET `Name`='$name',`Description`='$description',`Location`='$location',`Map`='$map',`Rules`='$rules' WHERE Id = '$siteId'";
        } else {
            $imgFolder = "assets/images/sites/" . $name . "/";
            if (!is_dir($imgFolder)) {
                mkdir($imgFolder, 0755, true); 
            }
        
            $imageName = $imgFolder . $image;
            $copy = copy($_FILES['image']['tmp_name'], $imageName);
            if (!$copy) {
                echo "<script>alert('Cannot upload image')</script>";
                exit();
            }
            $update = "UPDATE Site SET `Name`='$name',`Description`='$description',`Location`='$location',`Map`='$map',`Rules`='$rules',`Image`='$imageName' WHERE Id = '$siteId'";
        }
        $run = mysqli_query($connect, $update);
        
        if ($run) {
            $delete = "DELETE FROM Feature WHERE `SiteId` = '$siteId'";
            $run = mysqli_query($connect, $delete);

            $features = $_POST['features'];
            for ($i = 0; $i < count($features); $i++) {
                $feature = $features[$i];
                $updateFeature = "INSERT INTO Feature (`SiteId`, `FacilitiesId`) VALUES ('$siteId', '$feature')";
                $runInsertFeature = mysqli_query($connect, $updateFeature);

                if (!$runInsertFeature) {
                    echo "<script>alert('Failed to insert feature: $feature')</script>";
                }
            }
            echo "<script>alert('Site updated successfully')</script>";
            echo "<script>window.location='adminSite.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in updating site')</script>";
        }
    }
?>

<main>
    <div class="admin-page-title">
        <h3>Create Site</h3>
    </div>
    <form action="adminSiteDetails.php?id=<?= $siteId ?>" method="POST" class="admin-create-form admin-create-form-3"
        enctype="multipart/form-data">

        <?php
            $select = "SELECT * FROM Site WHERE `Id` = '$siteId'";
            $run = mysqli_query($connect, $select);
            while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
        ?>

        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Site name" value="<?= $row['Name'] ?>" required>
        </div>

        <div class="admin-input-form">
            <label for="location">Location</label>
            <div class="dropdown-gp">
                <select name="location" id="location">
                    <option value="Myanmar" <?php if ($row['Location'] === "Myanmar") echo "selected"?>>Myanmar</option>
                    <option value="Japan" <?php if ($row['Location'] === "Japan") echo "selected"?>>Japan</option>
                    <option value="South Korea" <?php if ($row['Location'] === "South Korea") echo "selected"?>>South
                        Korea</option>
                    <option value="Hong Kong" <?php if ($row['Location'] === "Hong Kong") echo "selected"?>>Hong Kong
                    </option>
                    <option value="United Kingdom" <?php if ($row['Location'] === "United Kingdom") echo "selected"?>>
                        United Kingdom</option>
                    <option value="Netherlands" <?php if ($row['Location'] === "Netherlands") echo "selected"?>>
                        Netherlands</option>
                    <option value="New Zealand" <?php if ($row['Location'] === "New Zealand") echo "selected"?>>New
                        Zealand</option>
                    <option value="Finland" <?php if ($row['Location'] === "Finland") echo "selected"?>>Finland</option>
                    <option value="Australia" <?php if ($row['Location'] === "Australia") echo "selected"?>>Australia
                    </option>
                    <option value="Canada" <?php if ($row['Location'] === "Canada") echo "selected"?>>Canada</option>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="map">Map</label>
            <input type="text" name="map" id="map" placeholder="Site map" value='<?= $row['Map'] ?>' required>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" rows="5" placeholder="Site descriptions"
                required><?= $row['Description'] ?></textarea>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="rules">Rules</label>
            <textarea name="rules" id="rules" rows="5" placeholder="Site rules" required><?= $row['Rules'] ?></textarea>
        </div>

        <div class="admin-input-form">
            <label for="siteImage">Site Image</label>
            <input type="file" name="image" id="siteImage" accept="image/*" placeholder="Site image">
        </div>

        <div class="col-span-2 chosen-img">
            <span class="img-preview">Image preview</span>
            <img title="image preview" id="siteChosenImg" src="<?= $row['Image'] ?>" alt="site image">
        </div>

        <?php
            endwhile;
        ?>

        <div class="col-span-3">
            <label for="">Features</label>
            <div class="admin-site-features">

                <?php
                    $selectedFacilities = array();
                    $select = "SELECT FacilitiesId FROM Feature WHERE `SiteId` = '$siteId'";
                    $featureRun = mysqli_query($connect, $select);

                    while ($featureRow = mysqli_fetch_array($featureRun, MYSQLI_ASSOC)) {
                        $selectedFacilities[] = $featureRow["FacilitiesId"];
                    }

                    $query = "SELECT * FROM Facilities";
                    $run = mysqli_query($connect, $query);
                    
                    while ($facilityRow = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
                        $facilityId = $facilityRow["Id"];
                        $facilityName = $facilityRow["Name"];
                        $isChecked = (in_array($facilityId, $selectedFacilities)) ? "checked" : "";

                ?>

                <div class="admin-site-feature">
                    <input class="checkbox" type="checkbox" id="<?= $facilityName ?>" name="features[]"
                        value="<?= $facilityId ?>" <?= $isChecked ?>>
                    <label for="<?= $facilityName ?>">
                        <?= $facilityName ?>
                    </label>
                </div>

                <?php
                    endwhile;
                ?>

            </div>
        </div>

        <button class="admin-submit-btn" name="update" type="submit">Update Site</button>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>