<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Booking Cart</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!-- notification messages -->
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- page wrapper -->
    <div class="page-wrapper cart">
        <div class="cart-wrapper">
            <h2>Your Booking Cart</h2>
            <table>
                <thead>
                    <th>Room ID</th>
                    <th>Room Type</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tr>
                    <td>25</td>
                    <td>Single Room</td>
                    <td>02/09/2022</td>
                    <td>03/09/2022</td>
                    <td>3000</td>
                    <td>Remove</td>
                </tr>
            </table>
            <p>Total Amount: 3000</p>
            <button>Continue Booking</button>
            <button>Pay Now</button>
        </div>
    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>