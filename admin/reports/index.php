<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/rooms.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Reports</title>
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
                <div class="filter">
                    <form action="index.php" method="post">
                        <select name="room_type_id" id="">
                            <option value="" disabled>Room Type</option>
                            <option value="">All</option>
                            <?php foreach($room_types as $key => $room_type): ?>
                                <?php if(!empty($roomType_id) && $roomType_id == $room_type['id']): ?>
                                    <option selected value="<?php echo $room_type['id']; ?>"><?php echo $room_type['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $room_type['id']; ?>"><?php echo $room_type['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <select name="booking_status_id" id="">
                            <option value="" disabled>Status</option>
                            <option value="">All</option>
                            <?php foreach(array_slice($all_booking_status, 0, 4) as $key => $booking_status): ?>
                                <?php if(!empty($booking_status_id) && $booking_status_id == $booking_status['id']): ?>
                                    <option selected value="<?php echo $booking['id']; ?>"><?php echo $booking_status['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $booking_status['id']; ?>"><?php echo $booking_status['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" name="filter-report">Submit</button>
                    </form>
                    </form>
                </div>
            </div>

            <div class="table-wrapper">
                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Reports</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Guest Name</th>
                        <th>Room</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Price</th>
                        <th>Nights</th>
                        <th>Amount</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($bookings as $key => $booking): ?>
                        <tr>
                            <td><?php echo $key+1 . "." ?></td>
                            <td><?php echo $booking['first_name'] . " " . $booking['last_name']; ?></td>
                            <td><?php echo $booking['room_id']; ?></td>
                            <td><?php echo $booking['check_in_date']; ?></td>
                            <td><?php echo $booking['check_out_date']; ?></td>
                            <td><?php echo $booking['price']; ?></td>
                            <td><?php echo $booking['nights']; ?></td>
                            <td><?php echo $booking['price'] * $booking['nights']; ?></td>
                            <?php $total+=($booking['price'] * $booking['nights']); ?>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <p>Total Amount: <?php echo $total; ?></p>
                <button class="btn">Print</button>
            </div>
        </div>
        <!-- // Admin Content -->
    </div>
    <!-- // Admin Page Wrapper -->
</body>
</html>