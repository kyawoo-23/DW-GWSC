<?php 
    $title = "Admin Contact";
    include('adminHeader.php');
?>

<main>
    <div class="admin-page-title">
        <h3>Contact list</h3>
    </div>

    <div class="adminTable">
        <table>
            <tr>
                <th>No.</th>
                <th>Contact Id</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Contacted At</th>
                <th>Message</th>
            </tr>
            <?php 
                $query = "SELECT * FROM Contact";
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