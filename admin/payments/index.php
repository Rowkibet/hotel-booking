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
    <title>Payments</title>
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
            
            <!-- <?php if($_SESSION['role_id'] === 1): ?>
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/payments/create.php"?>">Add Payment</a></button>
            <?php endif; ?> -->
            <div class="table-wrapper">

                <h2>Payments</h2>

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Receipt No</th>
                        <th>Full Name</th>
                        <th>Room No</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($payments as $key => $payment): ?>
                        <tr>
                            <td><?php echo $key + 1 . "."; ?></td>
                            <td><?php echo $payment['receipt_no']; ?></td>
                            <td><?php echo $payment['first_name'] . " " . $payment['last_name']; ?></td>
                            <td><?php echo $payment['room_id']; ?></td>
                            <td><?php echo $payment['p_type']; ?></td>
                            <td><?php echo $payment['amount_paid']; ?></td>
                            <!-- <td><button><a href="view.php?id=<?php echo $payment['payment_id']; ?>">View</a></button></td>
                            <td><button><a href="edit.php?id=<?php echo $payment['payment_id']; ?>">Update</a></button></td> -->
                            <td><button><a href="index.php?del_id=<?php echo $payment['payment_id']; ?>">Delete</a></button></td>
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