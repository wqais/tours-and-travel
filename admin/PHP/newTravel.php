<?php

$mode = $_POST['travel-type'];
$tourID = $_POST['tour-id'];
$totalSeats = $_POST['total-seats'];
$deptCity = $_POST['dept-city'];
$finalCity = $_POST['final-city'];
$otherCity = $_POST['other-city'];
$adultSeats = 0.7 * $totalSeats;
$childSeats = 0.3 * $totalSeats;

include '../../PHP/connection.php';

$insertDetails = "INSERT INTO `$mode` (`tour_id`, `total_seats`, `adult_seats`, `available_adult_seats`, `child_seats`, `available_child_seats`,`dept_city`, `final_city`, `final_city_opt`) VALUES ('$tourID', '$totalSeats','$adultSeats', '$adultSeats','$childSeats', '$childSeats', '$deptCity', '$finalCity', '$otherCity')";
$travelRes = $conn->query($insertDetails);
if ($travelRes) {
    echo "Travel added";
    echo "<br />";
    echo "Taking you back the the previous page";
    header("refresh:3; url=../adminDashboard.php");
} else {
    echo "Travel not added";
    echo mysqli_error($conn);
}
