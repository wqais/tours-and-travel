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
    <link rel="stylehsheet" href="../CSS/guide.css/">
</head>

<body>
    <?php
    include 'adminHeader.php';
    include '../../PHP/connection.php';
    $getTours = "SELECT * FROM tours";
    $tourIDs = array();
    $tourRes = $conn->query($getTours);
    while ($row = $tourRes->fetch_assoc()) {
        $tourIDs[] = array($row['tour_id'], $row['tour_title']);
    }
    ?>
    <div class="container mt-5">
        <h4>Add A Tour Guide</h4>
        <br />
        <form action="newGuide.php" class="guide-form" id="add-guide-form" method="POST">
            <label for="tour-id" class="form-label">Choose Tour</label>
            <select name="tour-id" id="tour-id" class="form-select" required>
                <?php
                foreach ($tourIDs as $id) {
                ?>
                    <option value="<?php echo $id[0] ?>"><?php echo $id[1] ?></option>"
                <?php
                }
                ?>
            </select>
            <label for="guide-fname" class="form-label">First Name</label>
            <input type="text" name="guide-fname" id="guide-fname" class="form-control" required>
            <label for="guide-lname" class="form-label">Last Name</label>
            <input type="text" name="guide-lname" id="guide-lname" class="form-control" required>
            <label for="guide-email" class="form-label">Email</label>
            <input type="email" name="guide-email" id="guide-email" class="form-control" required>
            <label for="guide-phone" class="form-label">Phone</label>
            <input type="tel" name="guide-phone" id="guide-phone" class="form-control" required>
            <input type="submit" value="Add Guide" class="btn btn-secondary mt-4" name="submit-btn">

        </form>
    </div>
    <?php
    include 'adminFooter.php';
    ?>
</body>

</html>