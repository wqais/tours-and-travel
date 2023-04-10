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
    if (isset($_SESSION['user_id'])) {
        $custID = $_SESSION['user_id'];
        $getUser = "select * from customer where cust_id = '$custID'";
        $userRes = $conn->query($getUser);
        $user = mysqli_fetch_assoc($userRes);
    }
    ?>
    <link rel="stylesheet" href="../CSS/allTours.css" />
    <link rel="stylesheet" href="../CSS/search.css" />
</head>

<body>
    <?php
    include 'header.php';
    $month = $_GET['month-select'];
    $dest = $_GET['dest-search'];
    $budget = (int)$_GET['budget'];
    $region = $_GET['region'];
    $packQuery;

    if (isset($_GET['submit'])) {
        require_once 'connection.php';
        $conditions = array();
        if (!empty($dest)) {
            $conditions[] = "tour_dest LIKE '%" . $dest . "%' OR tour_title LIKE '%" . $dest . "%'";
        }
        if (!empty($month)) {
            $conditions[] = "tour_month = '" . $month . "'";
        }
        if (!empty($budget)) {
            $conditions[] = "tour_price <= " . $budget;
        }
        if (!empty($region)) {
            $conditions[] = "tour_region LIKE '%" . $region . "%';";
        }
        $getAllTours = "SELECT * FROM tours";
        if (!empty($conditions)) {
            $getAllTours .= " WHERE " . implode(" AND ", $conditions);
        }
        // $res = $conn->query($sql);
        $toursRes = $conn->query($getAllTours);
        $count = mysqli_num_rows($toursRes);
    ?>
        <h5 class="result-heading">Showing <?php echo $count ?> results: </h5>
        <?php
        while ($allTours = mysqli_fetch_assoc($toursRes)) {
            $tourID = $allTours['tour_id'];
            $getPackage = "select * from package where tour_id = '$tourID'";
            $packageRes = $conn->query($getPackage);
            $package = mysqli_fetch_assoc($packageRes);
            $tourTitle = $allTours['tour_title'];
            include 'searchResult.php';
        }
    }
        ?>
        <br />
        <hr class="hr" />
        <h5 class="result-heading">Similar results: </h5>
    <?php
        $similarTours = "SELECT * FROM tours WHERE tour_dest LIKE '%" . $dest . "%' OR tour_price <= $budget OR tour_month LIKE '%" . $month . "%' OR tour_region LIKE '%" . $region . "%'";
        $getSimilarTours = $conn->query($similarTours);
        $num = 0;
        while ($allTours = mysqli_fetch_assoc($getSimilarTours)) {
            $tourID = $allTours['tour_id'];
            $getPackage = "select * from package where tour_id = '$tourID'";
            $packageRes = $conn->query($getPackage);
            $package = mysqli_fetch_assoc($packageRes);
            $tourTitle = $allTours['tour_title'];
            include 'searchResult.php';
        }
    
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>