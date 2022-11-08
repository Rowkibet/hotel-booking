<?php
include(ROOT_PATH . "/app/helpers/validateBooking.php");

$bookingErrors = array();
$table = 'booking';

$room_id = '';
$room_type = '';
$room_status = '';
$room_price = '';
$room_type_id = '';
$room_images = '';

$firstName = '';
$lastName = '';
$check_in_date = '';
$check_out_date = '';
$nights = '';
$amount = '';
$booking_status = '';

$checkBooking = '';
$booking_title = 'All Bookings';

// retrieve booking details for all guests
$sql = "SELECT b.*, bs.name AS booking_status_name, u.first_name, u.last_name, rt.price FROM booking AS b 
        JOIN booking_status AS bs ON b.booking_status_id=bs.id 
        JOIN users AS u ON b.user_id=u.id 
        JOIN room_type AS rt ON b.room_type_id=rt.id 
        WHERE u.role_id=2";
$bookings = executeJoinQuery($sql);

// retrieve booking details for one guest on user profile
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT b.*, bs.name, rt.price FROM booking AS b 
            JOIN booking_status AS bs ON b.booking_status_id=bs.id 
            JOIN room_type AS rt ON b.room_type_id=rt.id 
            WHERE b.user_id={$id}";
    $guest_bookings = executeJoinQuery($sql);
}

// retrieve guest details on user_profile page
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $guest_info = selectOne('users', ['id' => $id]);
}

// retrieve all booking status - for filter in booking page
$all_booking_status = selectAll('booking_status');


// retrieve all booking details that are pending
$sql = "SELECT b.*, bs.name AS booking_status_name, u.first_name, u.last_name, rt.price FROM booking AS b 
        JOIN booking_status AS bs ON b.booking_status_id=bs.id 
        JOIN users AS u ON b.user_id=u.id 
        JOIN room_type AS rt ON b.room_type_id=rt.id 
        WHERE b.booking_status_id=1";
$pendingBookings = executeJoinQuery($sql);
$noOfBookings = count($pendingBookings);

// retrieve all booking details that are confirmed
$sql = "SELECT b.*, bs.name AS booking_status_name, u.first_name, u.last_name, rt.price FROM booking AS b 
        JOIN booking_status AS bs ON b.booking_status_id=bs.id 
        JOIN users AS u ON b.user_id=u.id 
        JOIN room_type AS rt ON b.room_type_id=rt.id 
        WHERE b.booking_status_id=2";
$confirmedBookings = executeJoinQuery($sql);

// retrieve all booking details that are checkedIn
$sql = "SELECT b.*, bs.name AS booking_status_name, u.first_name, u.last_name, u.phone_no, rt.price, rt.name AS roomType FROM booking AS b 
        JOIN booking_status AS bs ON b.booking_status_id=bs.id 
        JOIN users AS u ON b.user_id=u.id 
        JOIN room_type AS rt ON b.room_type_id=rt.id 
        WHERE b.booking_status_id=3";
$checkedinBookings = executeJoinQuery($sql);

// retrieve all booking details that are checkedOut
$sql = "SELECT b.*, bs.name AS booking_status_name, u.first_name, u.last_name, u.phone_no, rt.price, rt.name AS roomType FROM booking AS b 
        JOIN booking_status AS bs ON b.booking_status_id=bs.id 
        JOIN users AS u ON b.user_id=u.id 
        JOIN room_type AS rt ON b.room_type_id=rt.id 
        WHERE b.booking_status_id=4";
$checkedoutBookings = executeJoinQuery($sql);

// Booking Room
    // retreive room details for single room page
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
            JOIN room_type AS rt ON r.room_type_id=rt.id 
            WHERE r.id={$id}";
    $room = executeJoinQuery($sql);

    // display details
    $room_id = $room[0]['id'];
    $room_type = $room[0]['name'];
    $room_status = strval($room[0]['is_available']);
    $room_price = $room[0]['price'];
    $room_type_id = $room[0]['room_type_id'];
    $room_images = $room[0]['room_images'];
}

if(isset($_POST['book-room'])) {
    // Check if user has logged in first
    if(empty($_SESSION['first_name'])) {
        $_SESSION['message'] = 'Please Log In First';
        $_SESSION['type'] = 'error';
        header('location: ' .BASE_URL . '\login.php');
    } else {
        $bookingErrors = validateBooking($_POST);

        // This is to ensure info persists after page reload on clicking submit
        // This will also be used to save the room data to the new booking record
        $id = $_POST['room_id'];
        $sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
                JOIN room_type AS rt ON r.room_type_id=rt.id 
                WHERE r.id={$id}";
        $room = executeJoinQuery($sql);
    
        // Check if room is already booked or pending
        $checkBooking = selectOne('booking', ['room_id' => $id]);
        if($room[0]['is_available'] === 0) {
            array_push($bookingErrors, 'room is already occupied');
        } else if($checkBooking) {
            array_push($bookingErrors, 'room is already reserved');
        }
    
        // Check if admin is trying to book at single room page
        if($_SESSION['role_id'] === 1) {
            array_push($bookingErrors, 'admin is not allowed to book here');
        }
    
        if(count($bookingErrors) === 0) {
            $_SESSION['check_in_date'] = $_POST['check_in_date'];
            $_SESSION['check_out_date'] = $_POST['check_out_date'];
            header('location: ' .BASE_URL . '\payment_page.php?room_id=' . $id);

        } else {
            $check_in = $_POST['check_in_date'];
            $check_out = $_POST['check_out_date'];
            $room_images = $room[0]['room_images'];
            $room_id = $room[0]['id'];
            $room_type = $room[0]['name'];
            $room_status = $room[0]['is_available'];
            $room_price = $room[0]['price'];
        }
    }
}

// fetch room data for payment page
if(isset($_GET['room_id'])) {
    $id = $_GET['room_id'];
    $sql = "SELECT r.*, rt.name AS roomType, rt.price FROM rooms AS r 
            JOIN room_type AS rt ON r.room_type_id=rt.id 
            WHERE r.id={$id}";
    $room = executeJoinQuery($sql);

    $room_no = $room[0]['id'];
    $room_type = $room[0]['roomType'];

    // calculate number of nights
    $date1 = new DateTime($_SESSION['check_in_date']);
    $date2 = new DateTime($_SESSION['check_out_date']);
    $nights = $date2->diff($date1)->format("%a");

    $room_price = $room[0]['price'];
    $amount = $nights * $room[0]['price'];
}

// Assign Room to Guest by Admin
if(isset($_GET['guest_id'])) {
    $guest_id = $_GET['guest_id'];

    // Check if guest has already booked room(s)
    $sql = "SELECT b.*, bs.name, rt.price FROM booking AS b 
            JOIN booking_status AS bs ON b.booking_status_id=bs.id 
            JOIN room_type AS rt ON b.room_type_id=rt.id 
            WHERE b.user_id={$guest_id}";
    $guest_bookings = executeJoinQuery($sql);

    if(count($guest_bookings) > 0) {
        $_SESSION['message'] = 'Guest has already booked a room';
        $_SESSION['type'] = 'error';
        header('location: ' .BASE_URL . '\admin\guests\index.php');
    }
}

if(isset($_POST['assign-room'])) {
    $bookingErrors = validateAssignRoom($_POST);

    // Fetch record for selected room
    $room_id = $_POST['room_id'];
    $sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
            JOIN room_type AS rt ON r.room_type_id=rt.id 
            WHERE r.id={$room_id}";
    $room = executeJoinQuery($sql);

    // Check if room selected is already booked & has pending status
    $checkBooking = selectOne('booking', ['room_id' => $room_id]); 
    if($checkBooking) {
        array_push($bookingErrors, 'room is already reserved');
    }

    if(count($bookingErrors) === 0) {
        unset($_POST['assign-room']);

        // calculate number of nights
        $date1 = new DateTime($_POST['check_in_date']);
        $date2 = new DateTime($_POST['check_out_date']);
        $nights = $date2->diff($date1)->format("%a");

        // add columns needed plus room data
        $_POST['nights'] = $nights;
        $_POST['amount'] = $nights * $room[0]['price'];
        $_POST['booking_status_id'] = '1';
        $_POST['room_type_id'] = $room[0]['room_type_id'];
        $booking_id = create($table, $_POST);

        $_SESSION['message'] = 'Room Booked Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' .BASE_URL . '\admin\booking\index.php');
    } else {
        $guest_id = $_POST['user_id'];
        $roomId = $_POST['room_id'];
        $check_in = $_POST['check_in_date'];
        $check_out = $_POST['check_out_date'];
    }
}

// View Selected Booking on clicking view
if(isset($_GET['view_id'])) {
    $id = $_GET['view_id'];
    $sql = "SELECT b.*, bs.name, u.first_name, u.last_name, rt.price FROM booking AS b 
            JOIN booking_status AS bs ON b.booking_status_id=bs.id 
            JOIN users AS u ON b.user_id=u.id 
            JOIN room_type AS rt ON b.room_type_id=rt.id 
            WHERE b.id={$id}";
    $single_booking = executeJoinQuery($sql);

    $firstName = $single_booking[0]['first_name'];
    $lastName = $single_booking[0]['last_name'];
    $room_id = $single_booking[0]['room_id'];
    $check_in_date = $single_booking[0]['check_in_date'];
    $check_out_date = $single_booking[0]['check_out_date'];
    $nights = $single_booking[0]['nights'];
    $room_price = $single_booking[0]['price'];
    $amount = $single_booking[0]['amount'];
    $booking_status = $single_booking[0]['name'];
}

// Check In Guest
if(isset($_GET['checkedin_id'])) {
    $id = $_GET['checkedin_id'];

    //Update booking status to checkedIn
    $count = update('booking', $id, ['booking_status_id' => '3']);

    // update room status to occupied
    $booking = selectOne('booking', ['id' => $id]);
    $count = update('rooms', $booking['room_id'], ['is_available' => '0']);

    $_SESSION['message'] = 'Guest Checked In Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' .BASE_URL . '\admin\booking\check_out.php');
    exit();
}

// Check Out Guest
if(isset($_GET['checkedout_id'])) {
    $id = $_GET['checkedout_id'];

    //Update booking status to checkedOut
    $count = update('booking', $id, ['booking_status_id' => '4']);

    // update room status to available
    $booking = selectOne('booking', ['id' => $id]);
    $count = update('rooms', $booking['room_id'], ['is_available' => '1']);

    $_SESSION['message'] = 'Guest Checked Out Successfully';
    $_SESSION['type'] = 'success';
    header('location: ' .BASE_URL . '\admin\booking\check_out.php');
    exit();
}

// Delete Booking
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $booking = selectOne($table, ['id' => $id]);
    $count = delete($table, $id);

    $_SESSION['message'] = 'Booking Deleted Successfully';
    $_SESSION['type'] = 'success';  
    header('location: ' .BASE_URL . '\admin\booking\index.php');
    exit();
}

// Booking filter at booking page (admin)
if(isset($_POST['filter-booking'])) {
    if($_POST['booking_status_id'] === '1') {
        $bookings = $pendingBookings;
        $booking_status_id = $_POST['booking_status_id'];
        $booking_title = 'Pending Bookings';
    } else if($_POST['booking_status_id'] === '2') {
        $bookings = $confirmedBookings;
        $booking_status_id = $_POST['booking_status_id'];
        $booking_title = 'Cofirmed Bookings';
    } else if($_POST['booking_status_id'] === '3') {
        $bookings = $checkedinBookings;
        $booking_status_id = $_POST['booking_status_id'];
        $booking_title = 'Checkedin Bookings';
    } else if($_POST['booking_status_id'] === '4') {
        $bookings = $checkedoutBookings;
        $booking_status_id = $_POST['booking_status_id'];
        $booking_title = 'Checkedout Bookings';
    } else {
        $bookings = $bookings;
        $booking_status_id = 'all';
        $booking_title = 'All Bookings';
    }
}