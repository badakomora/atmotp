<?php 
session_start(); 
include '../config.php';
if(isset($_GET['amount'])){









    if(isset($_POST['withrawal'])) {
        
            $accno = $_GET['accno'];
            if($_GET['accno'] == $_SESSION['accountno']){
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
                    mysqli_query($con, "INSERT INTO withdrawals(user_id, amount, withdrawal_time, transaction) VALUES('" . $_SESSION['user_id'] . "', '$amount', NOW(), 'Withdrawal')");
                    $msg = "You are about to withdraw $amount Ksh from your account.";
                    echo "<script type='text/javascript'>alert('$msg');</script>";
                    header("refresh: 0, ./");
                }
            }else{
                $msg = "Please provide the correct otp to complete this transaction!";
                echo "<script type='text/javascript'>alert('$msg');</script>";
                header("refresh: 0, ./");
            }
        }
    else{
            $msg = "Please provide your correct registered account number to complete this transaction!";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header("refresh: 0, ./");
    }
}
    
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
    <center>
    <div class="form-container">
        <br><br>
            <form action="" method="post">
            <div class="field-container">
                <label>Provide OTP to complete withdrawal transaction</label><br>
                <hr width="50%">
                <input placeholder=" Enter the otp sent to your phone" style="width:340px;height:45px;" name="otpno" required>
            </div>
            <br>
            <div class="field-container">   
            </div>
            <div class="field-container">
                <button style="width:350px;height:45px;background-color:grey;border:none;color:white;" type="submit" name="withrawal">Verify</button>
            </div>
            </form>
           
           
    </div>
    <br>
    <label><a href="./" style="color:black"><i class="bi bi-arrow-left"></i> Go back</a></label>
    </center>
    </body>
    </html>












<?php }else{
























if(isset($_POST['password'])) {

    $accno = $_GET['accno'];
    $otp = $_POST['otpno'];
    if (password_verify( $otp, $_GET['otp'])) {
        $msg = "Otp verified successfully! Proceed.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0, ../forget.php?accno=$accno&request=successfully");
    }else{
        $msg = "Please provide the correct otp to complete forget password request!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0, ../");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<center>
<div class="form-container">
    <br><br>
        <form action="" method="post">
        <div class="field-container">
            <label>Provide OTP to complete forget password request</label><br>
            <hr width="50%">
            <input placeholder=" Enter the otp sent to your phone" style="width:340px;height:45px;" name="otpno" required>
        </div>
        <br>
        <div class="field-container">   
        </div>
        <div class="field-container">
            <button style="width:350px;height:45px;background-color:grey;border:none;color:white;" type="submit" name="password">Verify</button>
        </div>
        </form>
       
       
</div>
<br>
<label><a href="../" style="color:black"><i class="bi bi-arrow-left"></i> Go back</a></label>
</center>
</body>
</html>



<?php }?>











