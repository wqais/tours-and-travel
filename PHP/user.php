<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'general.php';
    $isLoggedIn = false;
    ?>
    <link rel="stylesheet" href="../CSS/user.css" />
</head>

<body>
    <?php
    include 'header.php';
    if(isset($_SESSION['user_id']))
    {
        header("Location: login.php");
    }
    else{
        header("Location: register.php");
    }
    ?>        
</body>

</html>