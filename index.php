<?php 
    
    $title = "Home";
    include('header.php');

?>

<main>
    <div class="hero">
        <div class="slideshow">
            <div class="slider">
                <div class="slide-track track-1" onmouseover="delayAnimation(this)"
                    onmouseout="clearInterval(lastInterval)">
                    <div class="slide">
                        <img src="./assets/static/images/slide1.jpg" alt="slide 1" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide2.jpg" alt="slide 2" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide3.jpg" alt="slide 3" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide4.jpg" alt="slide 4" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide5.jpg" alt="slide 5" />
                    </div>

                    <div class="slide">
                        <img src="./assets/static/images/slide1.jpg" alt="slide 1" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide2.jpg" alt="slide 2" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide3.jpg" alt="slide 3" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide4.jpg" alt="slide 4" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide5.jpg" alt="slide 5" />
                    </div>
                </div>
            </div>
            <div class="slider">
                <div class="slide-track track-2" onmouseover="delayAnimation(this)"
                    onmouseout="clearInterval(lastInterval)">
                    <div class="slide">
                        <img src="./assets/static/images/slide6.jpg" alt="slide 6" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide7.jpg" alt="slide 7" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide8.jpg" alt="slide 8" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide9.jpg" alt="slide 9" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide10.jpg" alt="slide 10" />
                    </div>

                    <div class="slide">
                        <img src="./assets/static/images/slide6.jpg" alt="slide 6" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide7.jpg" alt="slide 7" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide8.jpg" alt="slide 8" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide9.jpg" alt="slide 9" />
                    </div>
                    <div class="slide">
                        <img src="./assets/static/images/slide10.jpg" alt="slide 10" />
                    </div>
                </div>
            </div>
        </div>
        <div class="intro">
            <div class="intro-card">
                <div class="intro-card-details">
                    <img class="logo-icon-lg" src="./assets/static/icons/logo_white.svg" alt="gwsc logo">
                    <p class="intro-body">Welcome to Global Wild Swimming and Camping, your ultimate destination for
                        unforgettable outdoor adventures!</p>
                </div>
                <a href="" class="intro-card-button">Available sites</a>
            </div>
        </div>
    </div>

    <section>
        <h2 class="section-title">Discover exciting activities</h2>
        <div class="flex-two-div">
            <div class="activity-card">
                <img src="./assets/static/images/wildswimming.jpg" alt="wild swimming">
                <div class="activity-info swimming">
                    <h3>Wild Swimming</h3>
                    <small>Embrace nature's aquatic oasis</small>
                    <a class="btn btn-white" href="">Dive into</a>
                </div>
            </div>
            <div class="activity-card">
                <img src="./assets/static/images/camping.jpg" alt="camping">
                <div class="activity-info camping">
                    <h3>Camping</h3>
                    <small>Immerse in the joys of camping</small>
                    <a class="btn btn-white" href="">Explore more</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">Featured Pitches</h2>
        <div class="featured-pitches">
            <div class="featured-pitch">
                <img src="./assets/static/images/slide2.jpg" alt="">
                <div class="featured-pitch-info">
                    <h2>Camping</h2>
                    <p>Embrace natureaksdljaslf lasjflajs dflj aslf lasl flas flasjdj las dfflas fa sfl aslf flasf las
                        dflal
                        alsfd
                        's aquatic oasis</p>
                    <a class="btn btn-white" href="">Go to details</a>
                </div>
            </div>

            <div class="featured-pitch">
                <img src="./assets/static/images/slide2.jpg" alt="">
                <div class="featured-pitch-info">
                    <h2>Camping</h2>
                    <p>Embrace natureaksdljaslf lasjflajs dflj aslf lasl flas flasjdj las dfflas fa sfl aslf flasf las
                        dflal
                        alsfd
                        's aquatic oasis</p>
                    <a class="btn btn-white" href="">Go to details</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>