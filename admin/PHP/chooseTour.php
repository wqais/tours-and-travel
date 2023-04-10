<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include 'adminGeneral.php';
    include '../../PHP/connection.php';
    $tours = array();
    $getTours = "SELECT * FROM tours";
    $tourRes = $conn->query($getTours);
    while ($row = $tourRes->fetch_assoc()) {
        $tours[] = array($row['tour_id'], $row['tour_title']);
    }
    ?>
</head>

<body>
    <?php
    include 'adminHeader.php';
    ?>
    <div class="container mt-5 mb-3">
        <h4 class="mb-3">Choose A Tour</h4>
        <form action="editTour.php" method="post">
            <select name="tour-id" id="tour-id" class="form-select" required>
                <?php
                foreach ($tours as $tour) {
                ?>
                    <option value="<?php echo $tour[0] ?>"><?php echo $tour[1] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" value="Edit Tour" class="btn btn-secondary mt-4" name="submit-btn">
        </form>
    </div>
    <?php
    include 'adminFooter.php';
    ?>
</body>

</html>