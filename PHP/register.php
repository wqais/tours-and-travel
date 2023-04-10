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
    <link rel="stylesheet" href="../CSS/user.css" />
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <form method="post" action="validateNewUser.php" class="user-form" id="register-form">
    <h4>Enter Registration Details</h4>
            <div class="mb-3 form-field">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
            </div>
            <div class="mb-3 form-field">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
            </div>
            <div class="mb-3 form-field">
                <label for="ph_no" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="ph_no" placeholder="Phone Number" name="ph_no" max="9999999999">
            </div>
            <div class="mb-3 form-field">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
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
    include 'footer.php';
    ?>
    <script src="../JS/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>