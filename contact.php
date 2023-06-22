<?php 
    $title = "Contact";
    include('header.php');
    include('AutoID_Functions.php');

    if (!$cusId) {
        echo "<script>window.location='login.php'</script>";
        exit();
    }

    if (isset($_POST['send'])) {
        $id = AutoID('Contact', 'Id', 'C-', 6);
        $email = $_POST['email'];
        $message = $_POST['message'];

        $insert = "INSERT INTO Contact (`Id`, `CustomerId`, `Email`, `Message`) VALUES ('$id', '$cusId', '$email', '$message')";
        $run = mysqli_query($connect, $insert);
        if ($run) {
            echo "<script>alert('Message sent successfully')</script>";
            echo "<script>window.location='contact.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in sending message')</script>";
        }
    }
?>

<main>
    <h2 class="section-title">Contact form</h2>
    <div class="login-container">
        <form action="contact.php" method="POST" class="contact-form">
            <div>
                <h2>Love to hear from you,</h2>
                <p class="hand-wave">
                    Get in touch
                    <img src="./assets/static/images/wave.png" alt="wave">
                </p>
            </div>

            <div class="input-block">
                <input type="email" name="email" class="login-email" value="<?= $cusData['Email'] ?>"
                    placeholder="Please enter your email address" required spellcheck="false" />
                <span class="placeholder">Email</span>
            </div>

            <div class="input-block">
                <textarea name="message" rows="5" required></textarea>
                <span class="placeholder">Message</span>
            </div>

            <div class="login-btn-gp">
                <button class="btn btn-clear" type="reset">Clear</button>
                <button class="btn btn-send" type="submit" name="send">Send Message</button>
            </div>

            <a href="privacyPolicy.php" class='book-btn-link'>Privay policy</a>
        </form>
    </div>
</main>

<?php 
    include('footer.php');
?>