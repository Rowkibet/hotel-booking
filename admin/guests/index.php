<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\users.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <title>Guests</title>
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
                    <button class="btn"><a href="<?php echo BASE_URL . "/admin/guests/create.php"?>">Add Guest</a></button>
                <?php endif; ?>
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/guests/check_in_guests.php"?>">Guests Checkedin</a></button>
            </div>
            
            <div class="table-wrapper">

                <!-- notification messages -->
                <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                <h2>Guests</h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>Guest ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach ($guests as $key => $guest): ?>
                        <tr>
                            <td><?php echo $key + 1 . "."; ?></td>
                            <td><?php echo $guest['id'] ?></td>
                            <td><?php echo ($guest['first_name'] . " " . $guest['last_name'])?></td>
                            <td><?php echo $guest['email'] ?></td>
                            <td><?php echo $guest['phone_no'] ?></td>
                            <td><button><a href="view.php?id=<?php echo $guest['id']; ?>">View</a></button></td>
                            <?php if($_SESSION['role_id'] === 1): ?>
                                <td><button><a href="edit.php?id=<?php echo $guest['id']; ?>">Update</a></button></td>
                                <td><button><a href="index.php?del_id=<?php echo $guest['id']; ?>">Delete</a></button></td>
                                <td><button><a href="<?php echo BASE_URL . "/admin/booking/create.php?guest_id=" . $guest['id']; ?>">Assign Room</a></button></td>
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