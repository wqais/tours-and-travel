<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'adminGeneral.php';
    include '../../PHP/connection.php';
    $mode = $_GET['type'];
    $getTourIDs = "SELECT * FROM `travel` WHERE  `travel_type` = '$mode'";
    $tourIDRes = $conn->query($getTourIDs);
    $tours = array();
    while ($travel = $tourIDRes->fetch_assoc()) {
        $getTours = "SELECT * FROM `tours` WHERE `tour_id` = '$travel[tour_id]'";
        $tourRes = $conn->query($getTours);
        while ($row = $tourRes->fetch_assoc()) {
            array_push($tours, $row['tour_id'], $row['tour_title']);
        }
    }
    ?>
    <link rel="stylesheet" href="../CSS/tour.css" />
</head>

<body>
    <?php
    include 'adminHeader.php';
    include '../../PHP/connection.php';
    ?>

    <div class="container mt-5">
        <h4 class="mt-3 mb-4">Enter Details</h4>
        <form action="newTravel.php" method="POST">
            <label for="tour-id">Choose Tour</label>
            <select name="tour-id" id="tour-id" class="form-select" required>
                <?php
                for ($i = 0; $i < count($tours); $i += 2) {
                ?>
                    <option value="<?php echo $tours[$i] ?>"><?php echo $tours[$i + 1] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="total-seats">Total Seats</label>
            <input type="number" name="total-seats" id="total-seats" class="form-control" required>
            <label for="dept-city">Departure City</label>
            <input type="text" name="dept-city" id="dept-city" class="form-control" required>
            <label for="final-city">Final City</label>
            <input type="text" name="final-city" id="final-city" class="form-control" required>
            <label for="other-city">Other Final City</label>
            <input type="text" name="other-city" id="other-city" class="form-control">
            <input type="hidden" value="<?php echo $mode ?>" name="travel-type">
            <input type="submit" value="Add Travel" class="btn btn-secondary mt-4" name="submit-btn">
        </form>
    </div>

    <?php
    include 'adminFooter.php';
    ?>
</body>

</html>