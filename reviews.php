<?php 
    $title = "Reviews";
    include('header.php');

    if (isset($_POST['submit'])) {
        $site = $_POST['site'];
        $rating = $_POST['rating'];
        $message = $_POST['message'];

        $insert = "INSERT INTO `review`(`SiteId`, `CustomerId`, `Rating`, `Message`) VALUES ('$site','$cusId','$rating','$message')";
        $run = mysqli_query($connect, $insert);
        if ($run) {
            echo "<script>alert('Site review submitted successfully')</script>";
            echo "<script>window.location='reviews.php'</script>";
        } 
        else {
            echo "<script>alert('Something went wrong in submitting review')</script>";
        }
    }
?>

<main>
    <?php
        if ($cusId) {
    ?>
    <section>
        <h2 class="section-title">Review form</h2>

        <div class="login-container">
            <form action="reviews.php" method="POST" class="contact-form">
                <div>
                    <h2>Leave a review</h2><br>
                    <p>Your feedback is vital. Help us improve and create a better company</p>
                </div>

                <div class="input-block review">
                    <div class="admin-input-form">
                        <label for="site">Site</label>
                        <div class="dropdown-gp review">
                            <select name="site" id="site">
                                <?php
                                    $select1 = "SELECT * FROM Site";
                                    $run1 = mysqli_query($connect, $select1);
                                    while ($row1 = mysqli_fetch_array($run1)) :
                                ?>
                                <option value="<?= $row1['Id'] ?>"><?= $row1['Name'] ?></option>
                                <?php
                                    endwhile;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="rating">
                    <label for="rating">Rating</label>
                    <div class="rating-container">
                        <img class="icon-md" src="./assets/static/icons/star.svg" alt="star">
                        <input class="rating-input" type="number" min="1" max="5" value="1" name="rating" id="rating">
                    </div>
                </div>

                <div class="input-block review">
                    <textarea name="message" rows="5" required></textarea>
                    <span class="placeholder">Message</span>
                </div>

                <div class="login-btn-gp review">
                    <button class="btn btn-clear" type="reset">Clear</button>
                    <button class="btn btn-send" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <?php
        }
    ?>

    <section>
        <h2 class="section-title">Review list</h2>

        <div class="featured-pitch-list">
            <?php
                $query = "SELECT Review.*, Site.name AS SiteName, Site.id AS SiteId, Site.image AS SiteImage, Customer.*, Customer.image AS CustomerImage FROM Review 
                        INNER JOIN Site ON Review.SiteId = Site.Id
                        INNER JOIN Customer ON Customer.Id = Review.CustomerId";
                $run2 = mysqli_query($connect, $query);
                while($row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC)) :
            ?>

            <a href="sitesDetails.php?id=<?= $row2['SiteId'] ?>" class="review-card">
                <div class="review-title">
                    <h3><?= $row2['SiteName'] ?></h3>
                    <span class="review-star">
                        <?= $row2['Rating'] ?>
                        <img src="./assets/static/icons/star.svg" class="icon-md" alt="star">
                    </span>
                </div>
                <img src="<?= $row2['SiteImage'] ?>" class="review-site-img" alt="<?= $row2['SiteName'] ?>" />
                <div class="review-user">
                    <small class="review-time">
                        <?php 
                           $datetime = new DateTime($row2['CreatedAt']);
                            $formattedDatetime = $datetime->format("F j, Y");
                            echo $formattedDatetime;
                        ?>
                    </small>
                    <div class="review-user-info">
                        <img src="<?= $row2['CustomerImage'] ?>" alt="<?= $row2['FirstName'] ?>">
                        <span><?= $row2['FirstName'] . ' ' . $row2['SurName'] ?></span>
                    </div>
                    <p><?= $row2['Message'] ?></p>
                </div>
            </a>

            <?php
                endwhile;
            ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>

<script>
$('#rating').on('input', function() {
    if ($('#rating').val() > 5) {
        $('#rating').val(5)
    }
});
</script>