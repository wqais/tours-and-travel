<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'general.php';
    //include '../functions/checkLogin.php';
    ?>
    <link rel="stylesheet" href="../CSS/allTours.css" />
</head>

<body>
    <?php
    include 'header.php';
    require_once 'connection.php';
    include 'searchBox.php';
    $getAllTours = "select * from tours";
    $toursRes = $conn->query($getAllTours);
    ?>
    <?php
    while ($allTours = mysqli_fetch_assoc($toursRes)) {
        $tourID = $allTours["tour_id"];
        $getPackage = "select * from package where tour_id = '$tourID'";
        $packageRes = $conn->query($getPackage);
        $package = mysqli_fetch_assoc($packageRes);
        include 'searchResult.php';
    ?>
    <?php
    }
    ?>
    <?php
    require_once 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>