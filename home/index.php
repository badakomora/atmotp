<?php
session_start();
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
function writeMsg() {
    // Set your app credentials
    $username = "sandbox";
    $apiKey = "366c8f351f6325c5765510da33ef92f5f9b7cd20e28c829e8e16e030c78a663c";
    // Initialize the SDK
    $AT = new AfricasTalking($username, $apiKey);
    // Get the SMS service
    $sms = $AT->sms();
    // Set the numbers you want to send to in international format
    $recipients = $_POST['phone'];
  
    //otp generator
    $otp = rand(100000, 999999);//OTP generate
    $value = password_hash($otp, PASSWORD_DEFAULT);
    // Set your message
    $message = "This is your otp: ".$otp.". Do not share your otp.";
    // Set your shortCode or senderId
    $from = "bada";
    try {
    // Thats it, hit send and we'll take care of the rest
    $sms->send([
    'to' => $recipients,
    'message' => $message,
    'from' => $from
    ]);
    
    $msg = "Transaction request sent succesfully! An otp has been sent to your phone, verify it to complete transaction.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    $amount = $_POST['amount'];
    $accno = $_POST['accno'];
    header("refresh: 0, ../account/otp.php?amount=$amount&accno=$accno&otp=$value");
    // print_r($result);
    } catch (Exception $e) {
    echo "Error: ".$e->getMessage();
    }
  }
  
  // writeMsg(); // call the function
  writeMsg();