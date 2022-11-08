<?php
include(ROOT_PATH . "\app\database\db.php");
include(ROOT_PATH . "/app/helpers/validatePayment.php");

$errors = array();
$table = 'payments';

$first_name = '';
$last_name = '';
$receipt_no = '';
$payment_id = '';
$payment_date = '';
$payment_amount = '';
$payment_type_id = '';
$payment_type = '';

$confirm_id = '';

// retrieve all payment details
$sql = "SELECT p.*, b.room_id, rt.name, u.first_name, u.last_name, pt.* FROM payments AS p JOIN booking AS b ON p.booking_id=b.id 
        JOIN room_type AS rt ON b.room_type_id=rt.id 
        JOIN users AS u ON b.user_id=u.id 
        JOIN payment_type AS pt ON p.payment_type_id=pt.id";
$payments = executeJoinQuery($sql);

// retrieve all payment types - drop down menu
$payment_types = selectAll('payment_type');

// retrieve payment details for specified booking request


// Add Payment & Confirm Payment
if(isset($_GET['confirm_id'])) {
    $confirm_id = $_GET['confirm_id'];
}

if(isset($_POST['add-payment'])) {
    $errors =  validatePayment($_POST);

    if(count($errors) === 0) {
        $confirm_id = $_POST['confirm_id'];
        unset($_POST['add-payment'], $_POST['confirm_id']);
        $_POST['booking_id'] = $confirm_id;
        $payment_id = create($table, $_POST);

        //Update booking status to confirmed
        $count = update('booking', $confirm_id, ['booking_status_id' => '2']);

        $_SESSION['message'] = 'Payment Confirmed Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\booking\check_in.php');

    } else {
        $receipt_no = $_POST['receipt_no'];
        $payment_date = $_POST['date'];
        $payment_amount = $_POST['amount_paid'];
        $payment_type_id = $_POST['payment_type_id'];
    }
}

// Update & View Payment
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT p.*, b.room_id, rt.name, u.first_name, u.last_name, pt.p_type FROM payments AS p 
            JOIN booking AS b ON p.booking_id=b.id 
            JOIN room_type AS rt ON b.room_type_id=rt.id 
            JOIN users AS u ON b.user_id=u.id 
            JOIN payment_type AS pt ON p.payment_type_id=pt.id
            WHERE p.payment_id={$id}";
    $single_payment = executeJoinQuery($sql);

    // display details on the form & view page
    $payment_id = $single_payment[0]['payment_id'];
    $first_name = $single_payment[0]['first_name'];
    $last_name = $single_payment[0]['last_name'];
    $receipt_no = $single_payment[0]['receipt_no'];
    $payment_date = $single_payment[0]['date'];
    $room_booked = $single_payment[0]['room_id'];
    $room_type = $single_payment[0]['name'];
    $payment_amount = $single_payment[0]['amount_paid'];
    $payment_type = $single_payment[0]['p_type'];
    $payment_type_id = $single_payment[0]['payment_type_id'];
}

if(isset($_POST['update-payment'])) {
    $errors = validatePayment($_POST);

    if(count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-payment'], $_POST['id']);
        $count = updatePayment($table, $id, $_POST);

        $_SESSION['message'] = 'Payment Updated Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\payments\index.php');
    } else {
        $receipt_no = $_POST['receipt_no'];
        $payment_date = $_POST['date'];
        $payment_amount = $_POST['amount_paid'];
        $payment_type_id = $_POST['payment_type_id'];
    }
}

// Delete Payment
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = deletePayment($table, $id);

    $_SESSION['message'] = 'Payment Deleted Successfully';
    $_SESSION['type'] = 'success';  
    header('location: ' .BASE_URL . '\admin\payments\index.php');
}