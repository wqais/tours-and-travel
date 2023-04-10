<?php
include 'connection.php';
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$ph_no = $_POST["ph_no"];
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
$insertDetails = "INSERT INTO `customer`( `cust_fname`, `cust_lname`, `cust_ph_no`, `cust_email`, `cust_password_hash`) VALUES ('$fname','$lname','$ph_no','$email','$password_hash');";
$res = $conn->query($insertDetails);
if ($res) {
    $getCust = "select * from customer where cust_email = '$email'";
    echo $email;
    $custRes = $conn->query($getCust);
    $customer = mysqli_fetch_assoc($custRes);
    session_set_cookie_params(3600, "/");
    session_start();
    $_SESSION['user_id'] = $customer['cust_id'];
    $_SESSION['user_email'] = $customer['cust_email'];
    if (isset($_SESSION['return_to'])) {
        $return_to = $_SESSION['return_to'];
        unset($_SESSION['return_to']);
        header("Location: $return_to");
    } else {
        header("Location: login.php");
    }
    exit();
} else {
    die(mysqli_errno($conn));
}
