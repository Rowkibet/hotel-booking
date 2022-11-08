<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/rooms.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Rooms</title>
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
            <?php if($_SESSION['role_id'] === 1): ?>
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/rooms/create.php"?>">Add Room</a></button>
            <?php endif; ?>
            </div>
            
            <div class="table-wrapper">

            <!-- notification messages -->
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Rooms</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Room No</th>
                        <th>Room Status</th>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($rooms as $key => $room): ?>
                        <tr>
                            <td><?php echo $key + 1 . "."; ?></td>
                            <td><?php echo $room['id']; ?></td>
                            <td><?php echo ($room['is_available']) ? 'Available' : 'Occupied'; ?></td>
                            <td><?php echo $room['name']; ?></td>
                            <td><?php echo $room['price']; ?></td>
                            <td><button><a href="view.php?id=<?php echo $room['id']; ?>">View</a></button></td>
                            <?php if($_SESSION['role_id'] === 1): ?>
                                <td><button><a href="edit.php?id=<?php echo $room['id']; ?>">Update</a></button></td>
                                <td><button><a href="index.php?del_id=<?php echo $room['id']; ?>">Delete</a></button></td>
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