<?php
session_start();
require_once 'PHP/connection.php';
$getTours = "select * from tours limit 0,4";
$res = $conn->query($getTours);
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
if (isset($_SESSION['user_id'])) {
  $custID = $_SESSION['user_id'];
  $getUser = "select * from customer where cust_id = '$custID'";
  $userRes = $conn->query($getUser);
  $user = mysqli_fetch_assoc($userRes);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roaming Roads</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="CSS/general.css" />
  <link rel="stylesheet" href="CSS/index.css" />
  <script src="JS/app.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid nav">
      <a class="navbar-brand" href="index.php">
        <img src="assets/logo/Roaming Roads.png" alt="Roaming Roads" class="logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="#">Home</a>
          <a class="nav-link" href="PHP/allTours.php">Destinations</a>
          <a class="nav-link" href="PHP/chooseTour.php">Customized Tours</a>
          <a class="nav-link" href="PHP/contact.php">Contact</a>
          <div class="login-btn-container">
            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
              <div class="dropdown-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span>Hello, <?php echo $user['cust_fname']; ?></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="PHP/profile.php">Manage Profile</a></li>
                  <li><a class="dropdown-item" href="PHP/userBookings.php">View Bookings</a></li>
                  <li><a class="dropdown-item" href="PHP/logout.php">Log Out</a></li>
                </ul>
              </div>
            <?php
            } else {
              $_SESSION['return_to'] = $_SERVER['REQUEST_URI'];
            ?>
              <a href="PHP/login.php" class="btn btn-outline-secondary login-btn me-md-2">Login / Register</a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <form class="search-form" action="PHP/search.php" method="GET">
    <div class="container search-container mt-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-10">
          <div class="card p-3  py-4">
            <h5>An Easier way to find your preferred Tour</h5>
            <div class="row g-3 mt-2">
              <div class="col-md-3">
                <select class="form-select form-control month-select" name="month-select" aria-label="Choose Month" aria-placeholder="Choose Month" id="month-select">
                  <option selected label=" "></option>
                  <?php
                  foreach ($months as $month) {
                  ?>
                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control dest-search" name="dest-search" id="dest-search" placeholder="Enter destination">
              </div>
              <div class="col-md-3">
                <button class="btn btn-secondary btn-block search-btn" type="submit" name="submit">Search Results</button>
              </div>
            </div>
            <br />
            <p>
              <a class="advanced" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Search with advanced filters
              </a>
            </p>
            <div class="collapse advanced-search justify-content-center" id="collapseExample">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" placeholder="Budget" class="form-control" name="budget">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Region" name="region">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>
  </form>

  <?php
  while ($row = mysqli_fetch_assoc($res)) {
  ?>
    <div class="card-container">
      <div class="card" style="width: 18rem">
        <img src="<?php echo $row["tour_img"] ?>" class="card-img-top" alt="..." />
        <div class="card-body <?php echo $row["tour_dest"] ?>">
          <h5 class="card-title tour-title" name="tour-title"><?php echo $row["tour_title"]; ?></h5>
          <p class="card-text tour-desc">
            <?php echo $row["tour_desc"]; ?>
          </p>
          <p class="card-text tour-price"><b>&#8377; <?php echo $row["tour_price"]; ?> per person</b></p>
          <form action="PHP/bookTour.php" method="GET">
            <?php
            $tourTitle = urlencode($row["tour_title"]);
            ?>
            <a href="PHP/bookTour.php?tour_title=<?php echo $tourTitle ?>" class="btn btn-secondary book-btn">Book Now</a>
          </form>
        </div>
      </div>

    </div>
  <?php
  }
  ?>
  <div class="d-grid gap-2 col-2 mx-auto mt-3">
    <a href="PHP/allTours.php" class="btn btn-secondary view-tours-btn">View All Tours</a>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/tour images/egypt.jpg" class="d-block w-100 carousel-img" alt="Egypt">
        <div class="carousel-caption d-none d-md-block">
          <h5>Desert Safari</h5>
          <p><a href="PHP/bookTour.php?tour_title=Desert+Safari" class="carousel-link">View Tour</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/tour images/london.jpg" class="d-block w-100 carousel-img" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Europe Tour</h5>
          <p><a href="PHP/bookTour.php?tour_title=European+Tour" class="carousel-link">View Tour</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/tour images/grand canyon.jpg" class="d-block w-100 carousel-img" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Grand Canyon Hiking</h5>
          <p><a href="PHP/bookTour.php?tour_title=Grand+Canyon+Hiking" class="carousel-link">View Tour</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <footer>
    <div class="container">
      <div class="row align-items-start">
        <div class="col footer-col text-center">
          <div class="col-8 align-items-center">
            <a class="footer-img" href="index.php">
              <img src="assets/logo/Roaming Roads Invert.png" alt="Roaming Roads" class="logo footer-logo">
            </a>
          </div>
          <div class="col-8">
            <p>Office NA45, Surya Complex, M.G Road, Pune - 411005</p>
            <p>02240 - 42069</p>
            <p>+91 9876543210</p>
          </div>
        </div>
        <div class="col text-center footer-col">
          <ul>
            <li><a href="PHP/chooseTour.php">Create A Custom Package</a></li>
            <li><a href="PHP/career.php">Careers</a></li>
            <li><a href="PHP/about.php">About</a></li>
            <li><a href="PHP/articles.php">Articles</a></li>
            <li><a href="PHP/allTours.php">Destinations</a></li>
            <li><a href="PHP/contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="col text-center footer-col social">
          Connect With Us
          <ul class="social-links-container">
            <li><a href="https://twitter.com"><img src="assets/social logos/twitter-light.svg" class="social-logo" onmouseover="twitter_hover(1, this)" onmouseout="twitter_hover(2, this)" /></a></li>
            <li><a href="#"><img src="assets/social logos/instagram-light.svg" class="social-logo" onmouseover="instagram_hover(1, this)" onmouseout="instagram_hover(2, this)" /></li>
            <li><a href="#"><img src="assets/social logos/facebook-light.svg" class="social-logo" onmouseover="facebook_hover(1, this)" onmouseout="facebook_hover(2, this)" /></a></li>
            <li><a href="#"><img src="assets/social logos/linkedin-light.svg" class="social-logo" onmouseover="linkedin_hover(1, this)" onmouseout="linkedin_hover(2, this)" /></a></li>
          </ul>
          Write To Us
          <br />
          <br />
          <form action="mailto:@roamingroads@gmail.com">
            <input type="submit" value="&#9993; roamingroads@gmail.com" />
          </form>
          <br />
          Copyright &#169; Roaming Roads Co. 2010-2023.
        </div>
      </div>
    </div>
  </footer>
  <script src="JS/index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>