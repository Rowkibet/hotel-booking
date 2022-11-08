<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\payments.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>View Payment</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/payments/index.php"?>">All Payments</a></button>
            </div>

            <div class="card-wrapper flight-preview" style="margin-top:5px;">
                <div class="preview-card">
                    <h2>Payment Details</h2>

                    <table>
                        <tr>
                            <td>Payment ID</td>
                            <td><?php echo $payment_id ?></td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td><?php echo ($first_name . " " . $last_name) ?></td>
                        </tr>
                        <tr>
                            <td>Receipt No</td>
                            <td><?php echo $receipt_no ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td><?php echo $payment_date ?></td>
                        </tr>
                        <tr>
                            <td>Room Booked</td>
                            <td><?php echo $room_booked ?></td>
                        </tr>
                        <tr>
                            <td>Room Type</td>
                            <td><?php echo $room_type ?></td>
                        </tr>
                        <tr>
                            <td>Amount Paid</td>
                            <td><?php echo $payment_amount ?></td>
                        </tr>
                        <tr>
                            <td>Payment Method</td>
                            <td><?php echo $payment_type ?></td>
                        </tr>
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