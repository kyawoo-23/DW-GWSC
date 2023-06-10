<?php 
    $title = "Admin Pitch";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Pitches</h3>
        <a href="adminPitchCreate.php" class="admin-create-btn">
            <img class="icon-sm" src="./assets/static/icons/plus.svg" alt="plus icon">
            <span>Create Pitch</span>
        </a>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Site</th>
                <th>Activity</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Availability</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    <img src="./assets/static/images/slide5.jpg" alt="">
                </td>
                <td>pitch name</td>
                <td>site name</td>
                <td>activity name</td>
                <td>start date</td>
                <td>end date</td>
                <td>price</td>
                <td>No</td>
                <td>Yes</td>
                <td>
                    <div class="admin-table-btn-gp">
                        <a href="" class="btn admin-table-btn">
                            <img class="icon-sm" src="./assets/static/icons/update.svg" alt="update icon">
                            Update
                        </a>
                        <a href="" class="btn admin-table-btn">
                            <img src="./assets/static/icons/delete.svg" alt="delete icon" class="icon-sm">
                            Delete
                        </a>
                    </div>
                </td>
            </tr>

            <tr>
                <td>1</td>
                <td>
                    <img src="./assets/static/images/slide5.jpg" alt="">
                </td>
                <td>pitch name</td>
                <td>site name</td>
                <td>activity name</td>
                <td>start date</td>
                <td>end date</td>
                <td>price</td>
                <td>No</td>
                <td>Yes</td>
                <td>
                    <div class="admin-table-btn-gp">
                        <a href="" class="btn admin-table-btn">
                            <img class="icon-sm" src="./assets/static/icons/update.svg" alt="update icon">
                            Update
                        </a>
                        <a href="" class="btn admin-table-btn">
                            <img src="./assets/static/icons/delete.svg" alt="delete icon" class="icon-sm">
                            Delete
                        </a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</main>

<?php 
    include('adminFooter.php');
?>