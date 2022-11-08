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
    <title>Add User</title>
</head>
<body>
   <!-- navigation bar -->
   <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>

<div class="admin-wrapper">
        <!-- left sidebar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
            <!-- // left sidebar -->
    
    <div class="admin-content">

        <button class="btn"><a href="<?php echo BASE_URL . "/admin/users/index.php"?>">All Users</a></button>

        <!-- auth form -->
        <div class="form-container">
            <div class="auth-form">
                <div class="form-header">
                    <h2>Add User</h2>
                </div>

                <form action="create.php" method="post" novalidate>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <div class="form-control">
                    <label for="">First Name</label>
                    <input type="text" name="first_name" value= "<?php echo $first_name; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Last name</label>
                    <input type="text" name="last_name" value= "<?php echo $last_name; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Email</label>
                    <input type="email" name="email" value= "<?php echo $email; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control date">
                    <label for="">Address</label>
                    <input type="text" name="address" value= "<?php echo $address; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Phone No</label>
                    <input type="text" name="phone_no" value= "<?php echo $phone_no; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Passport</label>
                    <input type="text" name="passport" value= "<?php echo $passport; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Nationality</label>
                    <input type="text" name="nationality" value= "<?php echo $nationality; ?>" id="">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">User Role</label>
                    <select name="role_id" id="">
                        <option value=""></option>
                        <?php foreach($roles as $key => $role): ?>
                            <?php if(!empty($role_id) && $role_id == $role['id']): ?>
                                <option selected value="<?php echo $role['id']; ?>"><?php echo $role['role_type']; ?></option>
                            <?php else: ?>
                                <option value="<?php echo $role['id']; ?>"><?php echo $role['role_type']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?php echo $password ?>" id="password">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Confirm Password</label>
                    <input type="password" name="passwordConf" value="<?php echo $passwordConf ?>" id="confirm-password">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                    <button type="submit" name="add-user" class="btn submit-btn">Submit</button>

                </form>
            </div>
        </div>
        <!-- // auth form -->
    </div>
</div>

<!--<script src="js/addFlight.js"></script> -->
 
</body>
</html>