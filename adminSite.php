<?php 
    $title = "Admin Site";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Sites</h3>
        <div class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <a href="adminSiteCreate.php">Create Site</a>
        </div>
    </div>
</main>

<?php 
    include('adminFooter.php');
?>