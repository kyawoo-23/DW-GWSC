<?php 
    $title = "Features";
    include('header.php');
?>

<main>
    <section>
        <h2 class="section-title">Features</h2>

        <div class="features-list">
            <?php
                $select = "SELECT * FROM Facilities";
                $run = mysqli_query($connect, $select);
                while($row = mysqli_fetch_array($run)) :
            ?>
            <div class="feature-item">
                <img src="./assets/static/icons/<?= $row['Name'] ?>.svg" alt="<?= $row['Name'] ?>">
                <span><?= $row['Name'] ?></span>
            </div>
            <?php
                endwhile;
            ?>
        </div>
    </section>
</main>

<?php 
    include('footer.php');
?>