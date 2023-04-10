<?php

session_start();
include 'connection.php';
$tourID = $_GET['tour_id'];
$adultSeats = $_POST['adult-seats'];
$childSeats = $_POST['child-seats'];
$email = $_POST['email'];
$tourGuide = $_POST['guide-select'];
$food = $_POST['food-select'];
$finalCity = $_POST['destination-select'];
$startDate = $_POST['start-date'];
$endDate = $_POST['end-date'];
$custID = $_SESSION['user_id'];
$getTravelDetails = "select * from travel where tour_id='$tourID'";
$res2 = $conn->query($getTravelDetails);
if (!$res2) {
    echo mysqli_error($conn);
}
$hotel = $_POST['hotel-select'];
$getHotelID = "select hotel_id from accomodation where hotel_name = '$hotel'";
$hotelRes = $conn->query($getHotelID);
$hotelDetails = mysqli_fetch_assoc($hotelRes);
$hotelID =   $hotelDetails['hotel_id'];
$travelDetails = mysqli_fetch_assoc($res2);
$travelMode = $travelDetails['travel_type'];
$getPackage = "select * from package where tour_id = '$tourID'";
$packageRes = $conn->query($getPackage);
$package = mysqli_fetch_assoc($packageRes);
$packageID = $package['pack_id'];
$getModeDetails = "select * from $travelMode where tour_id = '$tourID'";
$modeRes = $conn->query($getModeDetails);
$modeDetails = mysqli_fetch_assoc($modeRes);
$deptCity = $modeDetails['dept_city'];
$oldAdultSeats = (int)$modeDetails['available_adult_seats'];
$oldChildSeats = (int)$modeDetails['available_child_seats'];
$newAdultSeats = $oldAdultSeats - (int)$adultSeats;
$newChildSeats = $oldChildSeats - (int)$childSeats;
$finalPrice = $_POST['final-price'];
$adultCost = $_POST['adult-cost'];
$childCost = $_POST['child-cost'];
$guideCost = $_POST['guide-cost'];
$foodCost = $_POST['food-cost'];
$accoCost = $_POST['acco-cost'];
$addDaysCost = $_POST['days-cost'];
$paymentMode = $_POST['payment-mode'];
$now = date("Y-m-d");
$updateSeats = "UPDATE $travelMode SET available_adult_seats = '$newAdultSeats', available_child_seats = '$newChildSeats' WHERE tour_id = '$tourID'";
$updateRes = $conn->query($updateSeats);
if ($updateRes) {
        $insertDetails = "INSERT INTO `custom_tour`( `tour_id`,`cust_id`, `hotel_id`,`c_tour_dept`, `c_tour_dest`, `c_tour_start_date`, `c_tour_end_date`, `c_tour_adult`, `c_tour_child`, `guide_selected`, `food_selected`, `email`,`c_tour_price`) VALUES ('$tourID','$custID','$hotelID', '$deptCity','$finalCity', '$startDate', '$endDate','$adultSeats','$childSeats', '$tourGuide', '$food', '$email', '$finalPrice')";
        $tourRes = $conn->query($insertDetails);
        if ($tourRes) {
            $getTourID = "SELECT c_tour_id FROM custom_tour WHERE cust_id = '$custID' ORDER BY c_tour_id DESC LIMIT 1";
            $tourIDRes = $conn->query($getTourID);
            $tourIDDetails = mysqli_fetch_assoc($tourIDRes);
            $custTourID = $tourIDDetails['c_tour_id'];
            $insertBill = "INSERT INTO `c_tour_bill`(`c_tour_id`, `bill_date`,`adult_seat_cost`, `child_seat_cost`, `guide_cost`, `food_cost`, `acco_cost`, `add_days_cost`, `bill_total`, `payment_mode`) VALUES ('$custTourID','$now','$adultCost', '$childCost','$guideCost','$foodCost','$accoCost','$addDaysCost','$finalPrice','$paymentMode')";
            $billRes = $conn->query($insertBill);
            if ($billRes) {
                header("location: success.php");
            } else {
                echo mysqli_error($conn);
            }
        } else {
            echo mysqli_error($conn);
        }
} else {
    echo mysqli_error($conn);
}
