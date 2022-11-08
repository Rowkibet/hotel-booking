<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/booking.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Check In Guest</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/booking/check_out.php"?>">Check Out</a></button>
            </div>
            
            <div class="table-wrapper">
                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Check In Guest</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>No.</th>
                        <th>Guest Name</th>
                        <th>Room No</th>
                        <th>Status</th>
                        <th colspan="1">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($confirmedBookings as $key => $booking): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $booking['first_name'] . " " . $booking['last_name']; ?></td>
                            <td><?php echo $booking['room_id'] ?></td>
                            <td><?php echo $booking['booking_status_name'] ?></td>
                            <td><button><a href="<?php echo BASE_URL . "/admin/booking/check_out.php?checkedin_id=" . $booking['id'];?>">Check in</a></button></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->
</body>
</html>