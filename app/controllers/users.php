<?php
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/loginUser.php");

$errors = array();
$table = 'users';

$id = '';
$first_name = '';
$last_name = '';
$email = '';
$address = '';
$phone_no = '';
$passport = '';
$nationality = '';
$role_id = 0;
$password = '';
$passwordConf = '';

$role_id = '';
$role_type_name = 'All Users';

// Retrieve all guest details
$guests = selectAll($table, ['role_id' => '2']);
$noOfGuests = count($guests);

// Retrieve for one guest
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $guest = selectOne($table, ['id' => $id]);
}

// Retrive all users
$sql = "SELECT u.*, r.role_type FROM users AS u 
        JOIN roles AS r ON u.role_id=r.id";
$users = executeJoinQuery($sql);

// Retrieve all admin users
$sql = "SELECT u.*, r.role_type FROM users AS u 
        JOIN roles AS r ON u.role_id=r.id
        WHERE u.role_id=1";
$admin_users = executeJoinQuery($sql);

// Retrieve all guests with role type
$sql = "SELECT u.*, r.role_type FROM users AS u 
        JOIN roles AS r ON u.role_id=r.id
        WHERE u.role_id=2";
$guests_r = executeJoinQuery($sql);

// Retrieve all receptionists
$sql = "SELECT u.*, r.role_type FROM users AS u 
        JOIN roles AS r ON u.role_id=r.id
        WHERE u.role_id=3";
$receptionists = executeJoinQuery($sql);

// Retrieve all user roles - drop down menu at add user
$roles = selectAll('roles');

// User registration
if(isset($_POST['register-btn']) || isset($_POST['add-guest']) || isset($_POST['add-user'])) {
    $errors = validateUser($_POST);

    if(count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf']);

        if(isset($_POST['add-guest'])) {
            unset($_POST['add-guest']);
            $_POST['role_id'] = 2; //guest
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);

            $_SESSION['message'] = 'Guest Added Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\admin\guests\index.php');
            exit();
        } else if(isset($_POST['add-user'])) {
            unset($_POST['add-user']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user_id = create($table, $_POST);

            $_SESSION['message'] = 'User Added Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\admin\users\index.php');
        } else {
            $_POST['role_id'] = 2; //guest
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $guest_id = create($table, $_POST);
            $guest = selectOne($table, ['id' => $guest_id]);

            //Log User In
            loginUser($guest); 
        }
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $passport = $_POST['passport'];
        $nationality = $_POST['nationality'];
        $role_id = $_POST['role_id'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }    
}

// User Login
if(isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if(count($errors) === 0) {
        unset($_POST['login-btn']);

        $user = selectOne($table, ['email' => $_POST['email']]);
        if($user && password_verify($_POST['password'], $user['password'])) {
            //Log User In
            loginUser($user);
            exit();
        } else {
            array_push($errors, 'Invalid email or password');
        }
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
}

// Update user & View Guest & Admin
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT u.*, r.role_type FROM users AS u 
            JOIN roles AS r ON u.role_id=r.id
            WHERE u.id={$id}";
    $user = executeJoinQuery($sql);

    // display details on the form $ view page
    $id = $user[0]['id'];
    $first_name = $user[0]['first_name'];
    $last_name = $user[0]['last_name'];
    $email = $user[0]['email'];
    $address = $user[0]['address'];
    $phone_no = $user[0]['phone_no'];
    $passport = $user[0]['passport'];
    $nationality = $user[0]['nationality'];
    $role_id = $user[0]['role_id'];
}

if(isset($_POST['update-guest']) || isset($_POST['update-user']) || isset($_POST['edit-btn'])) {
    $errors = validateUpdate($_POST);

    if(count($errors) === 0) {
        $id = $_POST['id'];
        $guest_btn = isset($_POST['update-guest']) ? 1 : 0;
        $edit_btn = isset($_POST['edit-btn']) ? 1 : 0;
        unset($_POST['id'], $_POST['update-guest'], $_POST['update-user'], $_POST['edit-btn'], $_POST['passwordConf']);
        if(empty($_POST['password'])) {
            unset($_POST['password']);
        } else {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $user = selectOne($table, ['id' => $id]);
        $count = update($table, $id, $_POST);

        if($guest_btn) {
            $_SESSION['message'] = 'Guest Updated Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\admin\guests\index.php');
            exit();
        } else if($edit_btn) {
            $_SESSION['message'] = 'Your Details Are Updated Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '/user_profile.php');
            exit();        
        } else {
            $_SESSION['message'] = 'User Updated Successfully';
            $_SESSION['type'] = 'success';  
            header('location: ' .BASE_URL . '\admin\users\index.php');
            exit(); 
        }
    } else {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $passport = $_POST['passport'];
        $nationality = $_POST['nationality'];
        $role_id = $_POST['role_id'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }
}

// Delete User
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $user = selectOne($table, ['id' => $id]);
    $count = delete($table, $id);

    if($user['role_id'] === 1) {
        $_SESSION['message'] = 'Admin User Deleted Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\admin_users\index.php');
        exit();
    } else {
        $_SESSION['message'] = 'Guest Deleted Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\guests\index.php');
        exit();
    }
}

// user filter at users page
if(isset($_POST['filter-user'])) {
    if($_POST['role_id'] === '1') {
        $users = $admin_users;
        $role_id = $_POST['role_id'];
        $role_type_name = 'All Admin Users';
    } else if($_POST['role_id'] === '2') {
        $users = $guests_r;
        $role_id = $_POST['role_id'];
        $role_type_name = 'All Guests';
    } else if($_POST['role_id'] === '3') {
        $users = $receptionists;
        $role_id = $_POST['role_id'];
        $role_type_name = 'All Receptionists';
    } else {
        $users = $users;
        $role_id = 'all';
        $role_type_name = 'All Users';
    }
}


// if(isset($_POST['email'])) {
//     var_dump('running');
//     $records = selectAll($table, ['email' => $_POST['email']]);
//     $count = empty($records) ? 0 : 1;
// }