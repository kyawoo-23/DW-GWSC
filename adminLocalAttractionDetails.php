<?php 
    $title = "Admin Local Attraction";
    include('adminHeader.php');

    $attractionId = isset($_GET['id']);
    if ($attractionId == "") {
        echo "<script>window.location='adminLocalAttraction.php'</script>";
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $site = $_POST['site'];
        $description = $_POST['description'];

        $image = $_FILES['image']['name'];

        if ($image === "") {
            $update = "UPDATE LocalAttraction SET `Name`='$name', `Site`='$site',`Description`='$description' WHERE Id = '$attractionId'";
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
            $update = "UPDATE LocalAttraction SET `Name`='$name', `Site`='$site',`Description`='$description',`Image`='$imageName' WHERE Id = '$attractionId'";
        }
        $run = mysqli_query($connect, $update);
        
        if ($run) {
            echo "<script>alert('Local attraction updated successfully')</script>";
            echo "<script>window.location='adminLocalAttraction.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in updating local-attraction')</script>";
        }
    }
?>

<main>
    <div class="admin-page-title">
        <h3>Create Local Attraction</h3>
    </div>
    <form action="adminLocalAttractionDetails.php" method="POST" class="admin-create-form admin-create-form-3"
        enctype="multipart/form-data">

        <?php
            echo$query = "SELECT * FROM LocalAttraction WHERE Id = '$attractionId'";
            $run = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)) :
        ?>

        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Local attraction name" value="<?= $row['Name'] ?>"
                required>
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
            <input type="text" name="description" id="description" placeholder="Local attraction description"
                value="<?= $row['Description'] ?>" required>
        </div>

        <div class="admin-input-form">
            <label for="attractionImage">Local attraction image</label>
            <input type="file" name="image" id="attractionImage" accept="image/*" placeholder="Local attraction image"
                required>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Image preview</span>
            <img title="image preview" id="attractionChoseImage" src="<?= $row['Image'] ?>"
                alt="local attraction image">
        </div>

        <button class="admin-submit-btn" name="update" type="submit">Create Local Attraction</button>

        <?php 
            endwhile;
        ?>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>