<?php
session_start();
require_once '../../PHP/connection.php';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid nav">
    <a class="navbar-brand" href="../index.php">
      <img src="../../assets/logo/Roaming Roads.png" alt="Roaming Roads" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="../index.php">Home</a>
        <a class="nav-link" href="viewReports.php">Reports</a>
        <div class="login-btn-container">
          <?php
          if (isset($_SESSION['admin_id'])) {
          ?>
            <div class="dropdown-center">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>Hello, Admin</span>
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="PHP/adminLogout.php">Log Out</a></li>
              </ul>
            </div>
          <?php
          } else {
            $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
          ?>
            <a href="adminLogout.php" class="btn btn-outline-secondary login-btn me-md-2">Logout</a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</nav>