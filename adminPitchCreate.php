<?php 
    $title = "Admin Pitch";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Create Pitch</h3>
    </div>
    <form action="" method="POST" class="admin-create-form admin-create-form-3">
        <div class="admin-input-form">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Pitch name" required>
        </div>

        <div class="admin-input-form">
            <label for="location">Featured Pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="true" name="isFeatured">
                    <span class="checkmark"></span>
                </label>
                <br>
                <label class="custom-radio">No
                    <input type="radio" value="false" name="isFeatured" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" placeholder="Site price" required>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" rows="5" placeholder="Site descriptions" required></textarea>
        </div>

        <div class="admin-input-form">
            <label for="siteImage">Site Image</label>
            <input type="file" name="image" id="siteImage" accept="image/*" placeholder="Site image" required>
        </div>

        <div class="col-span-2 site-chosen-img">
            <span class="img-preview">Image preview</span>
            <img title="image preview" id="siteChosenImg" src="./assets/static/images/no-image.jpg" alt="site image">
        </div>

        <button class="admin-submit-btn" type="submit">Create Site</button>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>