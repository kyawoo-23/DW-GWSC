<?php 
    $title = "Login";
    include('header.php');
?>

<div class="login-container">
    <div class="login-img">
        <img src="./assets/static/icons/login.svg" alt="login img">
    </div>
    <form action="" method="POST" class="login-form">
        <div>
            <h2>Hello! Welcome back...</h2>
            <p>Login with data that you've entered during account registeration</p>
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
    </form>
</div>

<?php 
    include('footer.php');
?>