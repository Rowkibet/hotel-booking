<header>
    <a href="<?php echo BASE_URL . "/admin/dashboard.php"?>" class="logo">
        <h1 class="logo-text">Logo</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li>
            <?php if($_SESSION['role_id'] === 1): ?>
                <a href="<?php echo BASE_URL . "/index.php"?>">Public</a>
            <?php endif; ?>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-user" style="margin-right: 3px"></i>
                <?php echo (isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Admin") ; ?>
                <i class="fa fa-chevron-down" style="font-size: .8em"></i>
            </a>
            <ul>
                <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</header>