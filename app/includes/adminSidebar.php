<div class="left-sidebar">
    <ul>
        <li><a href="<?php echo BASE_URL . "/admin/dashboard.php";?>">Dashboard</a></li>
        <li class="drop-down-menu"><a href="<?php echo BASE_URL . "/admin/guests/index.php"?>">Guests</i></i></a></li>
        <li class="drop-down-menu"><a href="<?php echo BASE_URL . "/admin/rooms/index.php"?>">Rooms</i></a></li>
        <li class="drop-down-menu"><a href="<?php echo BASE_URL . "/admin/booking/index.php"?>">Booking</i></i></a></li>
        <li class="drop-down-menu"><a href="<?php echo BASE_URL . "/admin/payments/index.php"?>">Payments</i></i></a></li>
        <?php if($_SESSION['role_id'] === 1): ?>
            <li class="drop-down-menu"><a href="<?php echo BASE_URL . "/admin/users/index.php"?>">Users</i></a></li>
            <li class="drop-down-menu"><a href="<?php echo BASE_URL . "/admin/reports/index.php"?>">Reports</i></a></li>
        <?php endif; ?>
    </ul>
</div>