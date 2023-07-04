<?php 
    $title = "Admin Booking";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Booking list</h3>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Booking Id</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Pitch Id</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Booking Date</th>
                <th>Card Type</th>
                <!-- <th>Card Info</th> -->
                <th>Billing Address</th>
                <th>Remark</th>
            </tr>
            <?php 
                $query = "SELECT * FROM Booking ORDER BY CreatedAt DESC";
                $run = mysqli_query($connect, $query);
                $index = 1;
                while($row = mysqli_fetch_array($run)) :
            ?>
            <tr>
                <td><?= $index ?>.</td>
                <td><?= $row['Id'] ?></td>
                <td>
                    <?php
                        $getUser = "SELECT * FROM Customer WHERE Id = '$row[CustomerId]'";
                        $run2 = mysqli_query($connect, $getUser);
                        $row2 = mysqli_fetch_array($run2);
                        echo $row2['FirstName'] . ' ' . $row2['SurName'];
                    ?>
                </td>
                <td><?= $row['Email'] ?></td>
                <td><?= $row['Phone'] ?></td>
                <td>
                    <?php
                        echo "<a href='adminPitchDetails.php?id=$row[PitchId]' class='admin-link'>" . $row['PitchId'] .
                        "</a>";
                    ?>
                </td>
                <td><?= $row['HeadCount'] ?></td>
                <td>£ <?= $row['Price'] ?></td>
                <td>
                    <?php
                        $datetime = new DateTime($row['CreatedAt']);
                        $formattedDatetime = $datetime->format("F j, Y / g:i A");
                        echo $formattedDatetime;    
                    ?>
                </td>
                <td><?= $row['CardType'] ?></td>
                <!-- <td>
                    <div>
                        <div><?= $row['CardNumber'] ?></div>
                        <div><?= $row['CardExpiry'] ?> | <?= $row['CardCvv'] ?></div>
                        <div><?= $row['CardName'] ?></div>
                    </div>
                </td> -->
                <td>
                    <?php 
                        if ($row['Address'] !== "") {
                    ?>
                    <details>
                        <summary>Details</summary>
                        <p><?= $row['Address'] ?></p>
                    </details>
                    <?php
                        }
                        else {
                            echo "No-data";
                        }
                    ?>
                </td>
                <td>
                    <?php 
                        if ($row['Remark'] !== "") {
                    ?>
                    <details>
                        <summary>Details</summary>
                        <p><?= $row['Remark'] ?></p>
                    </details>
                    <?php
                        }
                        else {
                            echo "No-data";
                        }
                    ?>
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