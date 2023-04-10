<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'general.php';
    include 'connection.php';
    $tourTitle = $_GET['tour_title'];
    $getTourDetails = "SELECT * FROM tours WHERE tour_title = '$tourTitle'";
    $tourRes = $conn->query($getTourDetails);
    $tourDetails = mysqli_fetch_array($tourRes);
    $adultCost = (int)$tourDetails['tour_price'] * 0.6;
    $childCost = (int)$tourDetails['tour_price'] * 0.2;
    $tourID = $tourDetails["tour_id"];
    $getTravelDetails = "select * from travel where tour_id='$tourID'";
    $res2 = $conn->query($getTravelDetails);
    $travelDetails = mysqli_fetch_assoc($res2);
    $travelMode = $travelDetails['travel_type'];
    $getModeDetails = "select * from $travelMode where tour_id = '$tourID'";
    $modeRes = $conn->query($getModeDetails);
    $modeDetails = mysqli_fetch_assoc($modeRes);
    $getPackage = "select * from package where tour_id = '$tourID'";
    $packageRes = $conn->query($getPackage);
    $package = mysqli_fetch_assoc($packageRes);
    $maxDays = (int)$package['pack_duration'] + 10;
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $hotelDetails = "SELECT * FROM accomodation WHERE tour_id = '$tourID'";
    $hotelRes = $conn->query($hotelDetails);
    $hotels = array();
    while ($hotel = mysqli_fetch_assoc($hotelRes)) {
        array_push($hotels, $hotel);
    }
    ?>
    <link rel="stylesheet" href="../CSS/customTour.css" />
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <form method="POST" action="processCustomBooking.php?tour_id=<?php echo $tourID; ?>" id="book-form" class="row g-3">
        <h3>Create a Custom Package for '<a href="bookTour.php?tour_title=<?php echo $tourTitle; ?>" class="tour-title"><strong><?php echo $tourTitle; ?></strong></a>'</h3>
        <div class="col-md-6">
            <label for="adult-seats" class="form-label">Adult Seats: &#8377;<span class="adult-seat-cost"> <?php echo $adultCost ?></span> per head</label>
            <input type="number" class="form-control" id="adult-seats" name="adult-seats" placeholder="1" min="1" value="1">
            <p><small>Seats available: <?php echo $modeDetails['available_adult_seats'] ?></small></p>
        </div>
        <div class="col-md-6">
            <?php if ($package['pack_type'] == "Couples Tour") {
            ?>
                <label for="child-seats" class="form-label">Child seats not available for Couples Tour</label>
                <input type="number" class="form-control" id="child-seats" name="child-seats" placeholder="0" min="0" disabled>
                <p><small>Seats available: 0</small></p>
            <?php
            } else {
            ?>
                <label for="child-seats" class="form-label">Child Seats: &#8377; <span class="child-seat-cost"><?php echo $childCost ?></span> per head</label>
                <input type="number" class="form-control" id="child-seats" name="child-seats" placeholder="0" min="0">
                <p><small>Seats available: <?php echo $modeDetails['available_child_seats'] ?></small></p>
            <?php
            }
            ?>
        </div>
        <div class="col-md-6">
            <label for="hotel-select" class="form-label">Choose Hotel</label>
            <select class="form-select form-control hotel-select" name="hotel-select" aria-label="Choose Hotel" aria-placeholder="Choose Hotel" id="hotel-select" required>
                <?php
                foreach ($hotels as $hotel) {
                ?>
                    <option value="<?php echo $hotel['hotel_name']; ?>"><?php echo $hotel['hotel_name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="destination-select" class="form-label">Choose Arrival City</label>
            <select class="form-select form-control destination-select" name="destination-select" aria-label="Choose Destination" aria-placeholder="Choose Destination" id="destination-select" required>
                <option value="<?php echo $modeDetails['final_city'] ?>"><?php echo $modeDetails['final_city'] ?></option>
                <?php
                if (isset($modeDetails['final_city_opt'])) {
                    echo "<option value=" . $modeDetails['final_city_opt'] . ">" . $modeDetails['final_city_opt'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="start-date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start-date" name="start-date" max="<?php echo $tourDetails['tour_start_date']; ?>" value="<?php echo $tourDetails['tour_start_date']; ?>">
        </div>
        <div class="col-md-6">
            <label for="end-date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end-date" name="end-date" min="<?php echo $tourDetails['tour_end_date'] ?>" value="<?php echo $tourDetails['tour_end_date'] ?>">
        </div>
        <div class="col-md-6 guide-radio-container mt-4">
            <span>Do you want a Tour Guide?</span>
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="guide-select" id="guide-yes" checked value="Yes">
                <label class="form-check-label" for="guide-yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="guide-select" id="guide-no" value="No">
                <label class="form-check-label" for="guide-no">
                    No
                </label>
            </div>
        </div>
        <div class="col-md-6 food-radio-container mt-4">
            <span>Do you want to avail our Food Services?</span>
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="food-select" id="food-yes" checked value="Yes">
                <label class="form-check-label" for="food-yes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="food-select" id="food-no" value="No">
                <label class="form-check-label" for="food-no">
                    No
                </label>
            </div>
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
            <input name="email" type="email" class="form-control" id="email" placeholder="email@example.com" value="<?php
                                                                                                                    if (isset($_SESSION['user_id'])) {
                                                                                                                        echo $_SESSION['user_email'];
                                                                                                                    }
                                                                                                                    ?>">
        </div>
        <div class="col-md-12 mt-4">
            <button class="btn btn-secondary" id="calculate-btn" type="button">View Pricing</button>
            <h5 class="mt-4 total-cost-container" id="total-cost-container">Total: &#8377;<span class="total-cost"> <?php echo $tourDetails['tour_price'] ?></span></h5>
            <input type="hidden" name="total-cost" id="total-cost" value="<?php echo $tourDetails['tour_price'] ?>" />
        </div>
        <div class="btn-container mt-4">
            <button type="reset" class="btn btn-primary mb-3 reset-btn">Reset</button>
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
        <input type="hidden" name="final-price" id="final-price" value="0" />
        <input type="hidden" name="adult-cost" id="adult-cost" value="0" />
        <input type="hidden" name="child-cost" id="child-cost" value="0" />
        <input type="hidden" name="guide-cost" id="guide-cost" value="0" />
        <input type="hidden" name="food-cost" id="food-cost" value="0" />
        <input type="hidden" name="acco-cost" id="acco-cost" value="0" />
        <input type="hidden" name="days-cost" id="days-cost" value="0" />
    </form>
    <div class="container hidden bill">
        <table class="table table-hover bill-container cold-md-12">
            <thead>
                <tr>
                    <th class="col-md-2">Sr. No</th>
                    <th class="col-md-9">Description</th>
                    <th class="col-md-6">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="item-no">1</td>
                    <td class="item-desc">Adult Seat</td>
                    <td class="adult-seat-bill table-price"></td>
                </tr>
                <tr>
                    <td class="item-no">2</td>
                    <td class="item-desc">Child Seat</td>
                    <td class="child-seat-bill table-price"></td>
                </tr>
                <tr>
                    <td class="item-no">3</td>
                    <td class="item-desc">Tour Guide</td>
                    <td class="guide-bill table-price"></td>
                </tr>
                <tr>
                    <td class="item-no">4</td>
                    <td class="item-desc">Food Services</td>
                    <td class="food-bill table-price"></td>
                </tr>
                <tr>
                    <td class="item-no">5</td>
                    <td class="item-desc">Accomodation Charge</td>
                    <td class="hotel-bill table-price"></td>
                </tr>
                <tr>
                    <td class="item-no">6</td>
                    <td class="item-desc">Additional Days : <span class="days-added"></span></td>
                    <td class="additional-days table-price"></td>
                <tr>
                    <td class="item-no"></td>
                    <td class="item-desc"><b>Total</b></td>
                    <td class="total-bill table-price"></td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12">
            <input type="button" class="btn btn-secondary mt-3 print-btn" value="Print Bill" id="print-btn" />
        </div>
    </div>
    </div>

    <script src="../JS/customTour.js"></script>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>