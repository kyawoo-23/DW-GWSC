<?php 
    $title = "Sign up";
    include('header.php');
?>

<main>
    <div class="login-container">
        <!-- <div class="login-img">
            <img src="./assets/static/icons/signup.svg" alt="signup img">
        </div> -->
        <form action="" method="POST" class="signup-form" enctype="multipart/form-data">
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
                    <input type="email" name="userEmail" required spellcheck="false" />
                    <span class="placeholder">Email address</span>
                </div>
                <div class="input-block">
                    <input type="tel" name="userPhone" required spellcheck="false" />
                    <span class="placeholder">Phone</span>
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

            <div class="signup-row" id="password-no-match">
                <small>Passwords do not match</small>
            </div>

            <div class="signup-row">
                <div class="input-file">
                    <label for="userPic">Profile picture</label>
                    <input type="file" name="userPic" id="userPic" required spellcheck="false" />
                </div>
            </div>

            <div class="signup-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" type="submit">Register</button>
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