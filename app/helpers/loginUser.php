<?php

function loginUser($user) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['phone_no'] = $user['phone_no'];
    $_SESSION['role_id'] = $user['role_id'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    // if user is admin or receptionist redirect to dashboard
    if($_SESSION['role_id'] === 1  || $_SESSION['role_id'] === 3) {
        header('location: ' .BASE_URL . '/admin/dashboard.php');
    } else {
        header('location: ' .BASE_URL . '/index.php');
    }
    
    exit();
}