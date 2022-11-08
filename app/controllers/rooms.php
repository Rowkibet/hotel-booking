<?php
include(ROOT_PATH . "/app/helpers/validateRoom.php");

$errors = array();
$table = 'rooms';

$room_id = '';
$room_type = '';
$room_images = '';
$room_price = '';
$room_type_id = '';
$room_status = '';
$room_type_name = '';

// retrieve all room details
$sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
        JOIN room_type AS rt ON r.room_type_id=rt.id";
$rooms = executeJoinQuery($sql);
$noOfRooms = count($rooms);

// retrieve all room types - display on drop down form
$room_types = selectAll('room_type');

// retrieve all single rooms
$sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
        JOIN room_type AS rt ON r.room_type_id=rt.id
        WHERE r.room_type_id=1";
$single_rooms = executeJoinQuery($sql);

// retrieve all double rooms
$sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
        JOIN room_type AS rt ON r.room_type_id=rt.id
        WHERE r.room_type_id=2";
$double_rooms = executeJoinQuery($sql);

// retrieve all family rooms
$sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
        JOIN room_type AS rt ON r.room_type_id=rt.id
        WHERE r.room_type_id=3";
$family_rooms = executeJoinQuery($sql);

// retrieve all rooms that are available
$availableRooms = selectAll($table, ['is_available' => 1]);

// create room
if(isset($_POST['add-room'])) {
    $errors = validateRoom($_POST);

    if(!empty($_FILES['room_images']['name'])) {
        $image_name = time() . '_' . $_FILES['room_images']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['room_images']['tmp_name'], $destination);

        if($result) {
            $_POST['room_images'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "Room image required");
    }

    if(count($errors) === 0) {
        unset($_POST['add-room']);
        $room_id = create($table, $_POST);
    
        $_SESSION['message'] = 'Room Added Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\rooms\index.php');
        exit();
    } else {
        $room_type_id = $_POST['room_type_id'];
        $room_status = $_POST['is_available'];
        $room_images = $_POST['room_images'];
    }

}

// Update Room, View Room & Display details at single_room.php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT r.*, rt.name, rt.price FROM rooms AS r 
            JOIN room_type AS rt ON r.room_type_id=rt.id 
            WHERE r.id={$id}";
    $room = executeJoinQuery($sql);

    // display details on the form & view page
    $room_id = $room[0]['id'];
    $room_type = $room[0]['name'];
    $room_status = strval($room[0]['is_available']);
    $room_price = $room[0]['price'];
    $room_type_id = $room[0]['room_type_id'];
    $room_images = $room[0]['room_images'];
}

if(isset($_POST['update-room'])) {
    $errors = validateRoom($_POST);

    if(!empty($_FILES['room_images']['name'])) {
        $image_name = time() . '_' . $_FILES['room_images']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;

        $result = move_uploaded_file($_FILES['room_images']['tmp_name'], $destination);

        if($result) {
            $_POST['room_images'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        array_push($errors, "Room image required");
    }

    if(count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['update-room'], $_POST['id']);
        $count = update($table, $id, $_POST);
    
        $_SESSION['message'] = 'Room Updated Successfully';
        $_SESSION['type'] = 'success';  
        header('location: ' .BASE_URL . '\admin\rooms\index.php');
        exit();
    } else {
        $room_type_id = $_POST['room_type_id'];
        $room_status = $_POST['is_available'];
        $room_images = $_POST['room_images'];
    }
}

// Delete Room
if(isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $user = selectOne($table, ['id' => $id]);
    $count = delete($table, $id);

    $_SESSION['message'] = 'Room Deleted Successfully';
    $_SESSION['type'] = 'success';  
    header('location: ' .BASE_URL . '\admin\rooms\index.php');
    exit();
}

// room filter at rooms page
if(isset($_POST['filter-room'])) {
    if($_POST['room_type'] === '1') {
        $rooms = $single_rooms;
        $room_type_id = $_POST['room_type'];
        $room_type_name = 'Single Rooms';
    } else if($_POST['room_type'] === '2') {
        $rooms = $double_rooms;
        $room_type_id = $_POST['room_type'];
        $room_type_name = 'Double Rooms';
    } else if($_POST['room_type'] === '3') {
        $rooms = $family_rooms;
        $room_type_id = $_POST['room_type'];
        $room_type_name = 'Family Rooms';
    } else {
        $rooms = $rooms;
        $room_type_id = 'all';
        $room_type_name = 'All Rooms';
    }
}

// Clicking on Browse More Rooms Btn
if(isset($_GET['rt_id'])) {
    if($_GET['rt_id'] === '1') {
        $rooms = $single_rooms;
        $room_type_id = $_GET['rt_id'];
        $room_type_name = 'Single Rooms';
    } else if($_GET['rt_id'] === '2') {
        $rooms = $double_rooms;
        $room_type_id = $_GET['rt_id'];
        $room_type_name = 'Double Rooms';
    } else if($_GET['rt_id'] === '3') {
        $rooms = $family_rooms;
        $room_type_id = $_GET['rt_id'];
        $room_type_name = 'Family Rooms';
    } else {
        $rooms = $rooms;
        $room_type_id = 'all';
        $room_type_name = 'All Rooms';
    }
}