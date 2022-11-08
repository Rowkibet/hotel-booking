<?php 
    include("path.php"); 
    include(ROOT_PATH . "\app\database\db.php");
    include(ROOT_PATH . "/app/controllers/rooms.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Homepage - Hotel Booking System</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!-- notification messages -->
<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

    <!-- page wrapper -->
    <div class="page-wrapper">
        <h1 class="houses-title"> Single Rooms </h1>
        <div class="house-wrapper">
            <?php foreach(array_slice($single_rooms, 0, 3) as $key => $single_room): ?>
                <div class="houses house-1">
                    <div class="house-image">
                        <img src="<?php echo 'assets/images/' . $single_room['room_images']; ?>" alt="">
                    </div>
                    <div class="house-text">
                        <h1 class=""> Room No. <?php echo $single_room['id']; ?> </h1>
                        <p>Room Type: <?php echo $single_room['name']; ?></p>
                        <p>Room Price: <?php echo $single_room['price']; ?></p>
                        <p>Status: <?php echo ($single_room['is_available']) ? 'Available' : 'Occupied'; ?></p>

                        <a href="single_room.php?id=<?php echo $single_room['id']; ?>" class="btn book-btn"> Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="rooms.php?rt_id=<?php echo $single_rooms[0]['room_type_id']; ?>" class="btn browse-btn"> Browse More Single Rooms</a>

        <h1 class="houses-title"> Double Rooms </h1>
        <div class="house-wrapper">
            <?php foreach(array_slice($double_rooms, 0, 3) as $key => $double_room): ?>
                <div class="houses house-1">
                    <div class="house-image">
                        <img src="<?php echo 'assets/images/' . $double_room['room_images']; ?>" alt="">
                    </div>
                    <div class="house-text">
                        <h1 class=""> Room No. <?php echo $double_room['id']; ?> </h1>
                        <p>Room Type: <?php echo $double_room['name']; ?></p>
                        <p>Room Price: <?php echo $double_room['price']; ?></p>
                        <p>Status: <?php echo ($double_room['is_available']) ? 'Available' : 'Occupied';; ?></p>

                        <a href="single_room.php?id=<?php echo $double_room['id']; ?>" class="btn book-btn"> Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="rooms.php?rt_id=<?php echo $double_rooms[0]['room_type_id']; ?>" class="btn browse-btn"> Browse More Double Rooms</a>

        
        <h1 class="houses-title"> Family Rooms </h1>
        <div class="house-wrapper">
            <?php foreach(array_slice($family_rooms, 0, 3) as $key => $family_room): ?>
                <div class="houses house-1">
                    <div class="house-image">
                        <img src="<?php echo 'assets/images/' . $family_room['room_images']; ?>" alt="">
                    </div>
                    <div class="house-text">
                        <h1 class=""> Room No. <?php echo $family_room['id']; ?> </h1>
                        <p>Room Type: <?php echo $family_room['name']; ?></p>
                        <p>Room Price: <?php echo $family_room['price']; ?></p>
                        <p>Status: <?php echo ($family_room['is_available']) ? 'Available' : 'Occupied';; ?></p>

                        <a href="single_room.php?id=<?php echo $family_room['id']; ?>" class="btn book-btn"> Book Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <a href="rooms.php?rt_id=<?php echo $family_rooms[0]['room_type_id']; ?>" class="btn browse-btn"> Browse More Family Rooms</a>

    </div>
    
    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>

</body>
</html>