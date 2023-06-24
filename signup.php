<?php 
    $title = "Sign up";
    include('header.php');

    if ($cusId) {
        echo "<script>window.location='index.php'</script>";
        exit();
    }

    if (isset($_SESSION['loginFail']) && $_SESSION['loginFail'] === "yes") {
        echo "<script>window.location='timer.php'</script>";
        exit();
    }

    if (isset($_POST['register'])) {
        $first = $_POST['userFirstName'];
        $sur = $_POST['userSurName'];
        $email = $_POST['userEmail'];
        $phone = $_POST['userPhone'];
        $address = $_POST['address'];
        $password = $_POST['userPassword1'];

        $checkEmail = "SELECT * FROM Customer WHERE Email = '$email'";
        $result = mysqli_query($connect, $checkEmail);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email already exist! Please sign up with another email address')</script>";
            echo "<script>window.location.href = window.location.href</script>";
        }
        else {
            $imgFolder = "assets/images/users/" . $first . ' ' . $sur . "/";
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

            $insert = "INSERT INTO Customer (`FirstName`, `SurName`, `Email`, `Password`, `Phone`, `Address`, `Image`, `ViewCount`) VALUES ('$first', '$sur', '$email', '$password', '$phone', '$address', '$imageName', 1)";
            $run = mysqli_query($connect, $insert);
            if ($run) {
                echo "<script>alert('Account created successfully')</script>";
                $_SESSION['cusId'] = $connect->insert_id;
                echo "<script>window.location='index.php'</script>";
            } 
            else {
                echo "<script>alert('Something went wrong in registering account')</script>";
            }
        }
    }
?>

<main>
    <div class="login-container">
        <form action="signup.php" method="POST" class="signup-form" enctype="multipart/form-data">
            <div>
                <h2>Create Account</h2>
                <p>Sign up to GWSC!</p>
            </div>
            <div class="signup-row">
                <div class="input-block">
                    <input type="text" name="userFirstName" required spellcheck="false" />
                    <span class="placeholder">First name</span>
                </div>
                <div class="input-block">
                    <input type="text" name="userSurName" required spellcheck="false" />
                    <span class="placeholder">Sur name</span>
                </div>
            </div>
            <div class="signup-row">
                <div class="input-block">
                    <input type="email" name="userEmail" class="login-email" placeholder="Please input email address"
                        required spellcheck="false" />
                    <span class="placeholder">Email address</span>
                </div>
                <div class="input-block">
                    <input type="tel" name="userPhone" required spellcheck="false" />
                    <span class="placeholder">Phone</span>
                </div>
            </div>
            <div class="signup-row address">
                <div class="input-block address">
                    <textarea name="address" class="login-email address" placeholder="Please input email address"
                        required spellcheck="false" rows="5"></textarea>
                    <span class="placeholder">Address</span>
                </div>
            </div>
            <div class="signup-row">
                <div class="input-block">
                    <input type="password" name="userPassword1" id="passwordInput" required spellcheck="false" />
                    <span class="placeholder">Password</span>
                    <img class="password-toggle-icon" src="./assets/static/icons/eye-slash.svg" alt="eye slash"
                        id="passwordToggle">
                </div>
                <div class="input-block">
                    <input type="password" name="userPassword2" id="passwordInput2" required spellcheck="false" />
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

            <div class="signup-row captcha">
                <div class="captchaContainer">
                    <div class="captchaWrapper">
                        <button type="button" class="captchaBox boxHover"></button>
                    </div>
                    <input type="checkbox" name="hiddenCaptcha" id="hiddenCaptcha" disabled="disabled" />
                    <label for="hiddenCaptcha" class="captchaLabel">I'm not a robot</label>
                    <img class="recaptcha-logo" src="./assets/static/images/RecaptchaLogo.png" alt="RecaptchaLogo" />
                </div>
            </div>

            <div class="signup-row privacy">
                By signing up you agree to our <a class="book-btn-link" href="privacyPolicy.php">Privacy
                    policy</a>
            </div>

            <div class="signup-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" name="register" type="submit" id="registerBtn">Register</button>
            </div>

            <div class="no-account">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </form>
    </div>
</main>

<?php 
    include('footer.php');
?>

<script type="text/javascript" src="./assets/js/sign-up.js" defer></script>