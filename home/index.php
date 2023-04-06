<?php
session_start();
require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;

if (isset($_POST['withdraw'])) {
  function withdraw()
  {
    // Set your app credentials
    $username = "sandbox";
    $apiKey = "fb48aaefd42f989ad3071bd25342aca83b97d592cd14cb89331a9371ac0177b0";
    // Initialize the SDK
    $AT = new AfricasTalking($username, $apiKey);
    // Get the SMS service
    $sms = $AT->sms();
    // Set the numbers you want to send to in international format
    $recipients = $_POST['phone'];

    //otp generator
    $otp = rand(100000, 999999); //OTP generate
    $value = password_hash($otp, PASSWORD_DEFAULT);
    // Set your message
    $message = "This is your otp: " . $otp . ". Do not share your otp.";
    // Set your shortCode or senderId
    $from = "SmartATM";
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
      echo "Error: " . $e->getMessage();
    }
  }

  // writeMsg(); // call the function
  withdraw();
} elseif (isset($_POST['forgetpassword'])) {
  // call the function

  function forgetpass()
  {
    // Set your app credentials
    $username = "sandbox";
    $apiKey = "fb48aaefd42f989ad3071bd25342aca83b97d592cd14cb89331a9371ac0177b0";
    // Initialize the SDK
    $AT = new AfricasTalking($username, $apiKey);
    // Get the SMS service
    $sms = $AT->sms();

    include '../config.php';
    $query = mysqli_query($con, "SELECT * FROM users WHERE phone = '" . $_POST['accno'] . "'");
    $num = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    // Set the numbers you want to send to in international format
    if ($num >= 1) {
      $recipients = $row['phone'];

      //otp generator
      $otp = rand(100000, 999999); //OTP generate
      $value = password_hash($otp, PASSWORD_DEFAULT);
      // Set your message
      $message = "This is your otp: " . $otp . ". Do not share your otp.";
      // Set your shortCode or senderId
      $from = "SmartATM";
      try {
        // Thats it, hit send and we'll take care of the rest
        $sms->send([
          'to' => $recipients,
          'message' => $message,
          'from' => $from
        ]);
        $accno = $_POST['accno'];
        $msg = "Forget Password request sent succesfully! An otp has been sent to this phone number, verify it to complete forget password request.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0,../account/otp.php?otp=$value&accno=$accno");
        // print_r($result);
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    } else {
      $msg = "This Account Phone number does not exit!";
      echo "<script type='text/javascript'>alert('$msg');</script>";
      header("refresh: 0,../");
    }
  }
  forgetpass();
}
