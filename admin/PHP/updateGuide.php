<?php

$guideID = $_POST['guide-id'];
$tourID = $_POST['tour-id'];
$fname = $_POST['guide-fname'];
$lname = $_POST['guide-lname'];
$phone = $_POST['guide-phone'];
$email = $_POST['guide-email'];

include '../../PHP/connection.php';
$updateGuide = "UPDATE `tour_guide` SET `tour_id`='$tourID',`guide_fname`='$fname',`guide_lname`='$lname',`guide_email`='$email',`guide_ph_no`='$phone' WHERE guide_id = '$guideID'";
$guideRes = $conn->query($updateGuide);
if ($guideRes) {
    echo "Guide updated";
    echo "<br />";  
    echo "Taking you back the the previous page";
    header( "refresh:3; url=../viewGuides.php" );
} else {
    echo "Guide not updated";
    echo mysqli_error($conn);
}
?>
