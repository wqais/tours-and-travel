<?php
include 'connection.php';
session_start();
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["edit-email"];
$ph_no = $_POST["ph_no"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$custID = $_SESSION['user_id'];
$getCustomer = "SELECT * FROM customer WHERE cust_id=$custID";
$custRes = $conn->query($getCustomer);
$cust = mysqli_fetch_assoc($custRes);
$oldEmail = $cust['cust_email'];

if ($email == $oldEmail) {
    $insertDetails = "UPDATE `customer` SET `cust_fname` = '$fname', `cust_lname` = '$lname', `cust_ph_no` = '$ph_no' WHERE `cust_id` = '$custID'";
} else {
    $insertDetails = "UPDATE `customer` SET `cust_fname` = '$fname', `cust_lname` = '$lname', `cust_ph_no` = '$ph_no', `cust_email` = '$email' WHERE `cust_id` = '$custID'";
}
if (password_verify($_POST["password"], $cust['cust_password_hash'])) {
    $res = $conn->query($insertDetails);
    if ($res) {
        echo "succesful";
        header("location: profile.php");
    } else {
        echo mysqli_error($conn);
    }
}
