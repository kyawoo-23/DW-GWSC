<?php 
    $title = "Booking";
    include('header.php');

    if (!$cusId) {
        echo "<script>window.location='login.php'</script>";
    }
?>

<main>
    <h2 class="section-title">Booking list</h2>
    <?php
        $select = "SELECT * FROM Booking WHERE CustomerId = '$cusId'";
        $run = mysqli_query($connect, $select);
        $num = mysqli_num_rows($run);
        if ($num > 0) {
    ?>
    <section class="booking-list">
        <?php
            while ($row = mysqli_fetch_array($run)) :
                $query = "SELECT Pitch.*, Pitch.Name AS PitchName FROM Pitch 
                INNER JOIN Site ON Pitch.SiteId = Site.Id
                WHERE Pitch.Id = '$row[PitchId]'";
                $run2 = mysqli_query($connect, $query);
                while ($row2 = mysqli_fetch_array($run2)) :
        ?>
        <a href="pitchDetails.php?id=<?= $row2['Id'] ?>" class="booking">
            <img class="booking-img" src="<?= $row2['PrimaryImage'] ?>" alt="<?= $row2['PitchName'] ?>" />
            <div class="booking-body">
                <div class="booking-body-booking">
                    <h3 class="booking-title">Booking info</h3>
                    <p class="booking-text">
                        <img src="./assets/static/icons/hashtag.svg" alt="hashtag">
                        <?= $row['Id'] ?>
                    </p>
                    <p class="booking-text">
                        <img src="./assets/static/icons/calendar.svg" alt="calendar">
                        <?php
                            $datetime = new DateTime($row['CreatedAt']);
                            $formattedDatetime = $datetime->format("F j, Y / g:i A");
                            echo $formattedDatetime;    
                        ?>
                    </p>
                    <p class="booking-text">
                        <img src="./assets/static/icons/headcount.svg" alt="headcount">
                        <?= $row['HeadCount'] ?>
                    </p>
                    <p class="booking-text">
                        <img src="./assets/static/icons/sterling.svg" alt="sterling">
                        <?= $row['Price'] ?>
                    </p>
                    <p class="booking-text">
                        <img src="./assets/static/icons/email.svg" alt="email">
                        <?= $row['Email'] ?>
                    </p>
                    <p class="booking-text">
                        <img src="./assets/static/icons/phone.svg" alt="phone">
                        <?= $row['Phone'] ?>
                    </p>

                    <?php
                        if ($row['Address'] !== "") {
                    ?>
                    <p class="booking-text">
                        <img src="./assets/static/icons/location.svg" alt="location">
                        <?= $row['Address'] ?>
                    </p>
                    <?php
                        }
                    ?>

                    <?php
                        if ($row['Remark'] !== "") {
                    ?>
                    <p class="booking-text">
                        <img src="./assets/static/icons/remark.svg" alt="remark">
                        <?= $row['Remark'] ?>
                    </p>
                    <?php 
                        }
                    ?>
                </div>
                <div class="booking-body-pitch">
                    <h3 class="booking-title">Pitch info</h3>
                    <p class="booking-text">
                        <img src="./assets/static/icons/hashtag.svg" alt="hashtag">
                        <?= $row2['Id'] ?>
                    </p>
                    <p class="booking-text">
                        <img src="./assets/static/icons/globe.svg" alt="site">
                        <?php
                            $getSite = "SELECT Site.Name AS SiteName FROM Site INNER JOIN Pitch ON Pitch.SiteId = Site.Id WHERE Pitch.Id = '$row2[Id]'";
                            $run4 = mysqli_query($connect, $getSite);
                            $row4 = mysqli_fetch_array($run4);
                            echo $row4['SiteName'];
                        ?>
                    </p>
                    <p class="booking-text">
                        <?php
                            $getActivity = "SELECT * FROM Activity WHERE Id = '$row2[ActivityId]'";
                            $run3 = mysqli_query($connect, $getActivity);
                            $row3 = mysqli_fetch_array($run3)
                        ?>
                        <img src="./assets/static/icons/<?= $row3['Name'] ?>.svg" alt="activity">
                        <?= $row2['PitchName'] ?>
                    </p>
                    <div class="booking-time">
                        <img src="./assets/static/icons/calendar.svg" alt="calendar">
                        <span>
                            <?php 
                                $startDate = new DateTime($row2['StartDate']);
                                $formattedStartDate = $startDate->format("F j, Y");
                                echo $formattedStartDate; 
                            ?>
                            ~
                            <?php 
                                $endDate = new DateTime($row2['EndDate']);
                                $formattedEndDate = $endDate->format("F j, Y");
                                echo $formattedEndDate; 
                            ?>
                        </span>
                    </div>
                    <p class="booking-text">
                        <img src="./assets/static/icons/sterling.svg" alt="sterling">
                        <?= $row2['Price'] ?>
                    </p>
                </div>
            </div>
        </a>
        <?php
                endwhile;
            endwhile;
        ?>
    </section>
    <?php
        }
        else {
            echo "<div class='not-found-text no-booking'>
            <img src='./assets/static/images/booking.png' alt='booking' />
            <span>No booking found</span>
            <a href='pitch.php?q=all' class='book-btn-link'>Book a pitch now</a>
            </div>";
        }
    ?>
</main>

<?php 
    include('footer.php');
?>