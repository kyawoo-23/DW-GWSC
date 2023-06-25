<?php 
    $title = "Pitch Details";
    include('header.php');
    include('AutoID_Functions.php');

    $pitchId = $_GET['id'];
    if ($pitchId == "") {
        echo "<script>window.location='index.php'</script>";
        exit();
    }

    if (isset($_POST['book'])) {
        if (!$cusId) {
            echo "<script>window.location='login.php'</script>";          
        }

        $id = AutoID('Booking', 'Id', 'B-', 6);
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $headCount = $_POST['headCount'];
        $price = $_POST['price'];
        $pitchId = $_POST['id'];
        $remark = $_POST['remark'];
        $cardType = $_POST['paymentType'];
        $cardNo = $_POST['cardNumber'];
        $cardExp = $_POST['cardExpiry'];
        $cardCvv = $_POST['cardCvv'];
        $cardName = $_POST['cardName'];

        if ($_POST['isNewAddress']) {
            $address = $_POST['newAddress'];
        } else {
            $address = $_POST['address']; 
        }

        $createBooking = "INSERT INTO Booking (`Id`, `CustomerId`, `Email`, `Phone`, `PitchId`, `HeadCount`, `Price`, `Remark`, `CardType`, `CardNumber`, `CardExpiry`, `CardCvv`, `CardName`, `Address`) VALUES ('$id','$cusId','$email','$phone','$pitchId','$headCount','$price','$remark', '$cardType', '$cardNo', '$cardExp', '$cardCvv', '$cardName', '$address')";
        $runBooking = mysqli_query($connect, $createBooking);
        if ($runBooking) {
            echo "<script>alert('Your adventure has been booked created!')</script>";
            echo "<script>window.location='booking.php'</script>";
        }
        else {
            echo "<script>alert('Something went wrong in creating booking')</script>";
            exit();
        }
    }
?>

<main>
    <section>
        <?php
            $query = "SELECT Pitch.Id AS PitchId, Pitch.Name AS PitchName, Pitch.Description AS PitchDesc, Pitch.PrimaryImage AS PrimaryImage, Pitch.Image AS PitchImage, Pitch.Price, Pitch.StartDate, Pitch.EndDate, Activity.Name AS ActivityName, Activity.Id AS ActivityId, PitchType.Name AS PitchTypeName, PitchType.Id AS PitchTypeId, Site.Id AS SiteId, Site.Name AS SiteName, Site.Location AS SiteLocation, Site.Rules AS SiteRules FROM Pitch
                INNER JOIN Activity ON Pitch.ActivityId = Activity.Id
                INNER JOIN PitchType ON Pitch.PitchTypeId = PitchType.Id
                INNER JOIN Site ON Pitch.SiteId = Site.Id
                WHERE Pitch.Id = '$pitchId'";
            $run = mysqli_query($connect, $query);
            $row = mysqli_fetch_array($run)
        ?>

        <h2 class="section-title"><?= $row['SiteLocation'] . ' / ' . $row['PitchName'] ?></h2>

        <div class="site-banner">
            <img src="<?= $row['PrimaryImage'] ?>" alt="<?= $row['PitchName'] ?>">
        </div>

        <div class="pitch-description">
            <div class="pitch-description-left">
                <h3>About</h3>
                <p><?= $row['PitchDesc'] ?></p>

                <h3>Pitch type</h3>
                <div class="pitch-type-item">
                    <img src="./assets/static/icons/<?= $row['PitchTypeName'] ?>.svg"
                        alt="<?= $row['PitchTypeName'] ?>">
                    <span><?= $row['PitchTypeName'] ?></span>
                </div>

                <h3>Features</h3>
                <div class="pitch-features">
                    <?php
                        $getFeat = "SELECT Facilities.Name FROM Feature INNER JOIN Facilities ON Feature.FacilitiesId = Facilities.Id WHERE SiteId = '$row[SiteId]'";
                        $run2 = mysqli_query($connect, $getFeat);
                        while($row2 = mysqli_fetch_array($run2)) :
                    ?>

                    <div class="pitch-feature-item">
                        <img src="./assets/static/icons/<?= $row2['Name'] ?>.svg" alt="<?= $row2['Name'] ?>">
                        <span><?= $row2['Name'] ?></span>
                    </div>

                    <?php
                        endwhile;
                    ?>
                </div>
            </div>

            <div class="pitch-description-right">
                <h3>Site</h3>
                <?php
                    $getSite = "SELECT * FROM Site WHERE Id = '$row[SiteId]'";
                    $run4 = mysqli_query($connect, $getSite);
                    while($row4 = mysqli_fetch_array($run4)) :
                ?>
                <div class="pitch-type-item">
                    <span><?= $row4['Name'] ?></span>
                </div>
                <?php
                    endwhile;
                ?>

                <h3>Activity</h3>
                <?php
                    $getAct = "SELECT * FROM Activity WHERE Id = '$row[ActivityId]'";
                    $run3 = mysqli_query($connect, $getAct);
                    while($row3 = mysqli_fetch_array($run3)) :
                ?>
                <div class="pitch-type-item">
                    <img src="./assets/static/icons/<?= $row3['Name'] ?>.svg" alt="<?= $row3['Name'] ?>">
                    <span><?= $row3['Name'] ?></span>
                </div>
                <?php
                    endwhile;
                ?>

                <h3>Rules</h3>
                <p><?= $row['SiteRules'] ?></p>
            </div>
        </div>

        <div class="pitch-details">
            <div class="pitch-gallery">
                <?php
                    $imageList = explode(',', $row['PitchImage']);
                    for ($i=0; $i < (count($imageList) - 1); $i++) { 
                ?>
                <img src="<?= $imageList[$i] ?>" alt="<?= $row['PitchName'] ?>">
                <?php
                    }
                ?>
            </div>
            <div class="pitch-booking">
                <form action="pitchDetails.php?id=<?= $pitchId ?>" method="POST">
                    <h4>Booking form</h4>
                    <div class="booking-form-header">
                        <h3><?= $row['PitchName'] ?> <small>(<?= $row['PitchId'] ?>)</small></h3>
                        <input type="text" name="id" value="<?= $row['PitchId'] ?>" hidden>
                    </div>

                    <div class="admin-input-form customer">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $cusId ? $cusData['Email'] : '' ?>"
                            placeholder="Your email address" required>
                    </div>

                    <div class="admin-input-form customer">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" value="<?= $cusId ? $cusData['Phone'] : ''  ?>"
                            placeholder="Your phone number" required>
                    </div>

                    <div class="admin-input-form customer headcount">
                        <div>
                            <label for="headCount">Guests</label>
                            <div class="dropdown-gp">
                                <select name="headCount" id="headCount">
                                    <?php
                                    for ($i=1; $i<=8; $i++) { 
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="price">Price <small>(£)</small></label>
                            <input type="number" name="price" id="price" data-price="<?= $row['Price'] ?>"
                                value="<?= $row['Price'] ?>" readonly required>
                        </div>
                    </div>

                    <div class="admin-input-form customer payment">
                        <label for="">Payment methods</label>
                        <div class="payment-logo-container">
                            <input type="hidden" id="paymentType" name="paymentType" value="Visa">
                            <img data-payment="Visa" class="payment-logo active" src="./assets/static/images/visa.png"
                                alt="visa">
                            <img data-payment="Mastercard" class="payment-logo"
                                src="./assets/static/images/mastercard.png" alt="mastercard">
                            <img data-payment="JCB" class="payment-logo" src="./assets/static/images/jcb.webp"
                                alt="jcb">
                        </div>
                        <div class="payment-info">
                            <div>
                                <label for="cardNumber">Card number</label>
                                <input type="text" id="cardNumber" name="cardNumber" placeholder="XXXX XXXX XXXX XXXX"
                                    required />
                            </div>
                            <div class="payment-card-info">
                                <div>
                                    <label for="cardExpiry">Expiry date</label>
                                    <input type="text" id="cardExpiry" name="cardExpiry" placeholder="MM YY" required>
                                </div>
                                <div>
                                    <label for="cardCvv">CVV</label>
                                    <input type="text" id="cardCvv" name="cardCvv" placeholder="XXX" required />
                                </div>
                            </div>
                            <div>
                                <label for="cardName">Card holder's name</label>
                                <input type="text" id="cardName" name="cardName" placeholder="Sur name First name"
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="admin-input-form customer address">
                        <div>
                            <label for="address">Billing address</label>
                            <div class="isNewAddress">
                                <input class="checkbox" type="checkbox" name="isNewAddress" id="isNewAddress" />
                                <label for="isNewAddress">New address</label>
                            </div>
                        </div>
                        <div class="address-container">
                            <textarea name="address" id="address" rows="5"
                                placeholder="Your billing address"><?php echo $cusId ? $cusData['Address'] : ''; ?></textarea>
                            <textarea name="newAddress" id="newAddress" rows="5"
                                placeholder="Enter new billing address"></textarea>
                        </div>

                    </div>

                    <div class="admin-input-form customer">
                        <label for="remark">Remark</label>
                        <textarea name="remark" id="remark" placeholder="Your remark"></textarea>
                    </div>

                    <?php
                        if ($cusId) {
                            $checkBook = "SELECT * FROM Booking WHERE CustomerId = '$cusId' AND PitchId = '$pitchId'";
                            $runCheckBook = mysqli_query($connect, $checkBook);
                            $count = mysqli_num_rows($runCheckBook);
                            if ($count > 0) {
                    ?>
                    <input class="btn btn-secondary book-btn" type="submit" name="book" value="Booked" disabled>
                    <?php
                            }
                            else {
                    ?>
                    <input class="btn btn-secondary book-btn" type="submit" name="book" value="Book Now" id="bookBtn"
                        disabled>
                    <?php
                            }
                        }
                        else {
                    ?>
                    <input class="btn btn-secondary book-btn" type="submit" name="book" value="Book Now" id="bookBtn"
                        disabled>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>

        <h2 class="section-title">Local attractions</h2>
        <div class="pitch-attractions">
            <?php
                $getAttraction = "SELECT * FROM LocalAttraction WHERE SiteId = '$row[SiteId]'";
                $run5 = mysqli_query($connect, $getAttraction);
                if (mysqli_num_rows($run5) > 0) {
                    while($row5 = mysqli_fetch_array($run5, MYSQLI_ASSOC)) :
            ?>

            <div class="activity-card local-attraction">
                <img src="<?= $row5['Image'] ?>" alt="<?= $row5['Name'] ?>">
                <div class="activity-info sites">
                    <h3><?= $row5['Name'] ?></h3>
                </div>
                <span class="local-attraction-description"><?= $row5['Description'] ?></span>
            </div>

            <?php
                    endwhile;
                }
                else {
                    echo "<span class='not-found-text col-span-3'>No local attractions found</span>";
                }
            ?>
        </div>

        <h2 class="section-title">Map</h2>
        <?php
            $getMap = "SELECT Map FROM Site WHERE Id = '$row[SiteId]'";
            $run6 = mysqli_query($connect, $getMap);
            $row6 = mysqli_fetch_array($run6, MYSQLI_ASSOC)
        ?>
        <div class="site-map">
            <?= $row6['Map'] ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>

<script type="text/javascript">
$(document).ready(function() {
    $("#newAddress").hide()

    $("#headCount").change(function() {
        let value = $("#headCount").val()
        let price = $("#price").data('price')
        $("#price").val(value * price)
    })

    $("#isNewAddress").on('change', function() {
        if ($("#isNewAddress").is(':checked')) {
            $("#address").slideUp(500)
            $("#newAddress").slideDown(500)
        } else {
            $("#newAddress").slideUp(500)
            $("#address").slideDown(500)
        }
    })

    $(".payment-logo").on('click', function() {
        $(this).addClass('active')
        $(this).siblings().removeClass('active')
        $("#paymentType").val($(this).data('payment'))
    })

    let validCardNumber = false,
        validCardExpiry = false,
        validCardCvv = false

    let cardNumber = $('#cardNumber')
    cardNumber.on("input", function() {
        let position = cardNumber[0].selectionStart
        let prevVal = cardNumber.val()
        let newVal = prevVal.replace(/\D/g, '')
        newVal = newVal.substring(0, 16)
        let formattedVal = newVal.replace(/(.{4})/g, '$1 ')
        cardNumber.val(formattedVal)

        for (let i = 0; i < position; i++) {
            if (prevVal[i] != formattedVal[i]) {
                cardNumber[0].selectionEnd = position + 1
                return
            }
        }
        cardNumber[0].selectionEnd = position

        validCardNumber = newVal.length >= 16 ? true : false
        toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv)
    })

    let cardExpiry = $('#cardExpiry')
    cardExpiry.on("input", function() {
        let position = cardExpiry[0].selectionStart
        let prevVal = cardExpiry.val()
        let newVal = prevVal.replace(/\D/g, '')
        newVal = newVal.substring(0, 4)
        let formattedVal = newVal.replace(/(.{2})/g, '$1 ')
        cardExpiry.val(formattedVal)

        for (let i = 0; i < position; i++) {
            if (prevVal[i] != formattedVal[i]) {
                cardExpiry[0].selectionEnd = position + 1
                return
            }
        }
        cardExpiry[0].selectionEnd = position

        validCardExpiry = newVal.length >= 4 ? true : false
        toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv)
    })

    let cardCvv = $('#cardCvv')
    cardCvv.on("input", function() {
        let cvvVal = cardCvv.val()
        cvvVal = cvvVal.replace(/\D/g, '')
        cvvVal = cvvVal.substring(0, 3)
        cardCvv.val(cvvVal)

        validCardCvv = cvvVal.length >= 3 ? true : false
        toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv)
    })

    function toggleBookBtn(validCardNumber, validCardExpiry, validCardCvv) {
        if (validCardNumber === true && validCardExpiry === true && validCardCvv == true) {
            $("#bookBtn").prop("disabled", false)
        } else {
            $("#bookBtn").prop("disabled", true)
        }
    }
})
</script>