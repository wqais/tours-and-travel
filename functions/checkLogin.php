<?php
session_start();
if (isset($_SESSION['user_id'])) {
    require_once 'connection.php';
    $custID = $_SESSION['user_id'];
    $getUser = "select * from customer where cust_id = '$custID'";
    $userRes = $conn->query($getUser);
    $user = mysqli_fetch_assoc($userRes);
}
?>