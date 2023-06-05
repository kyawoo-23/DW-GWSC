<?php 
    $title = "Admin Site";
    include('adminHeader.php');
?>

<main>
    <a href="adminSiteCreate.php" class="admin-page-title">
        <h3>Sites</h3>
        <div class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <span>Create Site</span>
        </div>
    </a>
</main>

<?php 
    include('adminFooter.php');
?>