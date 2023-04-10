<?php

$tour_id = $_POST['tour-id'];
include '../../PHP/connection.php';
$getTour = "SELECT * FROM `tours` WHERE tour_id = '$tour_id'";
$tourRes = $conn->query($getTour);
$tour = mysqli_fetch_assoc($tourRes);
$regions = array();
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$getAllRegions = "SELECT DISTINCT `tour_region` FROM `tours`";
$regionRes = $conn->query($getAllRegions);
while ($region = mysqli_fetch_assoc($regionRes)) {
    $regions[] = $region['tour_region'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'adminGeneral.php';
    ?>
    <link rel="stylesheet" href="../CSS/tour.css" />
</head>

<body>
    <?php
    include 'adminHeader.php';
    ?>
    <div class="container mt-5">
        <h4 class="mt-3">Edit Tour <?php echo $tour['tour_title'] ?></h4>
        <br />
        <form action="updateTour.php" method="post" enctype="multipart/form-data">
            <label for="tour-title">Tour Title</label>
            <input type="text" name="tour-title" id="tour-title" class="form-control" value="<?php echo $tour['tour_title'] ?>" required>
            <label for="tour-country">Tour Country</label>
            <input type="text" name="tour-country" id="tour-country" class="form-control" value="<?php echo $tour['tour_dest'] ?>" required>
            <label for="tour-region">Tour Region</label>
            <select name="tour-region" id="tour-region" class="form-control" required>
                <option value="<?php echo $tour['tour_region'] ?>"><?php echo $tour['tour_region'] ?></option>
                <?php
                foreach ($regions as $region) {
                    echo "<option value='$region'>$region</option>";
                }
                ?>
            </select>
            <label for="tour-price">Tour Price</label>
            <input type="number" name="tour-price" id="tour-price" class="form-control" value="<?php echo $tour['tour_price'] ?>" required>
            <label for="tour-description">Tour Description</label>
            <textarea name="tour-description" id="tour-description" cols="20" rows="2" class="form-control" required maxlength="100"><?php echo $tour['tour_desc'] ?></textarea>
            <label for="tour-long-description">Tour Long Description</label>
            <textarea name="tour-long-description" id="tour-long-description" cols="20" rows="10" class="form-control" maxlength="1000" required><?php echo $tour['tour_long_desc'] ?></textarea>
            <label for="tour-month">Tour Month</label>
            <select name="tour-month" id="tour-month" class="form-control" required>
                <option value="<?php echo $tour['tour_month'] ?>"><?php echo $tour['tour_month']?></option>
                <?php
                for ($i = 0; $i < 12; $i++) {
                    echo "<option value='$months[$i]'>" . $months[$i] . "</option>";
                }
                ?>
            </select>
            <label for="tour-start-date">Tour Start Date</label>
            <input type="date" name="tour-start-date" id="tour-start-date" class="form-control" value="<?php echo $tour['tour_start_date'] ?>" required>
            <label for="tour-end-date">Tour End Date</label>
            <input type="date" name="tour-end-date" id="tour-end-date" class="form-control" value="<?php echo $tour['tour_end_date'] ?>" required>
            <label for="food-provided">Food Provided</label>
            <select name="food-provided" id="food-provided" class="form-control" required>
                <option value="Yes"><?php echo $tour['food_provided'] ?></option>
                <option value="No">No</option>
            </select>
            <label for="tour-image">Tour Image</label>
            <input type="file" name="tour-image" id="tour-image" class="form-control" required>
            <input type="hidden" name="tour-id" value="<?php echo $tour['tour_id'] ?>">
            <input type="submit" value="Add Tour" class="btn btn-secondary mt-4" name="submit-btn">
        </form>
    </div>
    <?php
    include 'adminFooter.php';
    ?>
</body>

</html>