<?php 
    $title = "Information";
    include('header.php');
?>

<div class="information-banner">
    <img src="./assets/static/images/information.jpg" alt="mountain" />
    <div>
        <h3>Information</h3>
        <small>Surf our exciting and unique sites</small>
    </div>
</div>

<main>
    <div class="information-pills-container">
        <a href="#availability" class="information-pill">
            Pith types and Availability
        </a>
        <a href="#features" class="information-pill">
            Features
        </a>
        <a href="#attractions" class="information-pill">
            Local attractions
        </a>
        <a href="#location" class="information-pill">
            Location
        </a>
    </div>

    <section id="availability">
        <?php
            ob_start();
            include('pitchTypes.php');
            $output = ob_get_clean();

            $dom = new DOMDocument();
            libxml_use_internal_errors(true); 
            $dom->loadHTMLFile('data:text/html;charset=utf-8,' . rawurlencode($output));
            libxml_clear_errors(); 

            $div = $dom->getElementsByTagName('section')->item(0);
            echo $dom->saveHTML($div);
        ?>
    </section>
    <hr class="information-hr">
    <section id="features">
        <?php
            ob_start();
            include('features.php');
            $output = ob_get_clean();

            $dom = new DOMDocument();
            libxml_use_internal_errors(true); 
            $dom->loadHTMLFile('data:text/html;charset=utf-8,' . rawurlencode($output));
            libxml_clear_errors(); 

            $div = $dom->getElementsByTagName('section')->item(0);
            echo $dom->saveHTML($div);
        ?>
    </section>
    <hr class="information-hr">
    <section id="attractions">
        <?php
            ob_start();
            include('localattractions.php');
            $output = ob_get_clean();

            $dom = new DOMDocument();
            libxml_use_internal_errors(true); 
            $dom->loadHTMLFile('data:text/html;charset=utf-8,' . rawurlencode($output));
            libxml_clear_errors(); 

            $div = $dom->getElementsByTagName('section')->item(0);
            echo $dom->saveHTML($div);
        ?>
    </section>
    <hr class="information-hr">
    <section id="location">
        <section>
            <h2 class="section-title">Location</h2>
            <div class="location-container">
                <div class="location-info">
                    <div>
                        <img class="icon-md" src="./assets/static/icons/location.svg" alt="location">
                        The Towers, Adamson House, Wilmslow Rd, Manchester M20 2EZ, United Kingdom
                    </div>
                    <div>
                        <img class="icon-md" src="./assets/static/icons/globe.svg" alt="web">
                        <a href="https://www.nccedu.com/" target="_blank" referrerpolicy="no-referrer">nccedu.com</a>
                    </div>
                    <div>
                        <img class="icon-md" src="./assets/static/icons/phone.svg" alt="phone">
                        <a href="tel:+441614386200">+441614386200</a>
                    </div>
                </div>
                <div class="location-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.3766710521686!2d-2.2283500825561524!3d53.40808939999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb2f403cdff17%3A0x4441be94dbd89028!2sNCC%20Education%20Ltd!5e0!3m2!1sen!2smm!4v1687796539918!5m2!1sen!2smm"
                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </section>
</main>

<?php 
    include('footer.php');
?>