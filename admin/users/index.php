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
    <title>Users</title>
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
                <button class="btn"><a href="<?php echo BASE_URL . "/admin/users/create.php"?>">Add User</a></button>
                <div class="filter">
                    <form action="index.php" method="post">
                        <select name="role_id" id="">
                        <option value="all">All</option>
                            <?php foreach($roles as $key => $role): ?>
                                <?php if(!empty($role_id) && $role_id == $role['id']): ?>
                                    <option selected value="<?php echo $role['id']; ?>"><?php echo $role['role_type']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $role['id']; ?>"><?php echo $role['role_type']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="filter-user">Filter</button>
                    </form>
                </div>
            </div>

            <!-- notification messages -->
            <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

            <div class="table-wrapper">
                <h2><?php echo $role_type_name; ?></h2>
                <table>
                    <!-- columns and their names -->
                    <thead>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>User Role</th>
                        <th>Phone No</th>
                        <th colspan="3">Action</th>
                    </thead>

                    <!-- table rows -->
                    <?php foreach($users as $key => $user): ?>
                        <tr>
                            <td><?php echo $key + 1 . "." ?></td>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo ($user['first_name'] . " " . $user['last_name'])?></td>
                            <td><?php echo $user['role_type']; ?></td>
                            <td><?php echo $user['phone_no']; ?></td>
                            <td><button><a href="view.php?id=<?php echo $user['id']; ?>">View</a></button></td>
                            <td><button><a href="edit.php?id=<?php echo $user['id']; ?>">Update</a></button></td>
                            <td><button><a href="index.php?del_id=<?php echo $user['id']; ?>">Delete</a></button></td>
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