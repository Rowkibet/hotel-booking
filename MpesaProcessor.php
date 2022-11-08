<?php
require __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

if (isset($_GET['amount'])) {
    $room_id = $_GET['room_id'];
    $amount = $_GET['amount'];
    stkPush($amount, $room_id);
}

function stkPush($amount, $room_id)
{
    $formatedPhoneNo = substr_replace($_SESSION['phone_no'], '254', 0, 1);

    // where the request is sent
    $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

    // request body
    $curl_post_data = [
        'BusinessShortCode' =>174379,
        'Password' => lipaNaMpesaPassword(),
        'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $amount,
        'PartyA' => $formatedPhoneNo,
        'PartyB' => 174379,
        'PhoneNumber' => $_SESSION['phone_no'],
        'CallBackURL' => 'https://60a8b840129d.ngrok.io/callback',
        'AccountReference' => "Hotel Booking Payment",
        'TransactionDesc' => "Pay {$amount} for Room {$room_id}"
    ];

    // send the request body as a string
    $data_string = json_encode($curl_post_data);

    // initiating the transaction
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $initiate_url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.newAccessToken()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    // response body from api - the api also triggers the stk push at payer's phone
    $curl_response = curl_exec($curl);
    print_r($curl_response);

    // redirect to booking.php

}

function lipaNaMpesaPassword()
{
    //timestamp
    $timestamp = Carbon::rawParse('now')->format('YmdHms');
    //passkey
    $passKey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $businessShortCOde =174379;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde.$passKey.$timestamp);

    return $mpesaPassword;
}
    

function newAccessToken()
{
    $consumer_key="1AqpvrozQwdlTVhibWrXiujkvPYEfvIV";
    $consumer_secret="17XSgrEAZxM3nqAp";
    $credentials = base64_encode($consumer_key.":".$consumer_secret);
    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    $access_token=json_decode($curl_response);
    curl_close($curl);
    
    return $access_token->access_token;
}
