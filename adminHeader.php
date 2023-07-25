<?php
    include("connect.php");
    session_start();
    
    $adminId = null;
    if (isset($_SESSION['adminId'])) {
        $adminId = $_SESSION['adminId'];

        $getAdminData = "SELECT * FROM Admin WHERE Id = '$adminId'";
        $runAdminData = mysqli_query($connect, $getAdminData);
        $adminData = mysqli_fetch_array($runAdminData);
    }
    else {
        echo "<script>
            if (window.location.pathname !== '/gwsc/adminLogin.php') {
                window.location = 'adminLogin.php'
            }
        </script>";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
            if (isset($title)) {
                echo $title . " | GWSC Admin";
            }
            else {
                echo "GWSC";
            }
        ?>
    </title>
    <link rel="icon" type="image/x-icon" href="./assets/static/icons/logo_admin_icon.svg">
    <link rel="stylesheet" type="text/css" href="./assets/styles.css?<?php echo time(); ?>">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <div class="head admin">
            <div class="nav-menu">
                <div class="burger admin">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="foot admin">
            <div>
                <img class="logo-icon admin" src="./assets/static/icons/logo_admin.svg" alt="GWSC logo">
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Booking") echo "active"?>">
                <a href="adminBooking.php">Booking</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Site") echo "active"?>">
                <a href="adminSite.php">Site</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Local Attraction") echo "active"?>">
                <a href="adminLocalAttraction.php">Attractions</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Pitch") echo "active"?>">
                <a href="adminPitch.php">Pitch</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin") echo "active"?>">
                <a href="admin.php">Admin</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Customer") echo "active"?>">
                <a href="adminCustomer.php">Customer</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Review") echo "active"?>">
                <a href="adminReview.php">Review</a>
            </div>
            <div class="nav-item admin <?php if ($title === "Admin Contact") echo "active"?>">
                <a href="adminContact.php">Contact</a>
            </div>
            <div class="nav-info">
                <?php
                    if ($adminId) {
                ?>
                <a href="adminProfile.php?id=<?= $adminId ?>" class="nav-user-info admin">
                    <img class="nav-user-img" src="<?= $adminData['Image'] ?>" alt="<?= $adminData['Name'] ?>">
                    <span><?= $adminData['Name'] ?></span>
                </a>
                <button class="btn-circle btn-circle-secondary admin-logout">
                    <img class="icon-sm" src="./assets/static/icons/logout.svg" alt="logout icon">
                </button>
                <?php
                    }
                    else {
                ?>
                <a href="adminLogin.php" class="btn btn-secondary">Login</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>

    <nav class="mobile-navbar">
        <div class="mobile-nav-container">
            <div class="mobile-nav-item admin <?php if ($title === "Admin Booking") echo "active"?>">
                <a href="adminBooking.php">Booking</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin Site") echo "active"?>">
                <a href="adminSite.php">Site</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin Local Attraction") echo "active"?>">
                <a href="adminLocalAttraction.php">Attractions</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin Pitch") echo "active"?>">
                <a href="adminPitch.php">Pitch</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin") echo "active"?>">
                <a href="admin.php">Admin</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin Customer") echo "active"?>">
                <a href="adminCustomer.php">Customer</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin Review") echo "active"?>">
                <a href="adminReview.php">Review</a>
            </div>
            <div class="mobile-nav-item admin <?php if ($title === "Admin Contact") echo "active"?>">
                <a href="adminContact.php">Contact</a>
            </div>
            <div class="mobile-nav-user">
                <?php
                    if ($adminId) {
                ?>
                <a href="adminProfile.php?id=<?= $adminId ?>" class="nav-user-info admin">
                    <img class="nav-user-img" src="<?= $adminData['Image'] ?>" alt="<?= $adminData['Name'] ?>">
                    <span><?= $adminData['Name'] ?></span>
                </a>
                <button class="btn-circle btn-circle-secondary admin-logout">
                    <img class="icon-sm" src="./assets/static/icons/logout.svg" alt="logout icon">
                </button>
                <?php
                    }
                    else {
                ?>
                <a href="adminLogin.php" class="btn btn-secondary">Login</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </nav>