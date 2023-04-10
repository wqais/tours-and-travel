<?php

$email = $_POST['email'];
$password = $_POST['password'];
require_once '../..//PHP/connection.php';

if (isset($_POST['submit-btn'])) {
    $loginDetails = "select * from admin where admin_email = '$email'";
    $res = $conn->query($loginDetails);
    while ($admin = mysqli_fetch_assoc($res)) {
        if (password_verify($password, $admin['admin_password_hash'])) {
            session_start();
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_email'] = $admin['admin_email'];
            header("Location: ../adminDashboard.php");
        } else {
            echo mysqli_errno($conn);
            echo $admin['admin_password_hash'];
            echo $admin['admin_email'];
        }
    }
}

// $password_hash = password_hash($password, PASSWORD_DEFAULT);
// $insertDetails = "INSERT INTO `admin`(`admin_email`, `admin_password_hash`) VALUES ('$email','$password_hash');";
// $res = $conn->query($insertDetails);
// if ($res) {
//     echo "Admin added";
// } else {
//     echo "Admin not added";
// }
