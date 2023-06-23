<?php 
    $title = "Admin Profile";
    include('adminHeader.php');

    if (!isset($_GET['id'])) {
        echo "<script>window.location='adminBooking.php'</script>";
    }

    $id = $_GET['id'];

    if (isset($_POST['update'])) { 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['userPassword1'];

        $image = $_FILES['userPic']['name'];

        if ($image === "") {
            $update = "UPDATE Admin SET `Name`='$name', `Email`='$email', `Password`='$password' WHERE Id = '$id'";
        }
        else {
            $imgFolder = "assets/images/admin/" . $name . "/";
            if (!is_dir($imgFolder)) {
                mkdir($imgFolder, 0755, true); 
            }
            $imageName = $imgFolder . $image;
            $copy = copy($_FILES['userPic']['tmp_name'], $imageName);
            if (!$copy) {
                echo "<script>alert('Cannot upload image')</script>";
                exit();
            }

            $update = "UPDATE Admin SET `Name`='$name', `Email`='$email', `Password`='$password', `Image`='$imageName' WHERE Id = '$id'";
        }
        $run = mysqli_query($connect, $update);
                    
        if ($run) {
            echo "<script>alert('Account updated successfully')</script>";
            echo "<script>window.location='admin.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in updating account details')</script>";
        }
    }
?>

<main>
    <div class="login-container">
        <form action="adminProfile.php?id=<?= $id ?>" method="POST" class="signup-form" enctype="multipart/form-data">
            <div>
                <h2>Profile details</h2>
            </div>

            <?php
                $getUser = "SELECT * FROM Admin WHERE Id = '$id'";
                $run = mysqli_query($connect, $getUser);
                $row = mysqli_fetch_array($run);
            ?>

            <div class="signup-row">
                <img class="profile-pic admin" src="<?= $row['Image'] ?>" alt="<?= $row['Name'] ?>">
            </div>

            <div class="signup-row">
                <div class="input-block">
                    <input type="text" name="name" class="admin" value="<?= $row['Name'] ?>" required
                        spellcheck="false" />
                    <span class="placeholder">Name</span>
                </div>
                <div class="input-block">
                    <input type="email" name="email" class="admin" value="<?= $row['Email'] ?>" required
                        spellcheck="false" />
                    <span class="placeholder">Email</span>
                </div>
            </div>

            <div class="signup-row">
                <div class="input-block">
                    <input type="password" name="userPassword1" class="admin" value="<?= $row['Password'] ?>"
                        id="passwordInput" required spellcheck="false" />
                    <span class="placeholder">Password</span>
                    <img class="password-toggle-icon" src="./assets/static/icons/eye-slash.svg" alt="eye slash"
                        id="passwordToggle">
                </div>
                <div class="input-file">
                    <input type="file" accept="image/*" name="userPic" id="userPic" spellcheck="false" />
                </div>
            </div>

            <div class="signup-btn-gp">
                <button class="btn btn-login" name="update" type="submit">Update</button>
            </div>
        </form>
    </div>
</main>

<?php 
    include('adminFooter.php');
?>