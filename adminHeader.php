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
    <link rel="stylesheet" type="text/css" href="./assets/styles.css?<?php echo time(); ?>">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <div class="head">
            <div>
                <img class="logo-icon admin" src="./assets/static/icons/logo_admin.svg" alt="GWSC logo">
            </div>
            <div class="nav-info">
                <a href="" class="nav-user-info admin">
                    <img class="nav-user-img" src="https://loremflickr.com/320/240" alt="user img">
                    <span>Admin User</span>
                </a>
                <a href="" class="btn-circle btn-circle-secondary">
                    <img class="icon-sm" src="./assets/static/icons/logout.svg" alt="logout icon">
                </a>
                <!-- <a href="" class="btn btn-secondary">Login</a> -->
            </div>
            <div class="nav-menu">
                <div class="burger admin">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="foot">
            <div class="nav-item admin active">
                <a href="">Booking</a>
            </div>
            <div class="nav-item admin">
                <a href="">Site</a>
            </div>
            <div class="nav-item admin">
                <a href="">Pitch</a>
            </div>
            <div class="nav-item admin">
                <a href="">Admin</a>
            </div>
            <div class="nav-item admin">
                <a href="">Customer</a>
            </div>
            <div class="nav-item admin">
                <a href="">Review</a>
            </div>
            <div class="nav-item admin">
                <a href="">Contact</a>
            </div>
        </div>
    </nav>

    <nav class="mobile-navbar">
        <div class="mobile-nav-container">
            <div class="mobile-nav-item admin active">
                <a href="">Booking</a>
            </div>
            <div class="mobile-nav-item admin">
                <a href="">Site</a>
            </div>
            <div class="mobile-nav-item admin">
                <a href="">Pitch</a>
            </div>
            <div class="mobile-nav-item admin">
                <a href="">Admin</a>
            </div>
            <div class="mobile-nav-item admin">
                <a href="">Customer</a>
            </div>
            <div class="mobile-nav-item admin">
                <a href="">Review</a>
            </div>
            <div class="mobile-nav-item admin">
                <a href="">Contact</a>
            </div>
            <div class="mobile-nav-item">
                <a href="" class="btn btn-secondary">Login</a>
            </div>
            <div class="mobile-nav-user">
                <a href="" class="nav-user-info">
                    <img class="nav-user-img" src="https://loremflickr.com/320/240" alt="user img">
                    <span>Kyaw Oo</span>
                </a>
                <a href="" class="btn-circle btn-circle-secondary">
                    <img class="icon-sm" src="./assets/static/icons/logout.svg" alt="logout icon">
                </a>
            </div>
        </div>
    </nav>