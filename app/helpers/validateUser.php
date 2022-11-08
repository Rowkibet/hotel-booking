<?php

function validateUser($user) {
    $errors = array();
    // Check if role_id is set before proceeding with validation
    $role_id = isset($user['role_id']);

    if(empty($user['first_name'])) {
        array_push($errors, 'first name is required');
    }

    if(empty($user['last_name'])) {
        array_push($errors, 'last name is required');
    }

    if(empty($user['email'])) {
        array_push($errors, 'Email is required');
    }
    
    if(empty($user['address'])) {
        array_push($errors, 'address is required');
    }

    if(empty($user['phone_no'])) {
        array_push($errors, 'Phone No is required');
    }

    if(empty($user['passport'])) {
        array_push($errors, 'passport is required');
    }

    if(empty($user['nationality'])) {
        array_push($errors, 'nationality is required');
    }

    if(empty($user['role_id']) && $role_id) {
        array_push($errors, 'user role is required');
    }

    if(empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
 
    if($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Passwords do not match');
    }

    $existingEmail = selectOne('users', ['email' => $user['email']]);
    if($existingEmail['email']) {
        array_push($errors, 'Email already exists');
    }
    
    $existingPhoneNo = selectOne('users', ['phone_no' => $user['phone_no']]);
    if($existingPhoneNo['phone_no']) {
        array_push($errors, 'Phone No already exists');
    }
    
    return $errors;
}

function validateLogin($user) {
    $errors = array();

    if(empty($user['email'])) {
        array_push($errors, 'email is required');
    }
    
    if(empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    
    return $errors;
}

function validateUpdate($user) {
    $errors = array();
    // Check if role_id is set before proceeding with validation
    $role_id = isset($user['role_id']);

    if(empty($user['first_name'])) {
        array_push($errors, 'first name is required');
    }

    if(empty($user['last_name'])) {
        array_push($errors, 'last name is required');
    }

    if(empty($user['email'])) {
        array_push($errors, 'Email is required');
    }
    
    if(empty($user['address'])) {
        array_push($errors, 'address is required');
    }

    if(empty($user['phone_no'])) {
        array_push($errors, 'Phone No is required');
    }

    if(empty($user['passport'])) {
        array_push($errors, 'passport is required');
    }

    if(empty($user['nationality'])) {
        array_push($errors, 'nationality is required');
    }

    if(empty($user['role_id']) && $role_id) {
        array_push($errors, 'user role is required');
    }
 
    if($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Passwords do not match');
    }

    return $errors;

}