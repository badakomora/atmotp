<?php 
session_start(); 
include '../config.php';
if(isset($_POST['verify'])) {
    $otp = $_POST['otpno'];
    if (password_verify( $otp, $_GET['otp'])) {

        $query=mysqli_query($con, "SELECT * FROM bal WHERE user_id = '". $_SESSION['user_id']."'");
        $nums=mysqli_fetch_assoc($query);
        $amount = $_GET['amount'];
        $curBal = $nums['amount'];
        if($curBal < $amount){
            $msg = "Insufficient amount in your account to complete this transaction. Your Balance is KES$curBal.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header("refresh: 0, ./");
        }elseif($curBal >= $amount){
            $newBal = ceil($curBal - $amount);
            mysqli_query($con, "UPDATE bal SET amount = '$newBal' WHERE user_id = '".$_SESSION['user_id']."'");
            $msg = "You are about to withdraw $amount Ksh from your account.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header("refresh: 0, ./");
        }
    }else{
        $msg = "Please provide the correct otp to complete this transaction or account will be De-activated Completely!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0, otp.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="form-container">
        <form action="" method="post">
        <div class="field-container">
            <label>OTP</label>
            <input placeholder="enter the otp sent to your phone" name="otpno">
        </div>
        <div class="field-container">   
        </div>
        <hr>
        <div class="field-container">
            <button style="width:350px;height:45px;background-color:grey;border:none;color:white;" type="submit" name="verify">Verify</button>
        </div>
        </form>
    </div>
</body>
</html>