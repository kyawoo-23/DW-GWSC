<?php
include('connect.php');

$redirectURL = "adminSite.php";

if (isset($_GET['id'])) {
    $siteId = $_GET['id'];

    // Delete from Feature table 
    $deleteFeatureQuery = "DELETE FROM Feature WHERE SiteId = '$siteId'";
    if (!mysqli_query($connect, $deleteFeatureQuery)) {
        $errorMessage = "Something went wrong while deleting features from site";
        echo "<script>alert('$errorMessage')</script>";
    }

    // Delete from Pitch table
    $deletePitchQuery = "DELETE FROM Pitch WHERE SiteId = '$siteId'";
    if (!mysqli_query($connect, $deletePitchQuery)) {
        $errorMessage = "Something went wrong while deleting pitch from the site";
        echo "<script>alert('$errorMessage')</script>";
    }

    // Delete from Site table
    $deleteSiteQuery = "DELETE FROM Site WHERE Id = '$siteId'";
    if (mysqli_query($connect, $deleteSiteQuery)) {
        echo "<script>window.location.href = '$redirectURL'</script>";
        exit();
    } else {
        $errorMessage = "Something went wrong while deleting the site";
        echo "<script>alert('$errorMessage')</script>";
    }
}

echo "<script>window.location.href = '$redirectURL';</script>";
exit();
?>