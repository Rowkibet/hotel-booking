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
    <title>View User</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <!-- admin content -->
    <div class="admin-content">

        <button class="btn"><a href="<?php echo BASE_URL . "/admin/users/index.php"?>">All Users</a></button>

        <div class="card-wrapper flight-preview" style="margin-top:5px;">
            <div class="preview-card">
                <h2>User Details</h2>

                <table>
                    <tr>
                        <td>Full Name</td>
                        <td><?php echo ($first_name . " " . $last_name) ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $address?></td>
                    </tr>
                    <tr>
                        <td>Phone No</td>
                        <td><?php echo $phone_no ?></td>
                    </tr>
                    <tr>
                        <td>Passport</td>
                        <td><?php echo $passport ?></td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td><?php echo $nationality ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- // admin content -->
    </div>
</div>

<!--<script src="js/addFlight.js"></script> -->
 
</body>
</html>