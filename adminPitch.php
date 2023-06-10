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
                <td>
                    <a href="" class="btn admin-table-btn">Update</a>
                    <a href="" class="btn admin-table-btn">Delete</a>
                </td>
            </tr>
        </table>
    </div>


    <div class="featured-pitch-list">
        <div class="pitch-card">
            <div class="pitch-card-img">
                <img src="./assets/static/images/slide3.jpg" alt="">
            </div>
            <div class="pitch-card-body admin">
                <h3 class="pitch-card-title">Pitch title</h3>
                <a class="btn btn-white" href="">Details</a>
            </div>
        </div>

        <div class="pitch-card">
            <div class="pitch-card-img">
                <img src="./assets/static/images/slide3.jpg" alt="">
            </div>
            <div class="pitch-card-body admin">
                <h3 class="pitch-card-title">Pitch title alsd lka sflj aslf las fdl a sdl;a fd;l a fa ls</h3>
                <a class="btn btn-white" href="">Details</a>
            </div>
        </div>

        <div class="pitch-card">
            <div class="pitch-card-img">
                <img src="./assets/static/images/slide3.jpg" alt="">
            </div>
            <div class="pitch-card-body admin">
                <h3 class="pitch-card-title">Pitch title</h3>
                <a class="btn btn-white" href="">Details</a>
            </div>
        </div>
    </div>
</main>

<?php 
    include('adminFooter.php');
?>