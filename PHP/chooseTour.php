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
    $tours = array();
    $getTourDetails = "SELECT DISTINCT tour_title, tour_dest FROM tours";
    $tourRes = $conn->query($getTourDetails);
    while ($tourDetails = mysqli_fetch_array($tourRes)) {
        $tours[] = $tourDetails;
    }
    ?>
    <link rel="stylesheet" href="../CSS/customTour.css" />
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <form method="POST" action="processTour.php" id="book-form" class="row g-3">
        <h3>Choose a Tour to Customize</h3>
            <label for="tour-select" class="form-label">Choose Tour</label>
            <select class="form-select form-control" id="tour-select" name="tour-select" aria-label="Choose Month" placeholder="Choose Tour">
                <option selected label=" "></option>
                <?php
                foreach ($tours as $tour) {
                ?>
                    <option value="<?php echo $tour['tour_title']; ?>"><?php echo $tour['tour_title']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="btn-container mt-4">
            <button type="submit" class="btn btn-primary mb-3">Proceed</button>
        </div>
    </form>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>