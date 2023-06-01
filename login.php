<?php 
    $title = "Login";
    include('header.php');
?>

<main>
    <div class="login-container">
        <div class="login-img">
            <img src="./assets/static/icons/login.svg" alt="login img">
        </div>
        <form action="" method="POST" class="login-form">
            <div>
                <h2>Hello! Welcome back ...</h2>
                <p>Please log in using the data you provided during registration</p>
            </div>
            <div class="input-block">
                <input type="email" name="input-text" id="input-text" required spellcheck="false" />
                <span class="placeholder">Email address</span>
            </div>
            <div class="input-block">
                <input type="password" name="input-text" id="input-text" required spellcheck="false" />
                <span class="placeholder">Password</span>
            </div>

            <div class="login-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" type="submit">Login</button>
            </div>

            <div class="no-account">
                Don't have an account? <a href="signup.php">Sign up</a>
            </div>
        </form>
    </div>
</main>

<?php 
    include('footer.php');
?>