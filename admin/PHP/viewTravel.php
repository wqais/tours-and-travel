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
    $getDetails = "SELECT * FROM `$mode`";
    $detailsRes = $conn->query($getDetails);
    ?>
</head>

<body>
    <?php
    include 'adminHeader.php';
    ?>
    <div class="container mt-5" style="overflow-x: auto;">
        <h4 class="mt-5 mb-3 text-center">Edit Travel Details</h4>
        <table>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"><?php echo ucfirst($mode) ?> ID</th>
                        <th scope="col">Tour ID</th>
                        <th scope="col">Total Seats</th>
                        <th scope="col">Adult Seats</th>
                        <th scope="col">Availale Adult Seats</th>
                        <th scope="col">Child Seats</th>
                        <th scope="col">Availale Child Seats</th>
                        <th scope="col">Departure</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Other Destination</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $detailsRes->fetch_assoc()) {
                    ?>
                        <tr>
                            <form action="updateTravel.php" method="POST">
                                <input type="hidden" name="mode" id="mode" value="<?php echo $mode ?>">
                                <input type="hidden" name="mode-id" id="mode-id" value="<?php echo $row[$mode.'_id'] ?>">
                                <td><input type="submit" value="Update" class="btn btn-secondary" name="submit-btn"></td>
                                <td scope="row"><input type="hidden" name="mode-id" id="mode-id" value="<?php echo $row[$mode.'_id'] ?>"><?php echo $row[$mode.'_id'] ?></td>
                                <td><input type="text" name="tour-id" id="tour-id" value="<?php echo $row['tour_id'] ?>" disabled></td>
                                <td><input type="text" name="total-seats" id="total-seats" value="<?php echo $row['total_seats'] ?>"></td>
                                <td><input type="text" name="adult-seats" id="adult-seats" value="<?php echo $row['adult_seats'] ?>"></td>
                                <td><input type="text" name="avail-adult-seats" id="avail-adult-seats" value="<?php echo $row['available_adult_seats'] ?>"></td>
                                <td><input type="text" name="child-seats" id="child-seats" value="<?php echo $row['child_seats'] ?>"></td>
                                <td><input type="text" name="avail-child-seats" id="avail-child-seats" value="<?php echo $row['available_child_seats'] ?>"></td>
                                <td><input type="text" name="departure" id="departure" value="<?php echo $row['dept_city'] ?>"></td>
                                <td><input type="text" name="arrival" id="arrival" value="<?php echo $row['final_city'] ?>"></td>
                                <td><input type="text" name="other-dest" id="other-dest" value="<?php echo $row['final_city_opt'] ?>"></td>
                        </tr>
                        </form>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </div>
    <?php
    include 'adminFooter.php';
    ?>
</body>

</html>