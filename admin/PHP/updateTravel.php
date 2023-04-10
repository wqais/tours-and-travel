<?php


include '../../PHP/connection.php';
$mode = $_POST['mode'];
$mode_id = $_POST['mode-id'];
$totalSeats = $_POST['total-seats'];
$adultSeats = $_POST['adult-seats'];
$availAdultSeats = $_POST['avail-adult-seats'];
$childSeats = $_POST['child-seats'];
$availChildSeats = $_POST['avail-child-seats'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$otherDest = $_POST['other-dest'];

$insertDetails = "UPDATE `$mode` SET total_seats = $totalSeats, adult_seats = $adultSeats, available_adult_seats = $availAdultSeats, child_seats = $childSeats, available_child_seats = $availChildSeats, dept_city = '$departure', final_city = '$arrival', final_city_opt = '$otherDest' WHERE $mode"."_id = $mode_id";
$insertRes = $conn->query($insertDetails);
if ($insertRes) {
    echo "Success";
    echo "<br />";  
    echo "Taking you back";
    header( "refresh:3; url=../adminDashboard.php" );
} else {
    echo "Failed";
    echo mysqli_error($conn);
}

?>