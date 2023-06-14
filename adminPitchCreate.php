<?php 
    $title = "Admin Pitch";
    include('adminHeader.php');
    include('AutoID_Functions.php');

    if (isset($_POST['create'])) {
        $id = AutoID('Pitch', 'Id', 'P-', 6);
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

        $pitchImages = $_FILES['pitchImages']['name'];
        $pitchImagesTmp = $_FILES['pitchImages']['tmp_name'];
        $imgFolder = "assets/images/pitches/". $name . "/";
        if (!is_dir($imgFolder)) {
            mkdir($imgFolder, 0755, true);
        }
        $images = '';
        for ($i = 0; $i < count($pitchImages); $i++) {
            $images .= $imgFolder . $pitchImages[$i] . ',';
            $image = $imgFolder . $pitchImages[$i];
            $copy2 = copy($pitchImagesTmp[$i], $image);
            if (!$copy2) {
                echo "<script>alert('Cannot upload pitch image: $pitchImages[$i]')</script>";
                exit();
            }
        }

        echo $insert = "INSERT INTO Pitch (`Id`, `Name`, `PitchTypeId`, `SiteId`, `ActivityId`, `Price`, `StartDate`, `EndDate`, `Image`, `PrimaryImage`, `Description`, `IsFeatured`, `IsAvailable`) VALUES ('$id','$name', '$pitchType', '$site', '$activity', '$price', '$startDate', '$endDate', '$images', '$pitchPrimaryImageName', '$description', '$isFeatured', '$isAvailable')";
        $run = mysqli_query($connect, $insert);

        if ($run) {
            echo "<script>alert('Pitch created successfully')</script>";
            echo "<script>window.location='adminPitch.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in creating pitch')</script>";
        }
    }
?>

<main>
    <div class="admin-page-title">
        <h3>Create Pitch</h3>
    </div>
    <form action="adminPitchCreate.php" method="POST" class="admin-create-form admin-create-form-3"
        enctype="multipart/form-data">
        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Pitch name" required>
        </div>

        <div class="admin-input-form">
            <label for="isFeatured">Featured pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="1" name="isFeatured">
                    <span class="checkmark"></span>
                </label>
                <label class="custom-radio">No
                    <input type="radio" value="0" name="isFeatured" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Site price" required>
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
                    <option value="<?= $row1['Id'] ?>"><?= $row1['Name'] ?></option>
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
                    <option value="<?= $row2['Id'] ?>"><?= $row2['Name'] ?></option>
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
                    <option value="<?= $row3['Id'] ?>"><?= $row3['Name'] ?></option>
                    <?php
                        endwhile;
                    ?>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="startDate">Start date</label>
            <input type="date" name="startDate" id="startDate" placeholder="Pitch start date" required>
        </div>

        <div class="admin-input-form">
            <label for="endDate">End date</label>
            <input type="date" name="endDate" id="endDate" placeholder="Pitch end date" required>
        </div>

        <div class="admin-input-form">
            <label for="isAvailable">Available pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="1" name="isAvailable" checked>
                    <span class="checkmark"></span>
                </label>
                <label class="custom-radio">No
                    <input type="radio" value="0" name="isAvailable">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" rows="5" placeholder="Pitch descriptions" required></textarea>
        </div>

        <div class="admin-input-form">
            <label for="pitchPrimaryImage">Pitch primary image</label>
            <input type="file" name="pitchPrimaryImage" id="pitchPrimaryImage" accept="image/*"
                placeholder="Pitch primary image" required>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Primary image preview</span>
            <img title="image preview" id="pitchPrimaryChosenImage" src="./assets/static/images/no-image.jpg"
                alt="pitch primary image">
        </div>

        <div class="admin-input-form">
            <label for="pitchImages">Pitch image(s)</label>
            <input type="file" name="pitchImages[]" id="pitchImages" accept="image/*" placeholder="Pitch images"
                multiple required>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Primary image(s) preview</span>
            <div class="admin-chosen-image-list" id="pitchChosenImages">
                <img title="image preview" src="./assets/static/images/no-image.jpg" alt="pitch primary image">
            </div>
        </div>

        <button class="admin-submit-btn" name="create" type="submit">Create Pitch</button>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>