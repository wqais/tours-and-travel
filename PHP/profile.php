<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'general.php';
    ?>
    <link rel="stylesheet" href="../CSS/profile.css" />
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
</head>

<body>
    <?php
    include 'header.php';
    require 'connection.php';
    $custID = $_SESSION['user_id'];
    $getCustDetails = "SELECT * FROM `customer` WHERE cust_id = $custID;";
    $custRes = $conn->query($getCustDetails);
    echo mysqli_error($conn);
    $cust = mysqli_fetch_assoc($custRes);
    $fname = $cust['cust_fname'];
    $lname = $cust['cust_lname'];
    $ph_no = $cust['cust_ph_no'];
    $email = $cust['cust_email'];

    ?>
    <form method="post" action="editProfile.php" class="user-form" id="edit-form">
        <h4>Edit Details</h4>
        <div class="mb-3 form-field">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
        </div>
        <div class="mb-3 form-field">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
        </div>
        <div class="mb-3 form-field">
            <label for="ph_no" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="ph_no" placeholder="Phone Number" name="ph_no" max="9999999999" value="<?php echo $ph_no; ?>">
        </div>
        <div class="mb-3 form-field">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="edit-email" value="<?php echo $email; ?>">
        </div>
        <div class="mb-3 form-field">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div class="col-12 form-field">
            <button class="btn btn-primary" type="submit" name="submit-btn" id="submit-btn">Submit form</button>
        </div>
    </form>
    <?php

    include 'footer.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="../JS/editDetails.js"></script>
</body>

</html>