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
    <link rel="stylehsheet" href="../CSS/adminLogin.css">
</head>

<body>
    <?php
    include 'adminHeader.php';
    ?>

    <div class="container mt-5 admin-login-form-container">
        <form action="validateAdmin.php" method="POST" id="admin-login-form">
            <div class="row">
                <div class="col">
                    <h1>Admin Login</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <input type="submit" value="Login" class="btn btn-secondary" name="submit-btn">
                </div>
            </div>
        </form>
    </div>

    <?php
    include 'adminFooter.php';
    ?>
</body>

</html>