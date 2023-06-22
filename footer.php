<footer>
    <div class="footer-head">
        <h2>Ready for your adventures?</h2>
        <p>Connect with us now!</p>

        <div class="socials">
            <a href="">
                <img class="social" src="./assets/static/icons/facebook.svg" alt="facebook">
            </a>
            <a href="">
                <img class="social" src="./assets/static/icons/instagram.svg" alt="instagram">
            </a>
            <a href="">
                <img class="social" src="./assets/static/icons/twitter.svg" alt="twitter">
            </a>
            <a href="">
                <img class="social" src="./assets/static/icons/youtube.svg" alt="youtube">
            </a>
        </div>
    </div>

    <div class="footer-foot">
        <div class="foot-left">
            <img class="logo-icon" src="./assets/static/icons/logo.svg" alt="GWSC logo">
            <p class="copyright foot-here">You are at <?php echo $title ?> page</p>
            <small class="copyright">© GWSC Global Wild Swimming and Camping 1999 - 2023 #Kko</small>
        </div>
        <div class="foot-right">
            <div>
                <p class="footer-links-title">Links</p>
                <div class="footer-links">
                    <a href="index.php" class="<?php if ($title === "Home") echo "active"?>">Home</a>
                    <a href="information.php"
                        class="<?php if ($title === "Information") echo "active"?>">Information</a>
                    <a href="sites.php" class="<?php if ($title === "Sites") echo "active"?>">Sites</a>
                    <a href="pitch.php?q=all" class="<?php if ($title === "Pitches") echo "active"?>">Pitches</a>
                    <a href="pitchTypes.php" class="<?php if ($title === "Pitch types") echo "active"?>">Pitch
                        types</a>
                    <a href="features.php" class="<?php if ($title === "Features") echo "active"?>">Features</a>
                    <a href="localAttractions.php"
                        class="<?php if ($title === "Local Attractions") echo "active"?>">Local Attractions</a>
                    <a href="reviews.php" class="<?php if ($title === "Reviews") echo "active"?>">Reviews</a>
                    <a href="contact.php" class="<?php if ($title === "Contact") echo "active"?>">Contact</a>
                    <a href="booking.php" class="<?php if ($title === "Booking") echo "active"?>">Booking</a>
                    <a href="search.php" class="<?php if ($title === "Search") echo "active"?>">Search</a>
                </div>
            </div>
            <div>
                <p class="reference-links-title">References</p>
                <div class="reference-links">
                    <p>Image references from <a href="">here</a></p>
                    <p>Image references from <a href="">here</a></p>
                    <p>Image references from <a href="">here</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="cookies-container">
    <div class="cookies-container-head">
        <img src="./assets/static/images/cookies.png" alt="cookies">
        <p class="cookies-header">Cookies!</p>
        <small>We use cookies to make your browsing experience better</small>
    </div>
    <div class="cookies-btn">
        <a href="privacyPolicy.php" class="cookies-btn-left">Privacy policy</a>
        <button class="cookies-btn-right" id="ok-cookie">Okay</button>
    </div>
</div>

<script type="text/javascript" src="./assets/js/navbar-toggle.js" defer></script>
<script type="text/javascript" src="./assets/js/dialog-toggle.js" defer></script>
<script type="text/javascript" src="./assets/js/slideshow.js" defer></script>
<script type="text/javascript" src="./assets/js/password-toggle.js" defer></script>
<script type="text/javascript" src="./assets/js/cookies.js" defer></script>
<script type="text/javascript" src="./assets/js/confirm-logout.js" defer></script>

</body>

</html>