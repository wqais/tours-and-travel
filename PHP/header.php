<?php
session_start();
require_once 'connection.php';
if (isset($_SESSION['user_id'])) {
  $custID = $_SESSION['user_id'];
  $getUser = "select * from customer where cust_id = '$custID'";
  $userRes = $conn->query($getUser);
  $user = mysqli_fetch_assoc($userRes);
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid nav">
    <a class="navbar-brand" href="../index.php">
      <img src="../assets/logo/Roaming Roads.png" alt="Roaming Roads" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../index.php">Home</a>
        <a class="nav-link" href="allTours.php">Destinations</a>
        <a class="nav-link" href="chooseTour.php">Customized Tours</a>
        <a class="nav-link" href="contact.php">Contact</a>
        <div class="login-btn-container">
          <?php
          if (isset($_SESSION['user_id'])) {
            $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
          ?>
            <div class="dropdown-center">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Hello, <?php echo $user['cust_fname']; ?></span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Manage Profile</a></li>
                <li><a class="dropdown-item" href="userBookings.php">View Bookings</a></li>
                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
              </ul>
            </div>
          <?php
          } else {
            $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
          ?>
            <a href="login.php" class="btn btn-outline-secondary login-btn me-md-2">Login / Register</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</nav>