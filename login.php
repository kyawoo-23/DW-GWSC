<?php 
    $title = "Login";
    include('header.php');

    if ($cusId) {
        echo "<script>window.location='index.php'</script>";
        exit();
    }

    if (isset($_SESSION['loginFail']) && $_SESSION['loginFail'] === "yes") {
        echo "<script>window.location='timer.php'</script>";
        exit();
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = "SELECT * FROM customer WHERE Email='$email' AND Password='$password'";
        $query = mysqli_query($connect, $check);
        $count = mysqli_num_rows($query);

        if ($count > 0) {
            $data = mysqli_fetch_array($query);
            $cId = $data['Id'];
            $cName = $data['FirstName'];

            $update = "UPDATE customer SET ViewCount = ViewCount + 1 WHERE Id = '$cId'";

            mysqli_query($connect, $update);

            $_SESSION['cusId'] = $cId;

            echo "<script>alert('Customer login successfully')</script>";
            echo "<script>window.location='index.php'</script>";
        }
        else {
            if (isset($_SESSION['loginError'])) {
                $countError = $_SESSION['loginError'];
                if ($countError == 0) {
                    $_SESSION['loginError'] = 1;
                    echo "<script>alert('Login failed, try again | Error Attempt 1')</script>";
                }
                if ($countError == 1) {
                    $_SESSION['loginError'] = 2;
                    echo "<script>alert('Login failed, try again | Error Attempt 2')</script>";
                }
                if ($countError == 2) {
                    echo "<script>alert('Login failed, try again | Error Attempt 3')</script>";
                    $_SESSION['loginFail'] = "yes";
                    $_SESSION['lockTime'] = time();
                    echo "<script>window.location='timer.php'</script>";
                }
            }
            else {
                $_SESSION['loginError'] = 1;
                echo "<script>alert('Login failed, try again | Error Attempt 1')</script>";
            }
        }
    }
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
                <input type="email" name="email" id="input-text" required spellcheck="false" />
                <span class="placeholder">Email address</span>
            </div>
            <div class="input-block">
                <input class="password-input" type="password" name="password" id="passwordInput" required
                    spellcheck="false" />
                <span class="placeholder">Password</span>
                <img class="password-toggle-icon" src="./assets/static/icons/eye-slash.svg" alt="eye slash"
                    id="passwordToggle">
            </div>

            <div class="login-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-login" type="submit" name="login">Login</button>
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