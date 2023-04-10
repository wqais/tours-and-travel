<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include 'adminGeneral.php';
    ?>
    <link rel="stylesheet" href="../CSS/guide.css">
</head>

<body>
    <?php
    include 'adminHeader.php';
    include '../../PHP/connection.php';
    $getGuides = "SELECT * FROM tour_guide";
    $guideRes = $conn->query($getGuides);
    ?>
    <div class="container" style="overflow-x: auto;">
    <h4 class="view text-center">View and Update Guides</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Guide ID</th>
                <th scope="col">Tour ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $guideRes->fetch_assoc()) {
            ?>
                <tr>
                    <form action="PHP/updateGuide.php" method="POST">
                        <td><input type="submit" value="Update" class="btn btn-secondary" name="submit-btn"></td>
                        <td scope="row"><input type="hidden" name="guide-id" id="guide-id" value="<?php echo $row['guide_id'] ?>"><?php echo $row['guide_id'] ?></td>
                        <td><input type="text" name="tour-id" id="tour-id" value="<?php echo $row['tour_id'] ?>"></td>
                        <td><input type="text" name="guide-fname" id="guide-fname" value="<?php echo $row['guide_fname'] ?>"></td>
                        <td><input type="text" name="guide-lname" id="guide-lname" value="<?php echo $row['guide_lname'] ?>"></td>
                        <td><input type="text" name="guide-email" id="guide-email" value="<?php echo $row['guide_email'] ?>"></td>
                        <td><input type="text" name="guide-phone" id="guide-phone" value="<?php echo $row['guide_ph_no'] ?>"></td>
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