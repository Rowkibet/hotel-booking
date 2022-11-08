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
    <title>Login Page</title>
</head>

<body>
    
<!-- navigation -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- notification messages -->
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
    
    <div class="form-container">
        <div class="auth-form">
            <div class="form-header">
                <h2>Login</h2>
            </div>

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
    
            <form action="login.php" method="post" novalidate>
                <div class="form-control">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?php echo $email?>" id="email">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <div class="form-control">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?php echo $password?>" id="password">
                    <i class="fas fa-check-circle icon"></i>
                    <i class="fas fa-exclamation-circle icon"></i>
                    <small>Error message</small>
                </div>

                <button type="submit" name="login-btn">Submit</button>
            </form>

            <p>Or <a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></p>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>
</html>