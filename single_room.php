<?php include("path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Single Room</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- Validation Errors -->
    <?php if(count($bookingErrors) > 0): ?>
        <div class="msg error">
            <?php foreach ($bookingErrors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- main content -->
    <div class="single-house">
        <div class="house-image">
            <img src="<?php echo 'assets/images/' . $room_images; ?>" alt="">
        </div>
        <div class="house-text">
            <h1 class=""> Room Description </h1>
            <p>Room No: <?php echo $room_id; ?></p>
            <p>Room Type: <?php echo $room_type; ?></p>
            <p>Room Status: <?php echo ($room_status) ? 'Available' : 'Occupied'; ?></p>
            <p>Room Price: <?php echo $room_price; ?></p>

            <form action="single_room.php" method="post">

                <input type="hidden" name="room_id" value= "<?php echo $room_id ?>" id="">

                <div class="form-control">
                    <label for="">Check In</label>
                    <input type="date" name="check_in_date" value= "<?php echo $check_in; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>
                <div class="form-control">
                    <label for="">Check Out</label>
                    <input type="date" name="check_out_date" value= "<?php echo $check_out; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>
                <button type="submit" name="book-room" class="btn book-house">Book Room</button>
            </form>
        </div>
    </div>

    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
</body>
</html>