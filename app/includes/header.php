<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
        <h1 class="logo-text">Logo</h1>
    </a>

    <ul class="nav">
        <li><a href="<?php echo BASE_URL . '/index.php' ?>">Home</a></li>
        <li><a href="<?php echo BASE_URL . '/rooms.php' ?>">Rooms</a></li>
        <li><a href="#">About Us</a></li>
        <li>
            <?php if(isset($_SESSION['id'])): ?>
                <a href="#">
                    <i class="fa fa-user" style="margin-right: 3px"></i>
                        <?php echo $_SESSION['first_name']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em"></i>
                </a>
                <ul>
                    <?php if($_SESSION['role_id'] === 1): ?>
                    <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo BASE_URL . '/user_profile.php' ?>">User Profile</a></li>
                    <?php endif; ?>

                    <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></l>
                </ul>

            <?php else: ?>
                <li><a href="<?php echo BASE_URL . '/register.php' ?>">Sign Up</a></li>
                <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li> 
            <?php endif; ?>
            </li>
    </ul>
</header>  