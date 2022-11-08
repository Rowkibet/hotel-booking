<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Booking</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/booking/create.php"?>">Add Booking</a></button>
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/booking/check_in.php"?>">Check In</a></button>
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/booking/check_out.php"?>">Check Out</a></button>
                <div class="filter">
                    <form action="index.php" method="post">
                        <select name="booking_status_id" id="">
                        <option value="all">All</option>
                            <?php foreach(array_slice($all_booking_status, 0, 4) as $key => $booking_status): ?>
                                <?php if(!empty($booking_status_id) && $booking_status_id == $booking_status['id']): ?>
                                    <option selected value="<?php echo $booking['id']; ?>"><?php echo $booking_status['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $booking_status['id']; ?>"><?php echo $booking_status['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="filter-booking">Filter</button>
                    </form>
                    </form>
                </div>
            </div>

            <div class="table-wrapper">
                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2><?php echo $booking_title ?></h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Guest Name</th>
                        <th>Booking Date</th>
                        <th>Room Booked</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Total Amount</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($bookings as $key => $booking): ?>
                        <tr>
                            <td><?php echo $key + 1 . "." ?></td>
                            <td><?php echo $booking['first_name'] . " " . $booking['last_name']; ?></td>
                            <td>n/a</td>
                            <td><?php echo $booking['room_id']; ?></td>
                            <td><?php echo $booking['booking_status_name']; ?></td>
                            <td><?php echo $booking['price']; ?></td>
                            <td><?php echo $booking['amount']; ?></td>
                            <td><button><a href="view.php?view_id=<?php echo $booking['id']; ?>">View</a></button></td>
                            <?php if($booking['booking_status_name'] === 'confirm') : ?>
                                <td><button><a href="#">Check In</a></button></td>
                            <?php endif; ?>
                            <?php if($booking['booking_status_name'] === 'checkedin') : ?>
                                <td><button><a href="#">Check Out</a></button></td>
                            <?php endif; ?>
                            <?php if($_SESSION['role_id'] === 1): ?>
                                <td><button><a href="<?php echo BASE_URL . "/admin/payments/edit.php"?>">Update</a></button></td>
                                <td><button><a href="<?php echo BASE_URL . "/admin/booking/index.php?del_id=" . $booking['id']; ?>">Delete</a></button></td>
                            <?php endif; ?>
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