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
    <link rel="stylesheet" href="../CSS/bookings.css" />
</head>

<body>
    <?php
    include 'header.php';
    require 'connection.php';
    $custID = $_SESSION['user_id'];
    $getBookings = "select * from booking where cust_id = '$custID'";
    $bookingRes = $conn->query($getBookings);
    $getCustomBookings = "select * from custom_tour where cust_id = '$custID'";
    $customRes = $conn->query($getCustomBookings);
    ?>
    <?php
    if ($bookingRes) {
    ?>
        <div class="booking-container mt-5">
            <h4 style="margin-left: 10rem;">Your Bookings</h4>
            <?php while ($booking = mysqli_fetch_assoc($bookingRes)) {
                $packID = $booking['pack_id'];
                $getTourID = "select tour_id from package where pack_id = '$packID'";
                $tourIDRes = $conn->query($getTourID);
                $tempID = mysqli_fetch_assoc($tourIDRes);
                $tourID = $tempID['tour_id'];
                $getTour = "select * from tours where tour_id = '$tourID'";
                $tourRes = $conn->query($getTour);
                $tour = mysqli_fetch_assoc($tourRes);
            ?>
                <div class="card booking" style="margin-left: 10rem; width:80%;">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-md-4 card-container">
                                <img src="../<?php echo $tour["tour_img"]; ?>" class="rounded float-start tour-img" alt="Tour Image">
                            </div>
                            <div class="col-md-7">
                                <h5 class="card-title"><?php echo $tour['tour_title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted mt-3">Booking ID: <?php echo $booking['book_id']; ?></h6>
                                <p class="card-text">
                                    Adult Seats: <?php echo $booking['adult_seat'] ?>
                                </p>
                                <p class="card-text">
                                    Child Seats: <?php echo $booking['child_seat'] ?>
                                </p>
                                <a href="bookTour.php?tour_title=<?php echo $tour['tour_title'] ?>" class="card-link btn btn-secondary" class="view-tour">View Tour</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
<?php
            }
        }
?>

<?php
if ($customRes) {
?>
    <div class="booking-container">
        <h4 style="margin-left: 10rem;">Your Custom Bookings</h4>
        <?php while ($custom = mysqli_fetch_assoc($customRes)) {
            // $packID = $booking['pack_id'];
            // $getTourID = "select tour_id from package where pack_id = '$packID'";
            // $tourIDRes = $conn->query($getTourID);
            // $tempID = mysqli_fetch_assoc($tourIDRes);
            // $tourID = $tempID['tour_id'];
            // $getTour = "select * from tours where tour_id = '$tourID'";
            // $tourRes = $conn->query($getTour);
            // $tour = mysqli_fetch_assoc($tourRes);
        ?>
            <div class="card" style="width: 80%; margin-left:10rem">
                <div class="card-body">
                    <div class="col-md-7">
                        <h5 class="card-title">Booking ID: <?php echo $custom['c_tour_id'] ?></h5>
                        <p class="card-text">
                            Adult Seats: <?php echo $custom['c_tour_adult'] ?>
                        </p>
                        <p class="card-text">
                            Child Seats: <?php echo $custom['c_tour_child'] ?>
                        </p>
                        <p class="card-text">
                            Departure City: <?php echo $custom['c_tour_dept'] ?>
                        </p>
                        <p class="card-text">
                            Final City: <?php echo $custom['c_tour_dest'] ?>
                        </p>
                        <p class="card-text">
                            Total: &#8377; <?php echo $custom['c_tour_price'] ?>
                        </p>
                        <!-- <a href="bookTour.php?tour_title=<?php echo $tour['tour_title'] ?>" class="card-link" class="view-tour">View Tour</a> -->
                    </div>
                </div>
            </div>
    </div>

<?php
        }
    }
?>

<?php
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>