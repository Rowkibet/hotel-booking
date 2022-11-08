<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>View Booking</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/booking/index.php"?>">All Bookings</a></button>
            </div>

            <div class="card-wrapper flight-preview" style="margin-top:5px;">
                <div class="preview-card">
                    <h2>Booking Details</h2>

                    <table>
                        <tr>
                            <td>Booking Id</td>
                            <td><?php echo $id ?></td>
                        </tr>
                        <tr>
                            <td>Guest Name</td>
                            <td><?php echo ($firstName . " " . $lastName) ?></td>
                        </tr>
                        <tr>
                            <td>Booking Date</td>
                            <td>n/a</td>
                        </tr>
                        <tr>
                            <td>Room Booked</td>
                            <td><?php echo $room_id?></td>
                        </tr>
                        <tr>
                            <td>Room Type</td>
                            <td>n/a</td>
                        </tr>
                        <tr>
                            <td>Check In Date</td>
                            <td><?php echo $check_in_date ?></td>
                        </tr>
                        <tr>
                            <td>Check Out Date</td>
                            <td><?php echo $check_out_date ?></td>
                        </tr>
                        <tr>
                            <td>No. of Nights</td>
                            <td><?php echo $nights ?></td>
                        </tr>
                        <tr>
                            <td>Room Price</td>
                            <td><?php echo $room_price ?></td>
                        </tr>
                        <tr>
                            <td>Total Amount</td>
                            <td><?php echo $amount ?></td>
                        </tr>
                        <tr>
                            <td>Booking Status</td>
                            <td><?php echo $booking_status ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->
</body>
</html>