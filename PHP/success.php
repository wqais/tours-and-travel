<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    require_once 'general.php';
    ?>
    <link rel="stylesheet" href="../CSS/bookTour.css" />
    <link rel="stylesheet" href="../CSS/success.css" />
</head>

<body>
    <?php
    include_once 'header.php';
    ?>

    <div class="container booking-container">
        <h4>Congratulations, your booking is confirmed!</h4>
        <p>Our Executive will get in touch with you shortly.</p>
        <p>View your bookings <a href="userBookings.php">here.</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
    include 'footer.php'
    ?>
</body>

</html>