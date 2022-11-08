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
    <title>Rooms</title>
</head>
<body>

<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    
    <!-- page wrapper -->
    <div class="page-wrapper">
        <div class="room-filter">
            <form action="rooms.php" method="post">
                <select name="room_type" id="">
                    <option value="all">All</option>
                    <?php foreach($room_types as $key => $room_type): ?>
                        <?php if(!empty($room_type_id) && $room_type_id == $room_type['id']): ?>
                            <option selected value="<?php echo $room_type['id']; ?>"><?php echo $room_type['name']; ?></option>
                        <?php else: ?>
                            <option value="<?php echo $room_type['id']; ?>"><?php echo $room_type['name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="filter-room">Filter</button>
            </form>
        </div>

        <h1 class="houses-title"> <?php echo empty($room_type_name) ? "All Rooms" : $room_type_name; ?></h1>

        <div class="house-wrapper">
        <?php foreach($rooms as $key => $room): ?>
            <div class="houses house-1">
                <div class="house-image">
                    <img src="<?php echo 'assets/images/' . $room['room_images']; ?>" alt="">
                </div>
                <div class="house-text">
                <h1 class=""> Room No. <?php echo $room['id']; ?> </h1>
                        <p>Room Type: <?php echo $room['name']; ?></p>
                        <p>Room Price: <?php echo $room['price']; ?></p>
                        <p>Status: <?php echo ($room['is_available']) ? 'Available' : 'Occupied'; ?></p>

                    <a href="single_room.php?id=<?php echo $room['id']; ?>" class="btn book-btn"> Book Now</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>


    <!-- footer -->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    
</body>
</html>