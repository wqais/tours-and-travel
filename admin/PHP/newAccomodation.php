<?php

$tourID = $_POST['tour-id'];
$name = $_POST['hotel-name'];
include '../../PHP/connection.php';

$insertHotelDetails = "INSERT INTO `accomodation`(`tour_id`, `hotel_name`) VALUES ('$tourID','$name')";
$hotelRes = $conn->query($insertHotelDetails);
if ($hotelRes) {
    echo "Hotel added";
    header( "refresh:1; url=addAccomodation.php");
} else {
    echo "Hotel not added";
    echo mysqli_error($conn);
}

?>