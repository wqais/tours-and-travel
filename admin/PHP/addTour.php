<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'adminGeneral.php'
    ?>
    <link rel="stylesheet" href="../CSS/tour.css">
</head>
<body>
    <?php
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    include 'adminHeader.php';
    include '../../PHP/connection.php';
    $getRegions = "select * from tours order by tour_region";
    $regionsRes = $conn->query($getRegions);
    $regions = array();
    while ($region = mysqli_fetch_assoc($regionsRes)) {
        array_push($regions, $region["tour_region"]);
    }
    $regions = array_unique($regions);
    $getPackages = "SELECT DISTINCT pack_type FROM package";
    $packagesRes = $conn->query($getPackages);
    $packages = array();
    while ($package = mysqli_fetch_assoc($packagesRes)) {
        array_push($packages, $package["pack_type"]);
    }
    ?>
    <div class="container mt-5">
        <h4 class="mt-4 mb-4">Add A Tour</h4>
        <form class="tour-form" action="newTour.php" method="POST" id="add-tour-form">
        <label for="tour-title">Tour Title</label>
             <input type="text" name="tour-title" id="tour-title" class="form-control" required>
             <label for="tour-country">Tour Country</label>
             <input type="text" name="tour-country" id="tour-country" class="form-control" required>
             <label for="tour-region">Tour Region</label>
             <select name="tour-region" id="tour-region" class="form-control" required>
                 <?php
                foreach ($regions as $region) {
                    echo "<option value='$region'>$region</option>";
                }
                ?>
            </select>
             <label for="tour-price">Tour Price</label>
             <input type="number" name="tour-price" id="tour-price" class="form-control" required>
            <label for="tour-description">Tour Description</label>
            <textarea name="tour-description" id="tour-description" cols="20" rows="2" class="form-control" required maxlength="100"></textarea>
            <label for="tour-long-description">Tour Long Description</label>
            <textarea name="tour-long-description" id="tour-long-description" cols="20" rows="10" class="form-control" required></textarea>
            <label for="tour-month">Tour Month</label>
            <select class="form-select form-control month-select" name="tour-month" aria-label="Choose Month" aria-placeholder="Choose Month" id="tour-month">
                  <option selected label=" "></option>
                  <?php
                  foreach ($months as $month) {
                  ?>
                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                  <?php
                  }
                  ?>
                </select>
            <label for="tour-start-date">Tour Start Date</label>
            <input type="date" name="tour-start-date" id="tour-start-date" class="form-control" required>
            <label for="tour-end-date">Tour End Date</label>
            <input type="date" name="tour-end-date" id="tour-end-date" class="form-control" required>
            <label for="food-provided">Food Provided</label>
            <select name="food-provided" id="food-provided" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <label for="tour-image">Tour Image</label>
            <input type="file" name="tour-image" id="tour-image" class="form-control" required>
            <label for="tour-package">Tour Package</label>
            <select name="tour-package" id="tour-package" class="form-control" required>
                <?php
                foreach ($packages as $package) {
                    echo "<option value='$package'>$package</option>";
                }
                ?>
            <input type="submit" value="Add Tour" class="btn btn-secondary mt-4" name="submit-btn">
        </form>
    </div>
    <?php
    include 'adminFooter.php';
    ?>
</body>
</html>