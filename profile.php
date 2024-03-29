<?php 
    $title = "Profile";
    include('header.php');

    if (!isset($cusId)) {
        echo "<script>window.location='index.php'</script>";
    }

    if (isset($_POST['update'])) { 
        $first = $_POST['userFirstName'];
        $sur = $_POST['userSurName'];
        $email = $_POST['userEmail'];
        $phone = $_POST['userPhone'];
        $address = $_POST['address'];
        $password = $_POST['userPassword1'];

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
        }
        else {
            $image = $_FILES['userPic']['name'];
            
            if ($image === "") {
                $update = "UPDATE Customer SET `FirstName`='$first',`SurName`='$sur',`Email`='$email',`Password`='$password',`Phone`='$phone',`Address`='$address' WHERE Id = '$cusId'";
            }
            else {
                $imgFolder = "assets/images/users/" . $first . $sur . "/";
                if (!is_dir($imgFolder)) {
                    mkdir($imgFolder, 0755, true); 
                }
                $imageName = $imgFolder . $image;
                $copy = copy($_FILES['userPic']['tmp_name'], $imageName);
                if (!$copy) {
                    echo "<script>alert('Cannot upload image')</script>";
                    exit();
                }

                $update = "UPDATE Customer SET `FirstName`='$first',`SurName`='$sur',`Email`='$email',`Password`='$password',`Phone`='$phone',`Address`='$address',`Image`='$imageName' WHERE Id = '$cusId'";
            }
            $run = mysqli_query($connect, $update);
                        
            if ($run) {
                echo "<script>alert('Account updated successfully')</script>";
                echo "<script>window.location='index.php'</script>";
            } 
            else {
                echo "<script>alert('Something went wrong in updating account details')</script>";
            }
        }
    }
?>

<main>
    <div class="login-container">
        <form action="profile.php" method="POST" class="signup-form" enctype="multipart/form-data">
            <?php
                $query = "SELECT * FROM Customer WHERE Id = '$cusId'";
                $run = mysqli_query($connect, $query);
                while($row = mysqli_fetch_array($run)) :
            ?>
            <div>
                <h2>Profile details</h2>
            </div>

            <div class="signup-row">
                <img class="profile-pic" src="<?= $row['Image'] ?>" alt="<?= $row['FirstName'] ?>">
            </div>

            <div class="signup-row">
                <div class="input-block">
                    <input type="text" name="userFirstName" value="<?= $row['FirstName'] ?>" required
                        spellcheck="false" />
                    <span class="placeholder">First name</span>
                </div>
                <div class="input-block">
                    <input type="text" name="userSurName" value="<?= $row['SurName'] ?>" required spellcheck="false" />
                    <span class="placeholder">Sur name</span>
                </div>
            </div>
            <div class="signup-row">
                <div class="input-block">
                    <input type="email" name="userEmail" value="<?= $row['Email'] ?>" required spellcheck="false" />
                    <span class="placeholder">Email address</span>
                </div>
                <div class="input-block">
                    <input type="tel" name="userPhone" value="<?= $row['Phone'] ?>" required spellcheck="false" />
                    <span class="placeholder">Phone</span>
                </div>
            </div>
            <div class="signup-row address">
                <div class="input-block address">
                    <textarea name="address" class="login-email address" placeholder="Please input email address"
                        required spellcheck="false" rows="5"><?= $row['Address'] ?></textarea>
                    <span class="placeholder">Address</span>
                </div>
            </div>
            <div class="signup-row">
                <div class="input-block">
                    <input type="password" name="userPassword1" value="<?= $row['Password'] ?>" id="passwordInput"
                        required spellcheck="false" />
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

            <?php 
                endwhile;
            ?>
        </form>
    </div>
</main>

<?php 
    include('footer.php');
?>