<?php

$tourID = $_POST['tour-id'];
$fname = $_POST['guide-fname'];
$lname = $_POST['guide-lname'];
$phone = $_POST['guide-phone'];
$email = $_POST['guide-email'];
$guideRating = 5;

include '../../PHP/connection.php';

$insertGuideDetails = "INSERT INTO `tour_guide`(`tour_id`, `guide_fname`, `guide_lname`, `guide_email`, `guide_ph_no`, `guide_rating`) VALUES ('$tourID','$fname','$lname','$email','$phone', '$guideRating')";
$guideRes = $conn->query($insertGuideDetails);
if ($guideRes) {
    echo "Guide added";
} else {
    echo "Guide not added";
    echo mysqli_error($conn);
}
?>