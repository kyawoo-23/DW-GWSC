<?php 
    $title = "Admin Login";
    include('adminHeader.php');

    if ($adminId) {
        echo "<script>window.location='adminBooking.php'</script>";
        exit();
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = "SELECT * FROM Admin WHERE Email='$email' AND Password='$password'";
        $query = mysqli_query($connect, $check);
        $count = mysqli_num_rows($query);

        if ($count > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['adminId'] = $data['Id'];

            echo "<script>alert('Admin login successfully')</script>";
            echo "<script>window.location='adminBooking.php'</script>";
        }
        else {
            echo "<script>alert('Wrong admin email or password')</script>";
        }
    }
?>

<main>
    <div class="login-container admin">
        <div class="login-img">
            <img src="./assets/static/icons/admin-login.svg" alt="login img">
        </div>
        <form action="adminLogin.php" method="POST" class="login-form">
            <div>
                <h2>GWSC Admin Portal</h2>
                <p>Please log in using the data provided</p>
            </div>
            <div class="input-block">
                <input type="email" name="email" id="input-text" class="login-email admin"
                    placeholder="Please input email address" required spellcheck="false" />
                <span class="placeholder">Email address</span>
            </div>
            <div class="input-block">
                <input class="password-input admin" type="password" name="password" id="passwordInput" required
                    spellcheck="false" />
                <span class="placeholder">Password</span>
                <img class="password-toggle-icon" src="./assets/static/icons/eye-slash.svg" alt="eye slash"
                    id="passwordToggle">
            </div>

            <div class="login-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
</main>

<?php
    include('adminFooter.php');
?>