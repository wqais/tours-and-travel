<?php

$tourID = $_POST['tour-id'];
$tourName = $_POST['tour-title'];
$tourDesc = $_POST['tour-description'];
$tourLongDesc = $_POST['tour-long-description'];
$tourPrice = $_POST['tour-price'];
$tourCountry = $_POST['tour-country'];
$tourRegion = $_POST['tour-region'];
$tourMonth = $_POST['tour-month'];
$tourStartDate = $_POST['tour-start-date'];
$tourEndDate = $_POST['tour-end-date'];
$tourFood = $_POST['food-provided'];
$fileName = $_FILES['tour-image']['name'];
$tourImage = "assets/tour images/".$fileName;
$date1 = new DateTime($_POST['tour-start-date']);
$later = new DateTime($_POST['tour-end-date']);
$abs_diff = $later->diff($date1)->format("%a") + 2;

include '../../PHP/connection.php';
$updateTour = "UPDATE `tours` SET `tour_title`='$tourName',`tour_desc`='$tourDesc',`tour_long_desc`='$tourLongDesc',`tour_price`='$tourPrice',`tour_dest`='$tourCountry',`tour_region`='$tourRegion',`tour_month`='$tourMonth',`tour_start_date`='$tourStartDate',`tour_end_date`='$tourEndDate',`food_provided`='$tourFood',`tour_img`='$tourImage' WHERE `tour_id`='$tourID'";
$tourRes = $conn->query($updateTour);
$updatePackage = "UPDATE `package` SET `pack_duration` = '$abs_diff' WHERE `tour_id` = '$tourID'";
$packageRes = $conn->query($updatePackage);
if ($tourRes && $packageRes) {
    echo "Tour updated";
    echo "<br />";  
    echo "Taking you back the the previous page";
    header( "refresh:3; url=chooseTour.php" );
} else {
    echo "Tour not updated";
    echo mysqli_error($conn);
    echo mysqli_errno($conn);
}

?>