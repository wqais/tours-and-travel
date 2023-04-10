<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'general.php';
    ?>
    <link rel="stylesheet" href="../CSS/bookTour.css" />
</head>

<body>
    <?php
    include 'header.php';
    $tourTitle = $_GET['tour_title'];
    require_once 'connection.php';
    $getTourDetails = "select * from tours where tour_title = '$tourTitle'";
    $res = $conn->query($getTourDetails);
    $tourDetails = mysqli_fetch_assoc($res);
    $adultCost = (int)$tourDetails['tour_price'];
    $childCost = 0.3 * $adultCost;
    $tourID = $tourDetails["tour_id"];
    $getTravelDetails = "select * from travel where tour_id='$tourID'";
    $res2 = $conn->query($getTravelDetails);
    $travelDetails = mysqli_fetch_assoc($res2);
    $travelMode = $travelDetails['travel_type'];
    $getModeDetails = "select * from $travelMode where tour_id = '$tourID'";
    $modeRes = $conn->query($getModeDetails);
    $modeDetails = mysqli_fetch_assoc($modeRes);
    $getGuideDetails = "select * from tour_guide where tour_id = '$tourID'";
    $guideRes = $conn->query($getGuideDetails);
    $guideDetails = mysqli_fetch_assoc($guideRes);
    $hotelDetails = "select * from accomodation where tour_id = '$tourID'";
    $hotelRes = $conn -> query($hotelDetails);
    $hotel = mysqli_fetch_assoc($hotelRes);
    $getPackage = "select * from package where tour_id = '$tourID'";
    $packageRes = $conn->query($getPackage);
    $package = mysqli_fetch_assoc($packageRes);
    ?>
    <div class="container details-container">
        <div class="row align-items-start">
            <div class="row">
                <h3 class="tour-title"><?php echo $tourTitle; ?></h3>
            </div>
            <div class="row">
                <div class="col-8">
                    <p><?php echo $tourDetails['tour_long_desc']; ?></p>
                    <p><b>Tour Description: &nbsp;</b><?php echo $tourDetails['tour_desc']; ?></p>
                    <p><b>Month: &nbsp;</b><?php echo $tourDetails['tour_month']; ?></p>
                    <p><b>Tour Region: &nbsp;</b><?php echo $tourDetails['tour_region']; ?></p>
                    <p><b>Mode Of Travel: &nbsp;</b><span class="travel-mode"><?php echo ucfirst($travelDetails['travel_type']); ?></span></p>
                    <p><b>Departure City: &nbsp;</b><?php echo $modeDetails['dept_city']; ?></p>
                    <p><b>Final City: &nbsp;</b><?php echo $modeDetails['final_city']; ?></p>
                    <p><b>Accomodation: &nbsp;</b><?php echo $hotel['hotel_name']; ?></p>
                    <p><b>Food: &nbsp;</b><?php echo $tourDetails['food_provided']; ?></p>
                </div>
                <div class="col">
                    <img src="../<?php echo $tourDetails['tour_img']; ?>" class="img-fluid" alt="<?php echo $tourTitle; ?>">
                    <div class="tour-desc mt-5">
                        <p><b>Start Date: &nbsp;</b><?php echo $tourDetails['tour_start_date']; ?></p>
                        <p><b>End Date: &nbsp;</b><?php echo $tourDetails['tour_end_date']; ?></p>
                        <p><b>Tour Avg. Rating: &nbsp;</b><?php echo $tourDetails['tour_avg_rating']; ?></p>
                        <p><b>Tour Guide: &nbsp;</b><?php echo $guideDetails['guide_fname'] . " " . $guideDetails['guide_lname']; ?></p>
                        <p><b>Guide Rating: &nbsp;</b><?php echo $guideDetails['guide_rating']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="processBooking.php?tour_id=<?php echo $tourID ?>" id="book-form" class="row g-3">
        <h3>Book a <?php echo $tourTitle; ?> package</h3>
        <h5>Total: &#8377;<span class="total-cost"> <?php echo $adultCost ?></span></h5>
        <div class="col-md-6">
            <label for="adult-seats" class="form-label">Adult Seats: &#8377;<span class="adult-seat-cost"> <?php echo $adultCost ?></span> per head</label>
            <input type="number" class="form-control" id="adult-seats" name="adult-seats" placeholder="1" min="1" max="<?php echo $modeDetails['available_adult_seats'] ?>" value="1" onchange="updatePrice(totalAdultSeats, totalChildSeats)">
            <p><small>Seats available: <span class="adult-available-seats"><?php echo $modeDetails['available_adult_seats'] ?></span></small></p>
        </div>
        <div class="col-md-6">
        <?php if ($package['pack_type'] == "Couples Tour") {
            ?>
            <label for="child-seats" class="form-label">Child Seats not available for couples tour</label>
            <input type="number" class="form-control" disabled />
            <?php
            } else {
            ?>
            <label for="child-seats" class="form-label">Child Seats: &#8377; <span class="child-seat-cost"><?php echo $childCost ?></span> per head</label>
            <input type="number" class="form-control" id="child-seats" name="child-seats" placeholder="0" min="0" max="<?php echo $modeDetails['available_child_seats'] ?>" onchange="updatePrice(totalAdultSeats, totalChildSeats)" value="1">
            <p><small>Seats available: <span class="child-available-seats"><?php echo $modeDetails['available_child_seats'] ?></span></small></p>
            <?php
            }
            ?>
        </div>

        </select>
        </div>
        <div class="col-md-6 payment-container mt-4">
            <span>Choose Payment Mode</span>
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="payment-mode" id="net-banking" checked value="Net Banking">
                <label class="form-check-label" for="net-banking">Net Banking</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment-mode" id="credit-card" value="Credit Card">
                <label class="form-check-label" for="credit-card">
                    Credit Card
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment-mode" id="debit-card" value="Debit Card">
                <label class="form-check-label" for="debit-card">
                    Debit Card
                </label>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" required>
        </div>
        <div class="btn-container mt-4">
            <button type="reset" class="btn btn-primary mb-3">Reset</button>
            <?php if (isset($_SESSION['user_id'])) {
            ?>
                <button type="submit" class="btn btn-primary mb-3 submit-btn">Book Now</button>
            <?php
            } else {
            ?>
                <button type="submit" class="btn btn-secondary mb-3 submit-btn" disabled>Book Now</button>
            <?php
            }
            ?>
        </div>
        <div class="col-md-12 warning-container">
            <?php if (!isset($_SESSION['user_id'])) {
            ?>
                <p class="warning-text">Please login first to book this tour.</p>
            <?php
            }
            ?>
        </div>
        <input type="hidden" name="adult-cost" id="adult-cost" value="0" />
        <input type="hidden" name="child-cost" id="child-cost" value="0" />
        <h5>Didn't like our package? Customize this package <a href="customTour.php?tour_title=<?php echo $tourTitle ?>">here</a></h5>
    </form>

    <?php

    include 'searchBox.php';
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../JS/bookTour.js"></script>
</body>

</html>