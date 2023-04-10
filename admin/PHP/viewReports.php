<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roaming Roads</title>
    <?php
    include 'adminGeneral.php';
    include '../../PHP/connection.php';
    $bookings = "select * from c_tour_bill";
    $bookingRes = $conn->query($bookings);
    ?>
</head>

<body>
    <?php
    include 'adminHeader.php';
    ?>
    <div class="container mt-5">
        <h4 class="mt-5">Sales Report</h4>
        <table class="table table-striped-columns mt-5">
            <thead>
                <tr>
                    <th scope="col">Bill No.</th>
                    <th scope="col">Bill Date</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Bill Total</th>
                    <th scope="col">Payment Mode</th>
                </tr>
            </thead>
            <?php
            while ($booking = mysqli_fetch_assoc($bookingRes)) {
                $tours = "select * from custom_tour where c_tour_id = '$booking[c_tour_id]'";
                $tourRes = $conn->query($tours);
                $tour = mysqli_fetch_assoc($tourRes);
                $cust = "select * from customer where cust_id = '$tour[cust_id]'";
                $custRes = $conn->query($cust);
                $cust = mysqli_fetch_assoc($custRes);
                $custName = $cust['cust_fname'] . " " . $cust['cust_lname'];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $booking['c_bill_id']; ?></td>
                        <td><?php echo $booking['bill_date']; ?></td>
                        <td><?php echo $custName ?></td>
                        <td><?php echo $tour['c_tour_dest']; ?></td>
                        <td><?php echo $booking['bill_total']; ?></td>
                        <td><?php echo $booking['payment_mode']; ?></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
        <button class="btn btn-secondary mt-4" onclick="window.print()">Print Report</button>
    </div>
    <?php
    include 'adminFooter.php';
    ?>

</body>

</html>