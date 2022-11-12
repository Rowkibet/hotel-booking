<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
    include(ROOT_PATH . "\app\controllers\booking.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Payment Page</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!-- notification messages -->
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- page wrapper -->
    <div class="page-wrapper cart">
        <div class="cart-wrapper">
            <h2>Billing details</h2>
            <p>Name: <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></p>
            <p>Phone Number: <?php echo $_SESSION['phone_no'] ?></p>
            <table>
                <thead>
                    <th>Room No</th>
                    <th>Room Type</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Nights</th>
                    <th>Price</th>
                </thead>
                <tr>
                    <td><?php echo $room_no ?></td>
                    <td><?php echo $room_type ?></td>
                    <td><?php echo $_SESSION['check_in_date']; ?></td>
                    <td><?php echo $_SESSION['check_out_date']; ?></td>
                    <td><?php echo $nights ?></td>
                    <td><?php echo $room_price ?></td>
                </tr>
            </table>
            <p class="amount">Total Amount: <?php echo $amount ?></p>
            <button class="small-btn"><a href="payment_page.php?amount=<?php echo $amount ?>&room_id=<?php echo $room_no ?>&nights=<?php echo $nights ?>">Pay With MPESA</a></button>
        </div>
    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>