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
            <label for="isFeatured">Featured pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="true" name="isFeatured">
                    <span class="checkmark"></span>
                </label>
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

        <div class="admin-input-form">
            <label for="site">Site</label>
            <div class="dropdown-gp">
                <select name="site" id="site">
                    <option value="Myanmar">Myanmar</option>
                    <option value="Japan">Japan</option>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="activity">Activity</label>
            <div class="dropdown-gp">
                <select name="activity" id="activity">
                    <option value="Myanmar">Wild Swimming</option>
                    <option value="Japan">Camping</option>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="pitchType">Pitch type</label>
            <div class="dropdown-gp">
                <select name="pitchType" id="pitchType">
                    <option value="Myanmar">Motorome</option>
                    <option value="Japan">Caravan</option>
                </select>
            </div>
        </div>

        <div class="admin-input-form">
            <label for="startDate">Start date</label>
            <input type="date" name="startDate" id="startDate" placeholder="Pitch start date" required>
        </div>

        <div class="admin-input-form">
            <label for="endDate">End date</label>
            <input type="date" name="endDate" id="endDate" placeholder="Pitch end date" required>
        </div>

        <div class="admin-input-form">
            <label for="isAvailable">Available pitch</label>
            <div class="radio-gp">
                <label class="custom-radio">Yes
                    <input type="radio" value="true" name="isAvailable" checked>
                    <span class="checkmark"></span>
                </label>
                <label class="custom-radio">No
                    <input type="radio" value="false" name="isAvailable">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <div class="admin-input-form col-span-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" rows="5" placeholder="Pitch descriptions" required></textarea>
        </div>

        <div class="admin-input-form">
            <label for="pitchPrimaryImage">Pitch primary image</label>
            <input type="file" name="pitchPrimaryImage" id="pitchPrimaryImage" accept="image/*"
                placeholder="Pitch primary image" required>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Primary image preview</span>
            <img title="image preview" id="pitchPrimaryChosenImage" src="./assets/static/images/no-image.jpg"
                alt="pitch primary image">
        </div>

        <div class="admin-input-form">
            <label for="pitchImages">Pitch image(s)</label>
            <input type="file" name="pitchImages" id="pitchImages" accept="image/*" placeholder="Pitch images" multiple
                required>
        </div>
        <div class="col-span-2 chosen-img">
            <span class="img-preview">Primary image(s) preview</span>
            <div class="admin-chosen-image-list" id="pitchChosenImages">
                <img title="image preview" src="./assets/static/images/no-image.jpg" alt="pitch primary image">
            </div>
        </div>

        <button class="admin-submit-btn" type="submit">Create Pitch</button>
    </form>
</main>

<?php 
    include('adminFooter.php');
?>