<?php
$title = "Admin Pitch";
include('adminHeader.php');
include('AutoID_Functions.php');

$pitchId = $_GET['id'];
if ($pitchId == "") {
    echo "<script>window.location='adminPitch.php'</script>";
    exit();
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $isFeatured = $_POST['isFeatured'];
    $price = $_POST['price'];
    $site = $_POST['site'];
    $activity = $_POST['activity'];
    $pitchType = $_POST['pitchType'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $isAvailable = $_POST['isAvailable'];
    $description = $_POST['description'];

    $pitchPrimaryImage = $_FILES['pitchPrimaryImage']['name'];
    $pitchImages = $_FILES['pitchImages']['name'];

    if (empty($pitchPrimaryImage) && $pitchImages[0] === '') {
        // No images to update
        $updateQuery = "UPDATE Pitch SET `Name`='$name',`PitchTypeId`='$pitchType',`SiteId`='$site',`ActivityId`='$activity',`Price`='$price',`StartDate`='$startDate',`EndDate`='$endDate',`Description`='$description',`IsFeatured`='$isFeatured',`IsAvailable`='$isAvailable' WHERE Id = '$pitchId'";
    } elseif (empty($pitchPrimaryImage) && $pitchImages[0] === '') {
        // Only pitch images to update
        $imgFolder = "assets/images/pitches/" . $name . "/";
        if (!is_dir($imgFolder)) {
            mkdir($imgFolder, 0755, true);
        }

        $images = '';
        for ($i = 0; $i < count($pitchImages); $i++) {
            $image = $imgFolder . $pitchImages[$i];
            $copy2 = copy($_FILES['pitchImages']['tmp_name'][$i], $image);
            if (!$copy2) {
                echo "<script>alert('Cannot upload pitch image: $pitchImages[$i]')</script>";
                exit();
            }
            $images .= $image . ',';
        }

        $updateQuery = "UPDATE Pitch SET `Name`='$name',`PitchTypeId`='$pitchType',`SiteId`='$site',`ActivityId`='$activity',`Price`='$price',`StartDate`='$startDate',`EndDate`='$endDate',`Image`='$images',`Description`='$description',`IsFeatured`='$isFeatured',`IsAvailable`='$isAvailable' WHERE Id = '$pitchId'";
    } elseif (!empty($pitchPrimaryImage) && $pitchImages[0] === '') {
        // Only primary pitch image to update
        $primaryImgFolder = "assets/images/pitches/" . $name . "/primary/";
        if (!is_dir($primaryImgFolder)) {
            mkdir($primaryImgFolder, 0755, true);
        }

        $pitchPrimaryImageName = $primaryImgFolder . $pitchPrimaryImage;
        $copy1 = copy($_FILES['pitchPrimaryImage']['tmp_name'], $pitchPrimaryImageName);
        if (!$copy1) {
            echo "<script>alert('Cannot upload pitch primary image')</script>";
            exit();
        }

        $updateQuery = "UPDATE Pitch SET `Name`='$name',`PitchTypeId`='$pitchType',`SiteId`='$site',`ActivityId`='$activity',`Price`='$price',`StartDate`='$startDate',`EndDate`='$endDate',`PrimaryImage`='$pitchPrimaryImageName',`Description`='$description',`IsFeatured`='$isFeatured',`IsAvailable`='$isAvailable' WHERE Id = '$pitchId'";
    } else {
        // Both pitch primary image and images to update
        $primaryImgFolder = "assets/images/pitches/" . $name . "/primary/";
        if (!is_dir($primaryImgFolder)) {
            mkdir($primaryImgFolder, 0755, true);
        }

        $pitchPrimaryImageName = $primaryImgFolder . $pitchPrimaryImage;
        $copy1 = copy($_FILES['pitchPrimaryImage']['tmp_name'], $pitchPrimaryImageName);
        if (!$copy1) {
            echo "<script>alert('Cannot upload pitch primary image')</script>";
            exit();
        }

        $imgFolder = "assets/images/pitches/" . $name . "/";
        if (!is_dir($imgFolder)) {
            mkdir($imgFolder, 0755, true);
        }

        $images = '';
        for ($i = 0; $i < count($pitchImages); $i++) {
            $image = $imgFolder . $pitchImages[$i];
            $copy2 = copy($_FILES['pitchImages']['tmp_name'][$i], $image);
            if (!$copy2) {
                echo "<script>alert('Cannot upload pitch image: $pitchImages[$i]')</script>";
                exit();
            }
            $images .= $image . ',';
        }

        $updateQuery = "UPDATE Pitch SET `Name`='$name',`PitchTypeId`='$pitchType',`SiteId`='$site',`ActivityId`='$activity',`Price`='$price',`StartDate`='$startDate',`EndDate`='$endDate',`Image`='$images',`PrimaryImage`='$pitchPrimaryImageName',`Description`='$description',`IsFeatured`='$isFeatured',`IsAvailable`='$isAvailable' WHERE Id = '$pitchId'";
    }

    $run = mysqli_query($connect, $updateQuery);

    if ($run) {
        echo "<script>alert('Pitch updated successfully')</script>";
        echo "<script>window.location='adminPitch.php'</script>";
        exit();
    } else {
        echo "<script>alert('Something went wrong in updating pitch')</script>";
        exit();
    }
}
?>

<main>
    <div class="admin-page-title">
        <h3>Update Pitch [<?= $pitchId ?>]</h3>
    </div>
    <form action="adminPitchDetails.php?id=<?= $pitchId ?>" method="POST" class="admin-create-form admin-create-form-3"
        enctype="multipart/form-data">
        <?php
            $query = "SELECT * FROM Pitch WHERE Id = '$pitchId'";
            $run = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($run)) :
        ?>
        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Pitch name" value="<?= $row['Name'] ?>" required>
        </div>

        <div class="admin-input-form">
            <label for="isFeatured">Featured pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="1" name="isFeatured" <?= $row['IsFeatured'] === '1' ? 'checked' : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <label class="custom-radio">No
                    <input type="radio" value="0" name="isFeatured" <?= $row['IsFeatured'] === '0' ? 'checked' : '' ?>>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Site price" value="<?= $row['Price'] ?>" required>
        </div>

        <div class="admin-input-form">
            <label for="site">Site</label>
            <div class="dropdown-gp">
                <select name="site" id="site">
                    <?php
                        $select1 = "SELECT * FROM Site";
                        $run1 = mysqli_query($connect, $select1);
                        while($row1 = mysqli_fetch_array($run1)) :
                    ?>
                    <option value="<?= $row1['Id'] ?>" <?= $row['SiteId'] === $row1['Id'] ? 'selected' : '' ?>>
                        <?= $row1['Name'] ?></option>
                    <?php 
                        endwhile;
                    ?>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="activity">Activity</label>
            <div class="dropdown-gp">
                <select name="activity" id="activity">
                    <?php
                        $select2 = "SELECT * FROM Activity";
                        $run2 = mysqli_query($connect, $select2);
                        while($row2 = mysqli_fetch_array($run2)) :
                    ?>
                    <option value="<?= $row2['Id'] ?>" <?= $row['ActivityId'] === $row2['Id'] ? 'selected' : '' ?>>
                        <?= $row2['Name'] ?></option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="pitchType">Pitch type</label>
            <div class="dropdown-gp">
                <select name="pitchType" id="pitchType">
                    <?php
                        $select3 = "SELECT * FROM PitchType";
                        $run3 = mysqli_query($connect, $select3);
                        while($row3 = mysqli_fetch_array($run3)) :
                    ?>
                    <option value="<?= $row3['Id'] ?>" <?= $row['PitchTypeId'] === $row3['Id'] ? 'selected' : '' ?>>
                        <?= $row3['Name'] ?></option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="startDate">Start date</label>
            <input type="date" name="startDate" id="startDate" placeholder="Pitch start date"
                value="<?= $row['StartDate'] ?>" required>
        </div>

        <div class="admin-input-form">
            <label for="endDate">End date</label>
            <input type="date" name="endDate" id="endDate" placeholder="Pitch end date" value="<?= $row['EndDate'] ?>"
                required>
        </div>

        <div class="admin-input-form">
            <label for="isAvailable">Available pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="1" name="isAvailable"
                        <?= $row['IsAvailable'] === '1' ? 'checked' : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <label class="custom-radio">No
                    <input type="radio" value="0" name="isAvailable"
                        <?= $row['IsAvailable'] === '0' ? 'checked' : '' ?>>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" rows="5" placeholder="Pitch descriptions"
                required><?= $row['Description'] ?></textarea>
        </div>

        <div class="admin-input-form">
            <label for="pitchPrimaryImage">Pitch primary image</label>
            <input type="file" name="pitchPrimaryImage" id="pitchPrimaryImage" accept="image/*"
                placeholder="Pitch primary image">
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Primary image preview</span>
            <img title="image preview" id="pitchPrimaryChosenImage" src="<?= $row['PrimaryImage'] ?>"
                alt="pitch primary image">
        </div>

        <div class="admin-input-form">
            <label for="pitchImages">Pitch image(s)</label>
            <input type="file" name="pitchImages[]" id="pitchImages" accept="image/*" placeholder="Pitch images"
                multiple>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Primary image(s) preview</span>
            <div class="admin-chosen-image-list" id="pitchChosenImages">
                <?php
                    $imageList = explode(',', $row['Image']);
                    for ($i=0; $i < count($imageList); $i++) { 
                ?>
                <img title="image preview" src="<?= $imageList[$i] ?>" alt="pitch primary image">
                <?php
                    }
                ?>
            </div>
        </div>

        <button class="admin-submit-btn" name="update" type="submit">Update Pitch</button>

        <?php
            endwhile;
        ?>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>