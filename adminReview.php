<?php 
    $title = "Admin Review";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Review list</h3>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Site</th>
                <th>Customer</th>
                <th>Rating</th>
                <th>Submitted At</th>
                <th>Message</th>
            </tr>
            <?php 
                $query = "SELECT Site.Name AS SiteName, Site.Id AS SiteId, Review.* FROM Review
                INNER JOIN Site ON Review.SiteId = Site.Id
                ORDER BY CreatedAt DESC";
                $run = mysqli_query($connect, $query);
                $index = 1;
                while($row = mysqli_fetch_array($run)) :
            ?>
            <tr>
                <td><?= $index ?>.</td>
                <td>
                    <?php
                        echo "<a href='adminSiteDetails.php?id=$row[SiteId]' class='admin-link'>" . $row['SiteName'] .
                        "</a>";
                    ?>
                </td>
                <td>
                    <?php
                        $getUser = "SELECT * FROM Customer WHERE Id = '$row[CustomerId]'";
                        $run2 = mysqli_query($connect, $getUser);
                        $row2 = mysqli_fetch_array($run2);
                        echo $row2['FirstName'] . ' ' . $row2['SurName'];
                    ?>
                </td>
                <td><?= $row['Rating'] ?></td>
                <td>
                    <?php
                        $datetime = new DateTime($row['CreatedAt']);
                        $formattedDatetime = $datetime->format("F j, Y / g:i A");
                        echo $formattedDatetime;    
                    ?>
                </td>
                <td>
                    <details>
                        <summary>Details</summary>
                        <p><?= $row['Message'] ?></p>
                    </details>
                </td>
            </tr>
            <?php
                $index++;
                endwhile;
            ?>
        </table>
    </div>
</main>

<?php 
    include('adminFooter.php');
?>