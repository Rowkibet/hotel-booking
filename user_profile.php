<?php include("path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php") ?>
<?php echo $_SESSION['message']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>User Profile Page</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- main content -->

    <div class="user-page-wrapper">

    <!-- notification messages -->
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

        <div class="user-wrapper">
            <div class="inner-wrapper">
                <div class="user-image">
                    <img src="assets/images/user-icon.png" alt="">
                </div>
                <div class="user-details">
                    <p><?php echo $guest_info['first_name'] . " " . $guest_info['last_name']; ?></p>
                    <p>Guest ID: <?php echo $guest_info['id']; ?></p>
                    <p>Room No: n/a</p>
                    <a href="<?php echo BASE_URL . '/edit_guest.php?id=' . $guest_info['id']; ?>">Edit Details</a>
                </div> 
            </div>
            <div class="user-more-info">
                <table>
                    <tr>
                        <td>Phone:</td>
                        <td><?php echo $guest_info['phone_no']; ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?php echo $guest_info['email']; ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="user-content-wrapper">
            <div class="user-table">
                <h2>List of Booked Rooms</h2>
                <table>
                    <thead>
                        <th>#</th>
                        <th>Room No</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Nights</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </thead>
                    <?php foreach($guest_bookings as $key => $booking): ?>
                        <tr>
                            <td><?php echo $key + 1 . "." ?></td>
                            <td><?php echo $booking['room_id']; ?></td>
                            <td><?php echo $booking['check_in_date']; ?></td>
                            <td><?php echo $booking['check_out_date']; ?></td>
                            <td><?php echo $booking['nights']; ?></td>
                            <td><?php echo $booking['price']; ?></td>
                            <td><?php echo $booking['amount']; ?></td>
                            <td><?php echo $booking['name']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>