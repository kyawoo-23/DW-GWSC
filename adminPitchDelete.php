<?php
include('connect.php');

$redirectURL = "adminPitch.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM Pitch WHERE Id = '$id'";
    if (mysqli_query($connect, $query)) {
        echo "<script>window.location.href = '$redirectURL'</script>";
        exit();
    } else {
        $errorMessage = "Something went wrong while deleting the pitch";
        echo "<script>alert('$errorMessage')</script>";
    }
}

echo "<script>window.location.href = '$redirectURL';</script>";
exit();
?>