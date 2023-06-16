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
                <a href="sites.php" class="intro-card-button">Available sites</a>
            </div>
        </div>
    </div>

    <section>
        <h2 class="section-title">Discover exciting activities
            <a href="pitch.php?q=all">Discover all
                <img src="./assets/static/icons/angles-right.svg" alt="arrow icon">
                <img src="./assets/static/icons/angles-right.svg" alt="arrow icon">
            </a>
        </h2>
        <div class="flex-two-div">
            <div class="activity-card">
                <img src="./assets/static/images/wildswimming.jpg" alt="wild swimming">
                <div class="activity-info swimming">
                    <h3>Wild Swimming</h3>
                    <small>Embrace nature's aquatic oasis</small>
                    <a class="btn btn-white" href="pitch.php?q=1">Dive into</a>
                </div>
            </div>
            <div class="activity-card">
                <img src="./assets/static/images/camping.jpg" alt="camping">
                <div class="activity-info camping">
                    <h3>Camping</h3>
                    <small>Immerse in the joys of camping</small>
                    <a class="btn btn-white" href="pitch.php?q=2">Explore more</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">Featured Pitches</h2>
        <div class="featured-pitches">
            <?php
                $select1 = "SELECT * FROM Pitch WHERE IsAvailable = '1' ORDER BY Id LIMIT 1";
                $run1 = mysqli_query($connect, $select1);
                while ($row1 = mysqli_fetch_array($run1)) :
            ?>
            <div class="featured-pitch">
                <img src="<?= $row1['PrimaryImage'] ?>" alt="<?= $row1['Name'] ?>">
                <div class="featured-pitch-info">
                    <h2><?= $row1['Name'] ?></h2>
                    <p><?= $row1['Description'] ?></p>
                    <a class="btn btn-white" href="pitchDetails.php?id=<?= $row1['Id'] ?>">Go to details</a>
                </div>
            </div>
            <?php
                endwhile;
            ?>

            <div class="featured-pitch-list">
                <?php
                    $select2 = "SELECT * FROM Pitch WHERE IsAvailable = '1' ORDER BY Id LIMIT 11 OFFSET 1";
                    $run2 = mysqli_query($connect, $select2);
                    while ($row2 = mysqli_fetch_array($run2)) :
                ?>
                <div class="pitch-card">
                    <div class="pitch-card-img">
                        <img src="<?= $row2['PrimaryImage'] ?>" alt="<?= $row2['Name'] ?>">
                    </div>
                    <div class="pitch-card-body">
                        <div>
                            <h3 class="pitch-card-title"><?= $row2['Name'] ?></h3>
                            <p class="pitch-card-desc"><?= $row2['Description'] ?></p>
                        </div>
                        <a class="btn btn-white" href="pitchDetails.php?id=<?= $row2['Id'] ?>">Details</a>
                    </div>
                </div>
                <?php 
                    endwhile;
                ?>
            </div>
        </div>
    </section>

    <section>
        <h2 class="section-title">What our customers say</h2>
        <div class="testimonial">
            <div>
                <ul>
                    <li class="testimonial-card active">
                        <div class="testimonial-content">
                            <img class="testimonial-img" src="./assets/static/images/slide4.jpg" alt="">
                            <div class="testimonial-body">
                                <p class="testimonial-review">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Tenetur, ipsa eum ratione
                                    tempore exercitationem voluptates eligendi? Ab perspiciatis illo officia suscipit
                                    quam, dignissimos enim quisquam mollitia delectus sapiente dolores placeat</p>
                                <div class="testimonial-user">
                                    <span class="testimonial-title">Kyaw Oo</span>

                                    <span class="star-container">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="testimonial-card">
                        <div class="testimonial-content">
                            <img class="testimonial-img" src="./assets/static/images/slide4.jpg" alt="">
                            <div class="testimonial-body">
                                <p class="testimonial-review">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Tenetur, ipsa eum ratione
                                    tempore exercitationem voluptates eligendi? Ab perspiciatis illo officia suscipit
                                    quam, dignissimos enim quisquam mollitia delectus sapiente dolores placeat</p>
                                <div class="testimonial-user">
                                    <span class="testimonial-title">Kyaw Oo</span>

                                    <span class="star-container">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="testimonial-card">
                        <div class="testimonial-content">
                            <img class="testimonial-img" src="./assets/static/images/slide4.jpg" alt="">
                            <div class="testimonial-body">
                                <p class="testimonial-review">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Tenetur, ipsa eum ratione
                                    tempore exercitationem voluptates eligendi? Ab perspiciatis illo officia suscipit
                                    quam, dignissimos enim quisquam mollitia delectus sapiente dolores placeat</p>
                                <div class="testimonial-user">
                                    <span class="testimonial-title">Kyaw Oo</span>

                                    <span class="star-container">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                        <img class="icon-sm" src="./assets/static/icons/star.svg" alt="star">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <button class="prev"><img class="icon-sm" src="./assets/static/icons/arrow.svg" alt="prev"></button>
            <button class="next"><img class="icon-sm" src="./assets/static/icons/arrow.svg" alt="next"></button>
        </div>

    </section>
</main>


<script type="text/javascript" src="./assets/js/testimonial.js" defer></script>

<?php 
    include('footer.php');
?>