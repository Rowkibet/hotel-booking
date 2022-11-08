<?php include("path.php"); ?>
<?php include(ROOT_PATH . "\app\database\db.php"); ?>
<?php include(ROOT_PATH . "\app\controllers\users.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/fontawesome/css/all.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <title>Edit Details Page</title>
</head>

<body>
    
<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    
    <div class="form-container">
        <div class="auth-form">
            <div class="form-header">
                <h2>Edit Details</h2>
                <p>Please fill in this form with your details</p>
            </div>
    
            <form action="" method="post" novalidate>

            <!-- <div class="result" style="display:none"></div> -->
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                <input type="hidden" name="id" value= "<?php echo $id ?>" id="">

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

                <button type="submit" name="edit-btn">Submit</button>
            </form>
        </div>
    </div>

    <!-- <script src="assets/js/jquery-3.6.1.min.js"></script>
    <script src="assets/js/register.js"></script> -->
</body>
</html>