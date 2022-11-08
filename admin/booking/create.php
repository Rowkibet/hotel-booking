<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\booking.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/rooms.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Add Booking</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <div class="admin-content">

        <button class="btn"><a href="<?php echo BASE_URL . "/admin/booking/index.php"?>">All bookings</a></button>

        <!-- auth form -->
        <div class="form-container">
            <div class="auth-form">
                <div class="form-header">
                    <h2>Add Booking</h2>
                </div>

                <form action="create.php" method="post" novalidate>

                <?php if(count($bookingErrors) > 0): ?>
                    <div class="msg error">
                        <?php foreach ($bookingErrors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                    <div class="form-control">
                        <label for="">Guest ID</label>
                        <select name="user_id" id="">
                            <option value=""></option>
                            <?php foreach($guests as $key => $guest): ?>
                                <?php if(!empty($guest_id) && $guest_id == $guest['id']): ?>
                                    <option selected value="<?php echo $guest['id']; ?>"><?php echo $guest['id'] . " - " . $guest['first_name'] . " " . $guest['last_name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $guest['id']; ?>"><?php echo $guest['id'] . " - " . $guest['first_name'] . " " . $guest['last_name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Select Room</label>
                        <select name="room_id" id="">
                        <option value=""></option>
                            <?php foreach($availableRooms as $key => $room): ?>
                                <?php if(!empty($roomId) && $roomId == $room['id']): ?>
                                    <option selected value="<?php echo $room['id']; ?>"><?php echo $room['id']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $room['id']; ?>"><?php echo $room['id']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control">
                        <label for="">Check In Date</label>
                        <input type="date" name="check_in_date" value= "<?php echo $check_in; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <div class="form-control date">
                        <label for="">Check Out Date</label>
                        <input type="date" name="check_out_date" value= "<?php echo $check_out; ?>" id="">
                        <i class="fas fa-check-circle icon"></i>
                        <i class="fas fa-exclamation-circle icon"></i>
                        <small>Error message</small>
                    </div>

                    <button type="submit" name="assign-room" class="btn submit-btn">Submit</button>

                </form>
            </div>
        </div>
        <!-- // auth form -->
    </div>
</div>

<!--<script src="js/addFlight.js"></script> -->
 
</body>
</html>