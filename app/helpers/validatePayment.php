<?php

function validatePayment($payment) {
    $errors = array();

    if(empty($payment['receipt_no'])) {
        array_push($errors, 'receipt no is required');
    }

    if(empty($payment['date'])) {
        array_push($errors, 'date is required');
    }

    if(empty($payment['amount_paid'])) {
        array_push($errors, 'amount is required');
    }

    if(empty($payment['payment_type_id'])) {
        array_push($errors, 'payment method is required');
    }
    
    return $errors;
}