<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
            if (isset($title)) {
                echo $title . " | GWSC";
            }
            else {
                echo "GWSC";
            }
        ?>
    </title>
    <link rel="stylesheet" type="text/css" href="./assets/styles.css?<?php echo time(); ?>">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar">
    <div class="head">
        <div>
            <img class="logo-icon" src="./assets/static/icons/logo.svg" alt="GWSC logo">
        </div>
        <div class="nav-search-bar">
            
        </div>
        <div class="nav-info">
            <a href="" class="nav-user-info">
                <img class="nav-user-img" src="https://loremflickr.com/320/240" alt="user img">
                <span>Kyaw Oo</span>
            </a>
            <!-- <a href="" class="btn login-link-btn">Login</a> -->
        </div>
        <div class="nav-menu">
              <div class="burger">
                <span></span>
                <span></span>
                <span></span>
              </div>
        </div>
    </div>
    <div class="foot">
        <div class="nav-item active">
            <a href="">Home</a>
        </div>
        <div class="nav-item">
            <a href="">Information</a>
        </div>
        <div class="nav-item">
            <a href="">Pitch types</a>
        </div>
        <div class="nav-item">
            <a href="">Features</a>
        </div>
        <div class="nav-item">
            <a href="">Local Attractions</a>
        </div>
        <div class="nav-item">
            <a href="">Reviews</a>
        </div>
        <div class="nav-item">
            <a href="">Contact</a>
        </div>
    </div>
</nav>


<script type="text/javascript">
    $(".burger").on('click', function() {
        $(".burger").toggleClass("open")
    })
</script>