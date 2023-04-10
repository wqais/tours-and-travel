
<?php
require_once 'connection.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $loginDetails = "select * from customer where cust_email = '$email'";
    $res = $conn->query($loginDetails);
    while($user = mysqli_fetch_assoc($res)) {
        if (password_verify($_POST["password"], $user['cust_password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['cust_id'];
            $_SESSION['user_email'] = $user['cust_email'];
            if (isset($_SESSION['return_to'])) {
                $return_to = $_SESSION['return_to'];
                header("Location: $return_to");
                unset($_SESSION['return_to']);
              } else {
                header("Location: index.php");
              }
        } else {
            echo "failed";
    }
}
}
?>


