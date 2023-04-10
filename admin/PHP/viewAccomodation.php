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
    ?>
</head>

<body>
    <?php
    include 'adminHeader.php';
    $getHotels = "SELECT * FROM accomodation";
    $hotelRes = $conn->query($getHotels);
    ?>
    <div class="container mt-5">
        <h4 class="mb-3 mt-5 text-center">View and Edit Accommodations</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hotel ID</th>
                    <th scope="col">Tour ID</th>
                    <th scope="col">Accomodation Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $hotelRes->fetch_assoc()) {
                ?>
                    <tr>
                        <form action="updateAccomodation.php" method="POST">
                            <td><input type="submit" value="Update" class="btn btn-secondary" name="submit-btn"></td>
                            <td scope="row"><input type="text" name="hotel-id" id="hotel-id" value="<?php echo $row['hotel_id'] ?>" disabled></td>
                            <td><input type="text" name="tour-id" id="tour-id" value="<?php echo $row['tour_id'] ?>" disabled></td>
                            <td><input type="text" name="hotel-name" id="hotel-name" value="<?php echo $row['hotel_name'] ?>"></td>
                    </tr>
                    <input type="hidden" name="hotel-id" id="hotel-id" value="<?php echo $row['hotel_id'] ?>">
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