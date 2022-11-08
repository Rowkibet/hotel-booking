<?php

function validateBooking($booking) {
    $errors = array();

    if(empty($booking['check_in_date'])) {
        array_push($errors, 'check in date is required');
    }

    if(empty($booking['check_out_date'])) {
        array_push($errors, 'check out date is required');
    } else if($booking['check_out_date'] === $booking['check_in_date']) {
        array_push($errors, 'invalid date at check out');
    } else if($booking['check_out_date'] < $booking['check_in_date']) {
        array_push($errors, 'invalid date at check out');
    }
    
    return $errors;
}

function validateAssignRoom($booking) {
    $errors = array();

    if(empty($booking['user_id'])) {
        array_push($errors, 'guest id is required');
    }

    if(empty($booking['room_id'])) {
        array_push($errors, 'room no is required');
    }

    if(empty($booking['check_in_date'])) {
        array_push($errors, 'check in date is required');
    }

    if(empty($booking['check_out_date'])) {
        array_push($errors, 'check out date is required');
    } else if($booking['check_out_date'] === $booking['check_in_date']) {
        array_push($errors, 'invalid date at check out');
    } else if($booking['check_out_date'] < $booking['check_in_date']) {
        array_push($errors, 'invalid date at check out');
    }
    
    return $errors;
}