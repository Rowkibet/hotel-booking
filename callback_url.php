<?php
include(ROOT_PATH . "\app\database\db.php");

header("Content-Type: application/json");

    $response = '{
        "ResultCode": 0, 
        "ResultDesc": "Confirmation Received Successfully"
    }';

    $body ='Body';
    // DATA
    $mpesaResponse = file_get_contents('php://input');

    // log the response
    $logFile = "M_PESAConfirmationResponse.json";


    // write to file
    $log = fopen($logFile, "a");

    fwrite($log, $mpesaResponse);
    fclose($log);

    //Processing the Mpesa json response Data
    $mpesaResponse = file_get_contents('M_PESAConfirmationResponse.json');
    $callbackContent = json_decode($mpesaResponse);
    
    $Resultcode = $callbackContent->Body->stkCallback->ResultCode;
    $CheckoutRequestID = $callbackContent->Body->stkCallback->CheckoutRequestID;
    $Amount = $callbackContent->Body->stkCallback->CallbackMetadata->Item[0]->Value;
    $MpesaReceiptNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[1]->Value;
    $TranscationDate = $callbackContent->Body->stkCallback->CallbackMetadata->Item[3]->Value;
    $PhoneNumber = $callbackContent->Body->stkCallback->CallbackMetadata->Item[4]->Value;
    $room_price = roomPrice($_SESSION['room_id']);
    $user_id = $_SESSION['id'];

    if ($Resultcode == 0) {
        $insert = $conn->query("INSERT INTO payments(receipt_no,payment_date,amount_paid,payment_type,user_id) VALUES ('$MpesaReceiptNumber','$TranscationDate','$room_price','1','$user_id')");

        if($insert){
            unset($logFile);
        }
    }

    


    echo $response;