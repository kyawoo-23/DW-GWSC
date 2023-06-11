<?php
include('connect.php');

$redirectURL = "adminLocalAttraction.php";

if (isset($_GET['id'])) {
    $attractionId = $_GET['id'];

    $deleteSiteQuery = "DELETE FROM LocalAttraction WHERE Id = '$attractionId'";
    if (mysqli_query($connect, $deleteSiteQuery)) {
        echo "<script>window.location.href = '$redirectURL'</script>";
        exit();
    } else {
        $errorMessage = "Something went wrong while deleting the local attraction";
        echo "<script>alert('$errorMessage')</script>";
    }
}

echo "<script>window.location.href = '$redirectURL';</script>";
exit();
?>