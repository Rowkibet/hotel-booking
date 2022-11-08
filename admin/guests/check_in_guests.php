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
    <title>Guests Checkedin</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/guests/index.php"?>">All Guests</a></button>
            </div>
            
            <div class="table-wrapper">

                <h2>Guests CheckedIn</h2>

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Room No</th>
                        <th>Room Type</th>
                        <th>Phone No</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach ($checkedinBookings as $key => $booking): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo ($booking['first_name'] . " " . $booking['last_name'])?></td>
                            <td><?php echo $booking['room_id'] ?></td>
                            <td><?php echo $booking['roomType'] ?></td>
                            <td><?php echo $booking['phone_no'] ?></td>
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