<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include '../PHP/general.php'
    ?>
    <link rel="stylesheet" href="./CSS/adminDashboard.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['admin_id'])) {
        include '../PHP/connection.php';
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
                        <a class="nav-link" href="PHP/viewReports.php">Reports</a>
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
                                <a href="PHP/adminLogout.php" class="btn btn-outline-secondary login-btn me-md-2">Logout</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <h4 class="mt-3">Choose An Action</h4>
            <p>
            <h5>Tours</h5> / <a href="PHP/addTour.php">Add A Tour</a> / <a href="PHP/chooseTour.php">Edit A Tour</a></p>
            <p>
            <h5>Travel</h5><b>Bus</b> / <a href="PHP/addTravel.php?type=bus">Add A Bus</a> / <a href="PHP/viewTravel.php?type=bus">View and Edit Bus Records</a>
            <br />
            <b>Cruise</b> / <a href="PHP/addTravel.php?type=cruise">Add A Cruise</a> / <a href="PHP/viewTravel.php?type=cruise">View and Edit A Cruise</a>
            <br />
            <b>Flight</b> / <a href="PHP/addTravel.php?type=flight">Add A Flight</a> / <a href="PHP/viewTravel.php?type=flight">Edit A Flight</a></p>
            <p>
            <h5>Tour Guides</h5> / <a href="PHP/addGuide.php">Add A Tour Guide</a> / <a href="PHP/viewGuides.php">View and Edit Guides</a></p>
            <p>
            <h5>Accomodation</h5> / <a href="PHP/addAccomodation.php">Add An Accomodation</a> / <a href="PHP/viewAccomodation.php">View and Edit Accomodations</a></p>
            <p>
            <h5>Reports</h5> / <a href="PHP/viewReports.php">View Reports</a>
            </p>

        </div>
        <footer>
            <div class="container">
                <div class="row align-items-start">
                    <div class="col footer-col text-center">
                        <div class="col-8 align-items-center">
                            <a class="footer-img" href="../index.php">
                                <img src="../assets/logo/Roaming Roads Invert.png" alt="Roaming Roads" class="logo footer-logo">
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
                            <li><a href="chooseTour.php">Create A Custom Package</a></li>
                            <li><a href="career.php">Careers</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="articles.php">Articles</a></li>
                            <li><a href="allTours.php">Destinations</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col text-center footer-col social">
                        Connect With Us
                        <ul class="social-links-container">
                            <li><a href="https://twitter.com" target="_blank"><img src="../assets/social logos/twitter-light.svg" class="social-logo" onmouseover="twitter_hover(1, this)" onmouseout="twitter_hover(2, this)" /></a></li>
                            <li><a href="#"><img src="../assets/social logos/instagram-light.svg" class="social-logo" onmouseover="instagram_hover(1, this)" onmouseout="instagram_hover(2, this)" /></li>
                            <li><a href="#"><img src="../assets/social logos/facebook-light.svg" class="social-logo" onmouseover="facebook_hover(1, this)" onmouseout="facebook_hover(2, this)" /></a></li>
                            <li><a href="#"><img src="../assets/social logos/linkedin-light.svg" class="social-logo" onmouseover="linkedin_hover(1, this)" onmouseout="linkedin_hover(2, this)" /></a></li>
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
        <script src="../JS/footer.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
    } else {
        echo "Access Denied";
    }
    ?>

</body>

</html>