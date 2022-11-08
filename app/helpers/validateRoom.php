<?php

function validateRoom($room) {
    $errors = array();

    if(empty($room['room_type_id'])) {
        array_push($errors, 'room type is required');
    }

    if(empty($room['is_available']) && $room['is_available'] !== '0') {
        array_push($errors, 'room status is required');
    }
    
    return $errors;
}