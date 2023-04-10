<?php

session_start();
include 'connection.php';
$tourID = $_GET['tour_id'];
$adultSeats = $_POST['adult-seats'];
$childSeats = $_POST['child-seats'];
$email = $_POST['email'];
$custID = $_SESSION['user_id'];
$getPackage = "select * from package where tour_id = '$tourID'";
$packageRes = $conn->query($getPackage);
$package = mysqli_fetch_assoc($packageRes);
$packageID = $package['pack_id'];
$currentTime = date("H:i:s");
$adultCost = $_POST['adult-cost'];
$childCost = $_POST['child-cost'];  
$date = date("Y/m/d");
$paymentMode = $_POST['payment-mode'];

$insertDetails = "INSERT INTO `booking`( `cust_id`, `pack_id`, `adult_seat`, `child_seat`, `time_of_booking`) VALUES ('$custID','$packageID','$adultSeats','$childSeats','$currentTime');";

$getTravelDetails = "select * from travel where tour_id='$tourID'";
$res2 = $conn->query($getTravelDetails);
$travelDetails = mysqli_fetch_assoc($res2);
$travelMode = $travelDetails['travel_type'];
$getModeDetails = "select * from $travelMode where tour_id = '$tourID'";
$modeRes = $conn->query($getModeDetails);
$modeDetails = mysqli_fetch_assoc($modeRes);
$oldAdultSeats = $modeDetails['available_adult_seats'];
$oldChildSeats = $modeDetails['available_child_seats'];
$newAdultSeats = $oldAdultSeats - $adultSeats;
$newChildSeats = $oldChildSeats - $childSeats;
$updateSeats = "UPDATE $travelMode SET available_adult_seats = '$newAdultSeats', available_child_seats = '$newChildSeats' WHERE tour_id = '$tourID'";
$updateRes = $conn->query($updateSeats);
$insertBill = "INSERT INTO `bill`(`tour_id`, `cust_id`, `adult_seats_cost`, `child_seats_cost`, `bill_date`, `payment_mode`) VALUES ('$tourID','$custID','$adultCost','$childCost','$now', '$paymentMode')";
if ($updateRes) {
    $res = $conn->query($insertDetails);
    if ($res) {
        $bill = $conn->query($insertBill);
        if ($bill) {
            header("Location: success.php");
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo mysqli_error($conn);
    }
} else {
    echo mysqli_error($conn);
}

?>