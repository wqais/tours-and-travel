<?php

$tourTitle = $_POST['tour-title'];
$tourShortDesc = $_POST['tour-description'];
$tourLongDesc = $_POST['tour-long-description'];
$tourPrice = $_POST['tour-price'];
$tourRating = 5;
$tourCountry = $_POST['tour-country'];
$tourRegion = $_POST['tour-region'];
$tourMonth = $_POST['tour-month'];
$tourStartDate = $_POST['tour-start-date'];
$tourEndDate = $_POST['tour-end-date'];
$tourFood = $_POST['food-provided'];
$tourImage = "assets/tour images/".$_POST['tour-image'];
$tourPackage = $_POST['tour-package'];
$date1 = new DateTime($tourStartDate);
$later = new DateTime($tourEndDate);
$abs_diff = $later->diff($date1)->format("%a") + 2;

include '../../PHP/connection.php';

$insertDetails = "INSERT INTO `tours` (`tour_title`, `tour_desc`, `tour_long_desc`, `tour_price`, `tour_avg_rating`, `tour_dest`, `tour_region`, `tour_month`, `tour_start_date`, `tour_end_date`, `food_provided`, `tour_img`) VALUES ('$tourTitle','$tourShortDesc','$tourLongDesc','$tourPrice','$tourRating','$tourCountry','$tourRegion','$tourMonth','$tourStartDate','$tourEndDate','$tourFood','$tourImage')";
$tourRes = $conn->query($insertDetails);
$insertPackage = "INSERT INTO `package`(`tour_id`, `pack_duration`, `pack_type`) VALUES ((SELECT tour_id FROM tours WHERE tour_title = '$tourTitle'), '$abs_diff','$tourPackage')";
$packageRes =  $conn->query($insertPackage);
if ($tourRes && $packageRes) {
    echo "Tour added";
} else {
    echo "Tour not added";
    echo mysqli_error($conn);
}

?>