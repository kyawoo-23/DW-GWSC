<?php 
    $title = "Admin Local Attraction";
    include('adminHeader.php');

    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $siteId = $_POST['site'];
        $description = $_POST['description'];

        $imgFolder = "assets/images/local-attractions/" . $name . "/";
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

        $insert = "INSERT INTO Localattraction (`SiteId`, `Name`, `Description`, `Image`) VALUES ('$siteId', '$name', '$description', '$imageName')";
        $run = mysqli_query($connect, $insert);
        
        if ($run) {
            echo "<script>alert('Local-attraction created successfully')</script>";
            echo "<script>window.location='adminLocalAttraction.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong while creating local attraction')</script>";
        }
    }
?>

<main>
    <div class="admin-page-title">
        <h3>Create Local Attraction</h3>
    </div>
    <form action="adminLocalAttractionCreate.php" method="POST" class="admin-create-form admin-create-form-3"
        enctype="multipart/form-data">
        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Local attraction name" required>
        </div>

        <div class="admin-input-form">
            <label for="site">Site</label>
            <div class="dropdown-gp">
                <select name="site" id="site">
                    <?php
                        $query = "SELECT * FROM Site";
                        $run = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
                    ?>
                    <option value="<?= $row['Id'] ?>"><?= $row['Name'] ?></option>
                    <?php 
                        endwhile;
                    ?>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="description">Descriptions</label>
            <input type="text" name="description" id="description" placeholder="Local attraction description" required>
        </div>

        <div class="admin-input-form">
            <label for="attractionImage">Local attraction image</label>
            <input type="file" name="image" id="attractionImage" accept="image/*" placeholder="Local attraction image"
                required>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Image preview</span>
            <img title="image preview" id="attractionChoseImage" src="./assets/static/images/no-image.jpg"
                alt="local attraction image">
        </div>

        <button class="admin-submit-btn" name="create" type="submit">Create Local Attraction</button>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>