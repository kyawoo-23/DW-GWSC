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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <div class="head">
            <div>
                <img class="logo-icon" src="./assets/static/icons/logo.svg" alt="GWSC logo">
            </div>
            <div class="nav-search-bar">
                <form class="nav-search-form">
                    <div class="anydayBtn">Anyday</div>
                    <div class="anywhereBtn">Anywhere</div>
                    <button class="btn-circle btn-circle-secondary">
                        <img class="icon-sm" src="./assets/static/icons/search.svg" alt="search icon">
                    </button>
                </form>
            </div>
            <div class="nav-info">
                <a href="" class="nav-user-info">
                    <img class="nav-user-img" src="https://loremflickr.com/320/240" alt="user img">
                    <span>Kyaw Oo</span>
                </a>
                <a href="" class="btn-circle btn-circle-primary">
                    <img class="icon-sm" src="./assets/static/icons/booking.svg" alt="booking icon">
                </a>
                <a href="" class="btn-circle btn-circle-secondary">
                    <img class="icon-sm" src="./assets/static/icons/logout.svg" alt="logout icon">
                </a>
                <!-- <a href="" class="btn btn-secondary">Login</a> -->
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
        <div id="mobileSearchForm">
            <form class="nav-search-form mobile-nav-search-form">
                <div class="anydayBtn">Anyday</div>
                <div class="anywhereBtn">Anywhere</div>
                <button class="btn-circle btn-circle-secondary">
                    <img class="icon-sm" src="./assets/static/icons/search.svg" alt="search icon">
                </button>
            </form>
        </div>
    </nav>

    <nav class="mobile-navbar">
        <div class="mobile-nav-container">
            <div class="mobile-nav-item active">
                <a href="">Home</a>
            </div>
            <div class="mobile-nav-item">
                <a href="">Information</a>
            </div>
            <div class="mobile-nav-item">
                <a href="">Pitch types</a>
            </div>
            <div class="mobile-nav-item">
                <a href="">Features</a>
            </div>
            <div class="mobile-nav-item">
                <a href="">Local Attractions</a>
            </div>
            <div class="mobile-nav-item">
                <a href="">Reviews</a>
            </div>
            <div class="mobile-nav-item">
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
                <a href="" class="btn-circle btn-circle-primary">
                    <img class="icon-sm" src="./assets/static/icons/booking.svg" alt="booking icon">
                </a>
                <a href="" class="btn-circle btn-circle-secondary">
                    <img class="icon-sm" src="./assets/static/icons/logout.svg" alt="logout icon">
                </a>
            </div>
        </div>
    </nav>

    <dialog class="modal" id="anydayModal">
        <form class="modal-form" id="anydayModalForm">
            <div class="modal-header">
                Please choose your travel date
                <button formmethod="dialog" type="button" class="close-btn">
                    <img class="icon-sm" src="./assets/static/icons/xmark.svg" alt="close icon">
                </button>
            </div>
            <div class="modal-body">
                <input type="date" class="search-day" name="searchDay" required>
            </div>
            <div class="modal-footer">
                <button formmethod="dialog" type="reset" id="resetSearchDayBtn" class="btn-lg btn-muted">Clear</button>
                <button formmethod="dialog" type="submit" class="btn-lg btn-primary">Choose</button>
            </div>
        </form>
    </dialog>

    <dialog class="modal" id="anywhereModal">
        <form class="modal-form" id="anywhereModalForm">
            <div class="modal-header">
                Please choose your travel destination
                <button formmethod="dialog" type="button" class="close-btn">
                    <img class="icon-sm" src="./assets/static/icons/xmark.svg" alt="close icon">
                </button>
            </div>
            <div class="modal-body">
                <select class="search-site" name="searchSite" required>
                    <option value="">Available sites</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Japan">Japan</option>
                </select>
            </div>
            <div class="modal-footer">
                <button formmethod="dialog" type="reset" id="resetSearchSiteBtn" class="btn-lg btn-muted">Clear</button>
                <button formmethod="dialog" type="submit" class="btn-lg btn-primary">Choose</button>
            </div>
        </form>
    </dialog>