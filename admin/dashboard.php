<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php") ?>
<?php include(ROOT_PATH . "/app/controllers/rooms.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard - Hotel Booking</title>
</head>
<body>
     <!-- navigation bar -->
     <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
        <!-- Admin content -->
        <div class="admin-content">
            
            <div class="flex">
                <button class="btn"><a href="booking/check_in.php">Check In</a></button>
                <button class="btn"><a href="booking/check_out.php">Check Out</a></button>
            </div>

            <!-- notification messages -->
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

            <div class="card-wrapper">
                <div class="preview-card flex">
                    <p>Total Rooms</p>
                    <p><?php echo $noOfRooms; ?></p>
                </div>

                <div class="preview-card flex">
                    <p>Booking Requests</p>
                    <p><?php echo $noOfBookings; ?></p>
                </div>

                <div class="preview-card flex">
                    <p>Guests</p>
                    <p><?php echo $noOfGuests; ?></p>
                </div> 
            </div>
            
            <div class="card-wrapper flight-preview">
                <div class="preview-card">
                    <h2>Booking Requests</h2>

                    <table>
                        <tr>
                            <th>Guest Name</th>
                            <th>Room No</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Nights</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th colspan="2">Actions</th> 
                        </tr>
                        <?php foreach($pendingBookings as $key => $booking): ?>
                            <tr>
                                <td><?php echo $booking['first_name'] . " " . $booking['last_name']; ?></td>
                                <td><?php echo $booking['room_id']; ?></td>
                                <td><?php echo $booking['check_in_date']; ?></td>
                                <td><?php echo $booking['check_out_date']; ?></td>
                                <td><?php echo $booking['nights']; ?></td>
                                <td><?php echo $booking['price']; ?></td>
                                <td><?php echo $booking['amount']; ?></td>
                                <td><button><a href="<?php echo BASE_URL . "/admin/payments/create.php?confirm_id=" . $booking['id']; ?>">Confirm</a></button></td>
                                <td><button>Cancel</button></td> 
                            </tr>

                        <?php endforeach; ?>
                    </table>
                </div>

        <!-- // Admin Content -->
        </div>
    </div>
    <!-- // Admin Page Wrapper-->
</body>
</html>