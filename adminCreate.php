<?php 
    $title = "Admin";
    include('adminHeader.php');
    
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['userPassword1'];

        $checkEmail = "SELECT * FROM Admin WHERE Email = '$email'";
        $result = mysqli_query($connect, $checkEmail);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email already exist! Please sign up with another email address')</script>";
            echo "<script>window.location.href = window.location.href</script>";
        }
        else {
            $imgFolder = "assets/images/admin/" . $name . "/";
            if (!is_dir($imgFolder)) {
                mkdir($imgFolder, 0755, true); 
            }

            $image = $_FILES['userPic']['name'];
            $imageName = $imgFolder . $image;
            $copy = copy($_FILES['userPic']['tmp_name'], $imageName);
            if (!$copy) {
                echo "<script>alert('Cannot upload image')</script>";
                exit();
            }

            $insert = "INSERT INTO Admin (`Name`, `Email`, `Password`, `Image`) VALUES ('$name', '$email', '$password', '$imageName')";
            $run = mysqli_query($connect, $insert);
            if ($run) {
                echo "<script>alert('Account created successfully')</script>";
                $_SESSION['adminId'] = $connect->insert_id;
                echo "<script>window.location='adminBooking.php'</script>";
            } 
            else {
                echo "<script>alert('Something went wrong in registering account')</script>";
            }
        }
    }
?>

<main>
    <div class="login-container">
        <form action="adminCreate.php" method="POST" class="signup-form" enctype="multipart/form-data">
            <div>
                <h2>Admin account registeration</h2>
            </div>
            <div class="signup-row">
                <div class="input-block">
                    <input type="text" class="admin" name="name" required spellcheck="false" />
                    <span class="placeholder">Name</span>
                </div>
                <div class="input-block">
                    <input type="email" name="email" class="login-email admin" placeholder="Please input email address"
                        required spellcheck="false" />
                    <span class="placeholder">Email address</span>
                </div>
            </div>

            <div class="signup-row">
                <div class="input-block">
                    <input type="password" class="admin" name="userPassword1" id="passwordInput" required
                        spellcheck="false" />
                    <span class="placeholder">Password</span>
                    <img class="password-toggle-icon" src="./assets/static/icons/eye-slash.svg" alt="eye slash"
                        id="passwordToggle">
                </div>
                <div class="input-block">
                    <input type="password" class="admin" name="userPassword2" id="passwordInput2" required
                        spellcheck="false" />
                    <span class="placeholder">Confirm password</span>
                    <img class="password-toggle-icon" src="./assets/static/icons/eye-slash.svg" alt="eye slash"
                        id="passwordToggle2">
                </div>
            </div>

            <div class="signup-row pwd-no-match" id="pwdNoMatch">
                <span>Your passwords do not match. Please enter your password again to confirm it.</span>
            </div>

            <div class="signup-row">
                <div class="input-file">
                    <label for="userPic">Profile picture</label>
                    <input type="file" accept="image/*" name="userPic" id="userPic" required spellcheck="false" />
                </div>
            </div>

            <div class="signup-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" name="register" type="submit" id="registerBtn">Register</button>
            </div>

        </form>
    </div>
</main>

<?php 
    include('adminFooter.php');
    ?>
<script type="text/javascript" src="./assets/js/password-toggle.js" defer></script>