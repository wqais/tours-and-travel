<?php

$hotelID = $_POST['hotel-id'];
$name = $_POST['hotel-name'];

include '../../PHP/connection.php';
$updateHotel = "UPDATE `accomodation` SET `hotel_name`='$name' WHERE hotel_id = '$hotelID'";
$hotelRes = $conn->query($updateHotel);
if ($hotelRes) {
    echo "Hotel updated";
    echo "<br />";  
    echo "Taking you back the the previous page";
    header( "refresh:3; url=viewAccomodation.php" );
} else {
    echo "Hotel not updated";
    echo mysqli_error($conn);
}
?>