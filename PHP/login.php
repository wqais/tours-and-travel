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
    <link rel="stylesheet" href="../CSS/user.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <form action="validateLogin.php" method="POST" class="user-form">
    <h4>Enter Login Details</h4>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="col-12 form-field">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
        <p>New User? <a href="register.php">Regitser here.</a></p>
    </form>
    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>