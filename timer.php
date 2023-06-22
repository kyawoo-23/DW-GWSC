<?php 
    $title = "Timer";
    include('header.php');

    if (!isset($_SESSION['loginFail']) || $_SESSION['loginFail'] === "no") {
        echo "<script>window.location='index.php'</script>";
        exit();
    }

    $leftTime = 61 - (time() - $_SESSION['lockTime']);
    if ($leftTime < 0) {
        $_SESSION['loginFail'] = "no";
        $_SESSION['loginError'] = 0;
        echo "<script>window.location='login.php'</script>";
        exit();
    }
    
    $leftTimeMin = date('i:s', $leftTime);
?>

<main>
    <h2 class="section-title">Login disabled</h2>
    <div class="login-timer">
        <img src="./assets/static/icons/hourglass.svg" alt="hourglass">
        <p>Due to repeated failed login attempts or other suspicious activity, login for your account is temporarily
            disabled. Please try again later.</p>

        <span class="countdown">--:--</span>
    </div>
</main>

<?php 
    include('footer.php');
?>

<script type="text/javascript">
let timer2 = '<?= $leftTimeMin ?>'
let interval = setInterval(function() {
    let timer = timer2.split(':')
    let minutes = parseInt(timer[0], 10)
    let seconds = parseInt(timer[1], 10)

        --seconds
    minutes = (seconds < 0) ? --minutes : minutes

    if (minutes < 0) {
        clearInterval(interval)
        window.location.reload()
    }

    seconds = (seconds < 0) ? 59 : seconds
    seconds = (seconds < 10) ? '0' + seconds : seconds

    if (minutes >= 0) {
        $('.countdown').html(minutes + ':' + seconds)
        timer2 = minutes + ':' + seconds
    }
}, 1000)
</script>