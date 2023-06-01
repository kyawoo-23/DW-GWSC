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
                    <input type="password" name="userPassword1" required spellcheck="false" />
                    <span class="placeholder">Password</span>
                </div>
                <div class="input-block">
                    <input type="password" name="userPassword2" required spellcheck="false" />
                    <span class="placeholder">Confirm password</span>
                </div>
            </div>

            <div>
                <label for="Profile picture">Profile picture</label>
                <input type="file" required />
            </div>

            <div class="login-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" type="submit">Login</button>
            </div>

            <div class="no-account">
                Don't have an account? <a href="">Sign up</a>
            </div>
        </form>
    </div>
</main>

<?php 
    include('footer.php');
?>