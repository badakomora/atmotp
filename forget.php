<?php

if(isset($_GET['request'])){


if(isset($_POST['updatepass'])){
    include './config.php';
    $accno = $_GET['accno'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    mysqli_query($con, "UPDATE users SET password = '$password' WHERE phone = '$accno' ");
    $msg = "Password updated successfully! Proceed to login with the new password.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh: 0,./");
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./account/style.css">
    <title>Document</title>
</head>
<body>
<center>
<div class="form-container">
    <br><br>
        <form action="" method="post">
        <div class="field-container">
            <label>New Password.</label><br>
            <hr width="100%">
            <input placeholder="Enter new password." style="width:340px;height:45px;" name="password" required>
        </div>
        <br>
        <div class="field-container">   
        </div>
        <div class="field-container">
            <button style="width:350px;height:45px;background-color:grey;border:none;color:white;" type="submit" name="updatepass">Update</button>
        </div>
        </form>
       
       
</div>
<br>
<label><a href="./" style="color:black"><i class="bi bi-arrow-left"></i> Go back</a></label>
</center>
</body>
</html>









<?php }else{?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./account/style.css">
    <title>Document</title>
</head>
<body>
<center>
<div class="form-container">
    <br><br>
        <form action="./home/index.php" method="post">
        <div class="field-container">
            <label>Phone No.</label><br>
            <hr width="100%">
            <input placeholder="Enter account registered phone no." style="width:340px;height:45px;" name="accno" required>
        </div>
        <br>
        <div class="field-container">   
        </div>
        <div class="field-container">
            <button style="width:350px;height:45px;background-color:grey;border:none;color:white;" type="submit" name="forgetpassword">Submit</button>
        </div>
        </form>
       
       
</div>
<br>
<label><a href="./" style="color:black"><i class="bi bi-arrow-left"></i> Go back</a></label>
</center>
</body>
</html>
<?php }?>
