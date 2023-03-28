<?php 
session_start(); 
if(!isset($_SESSION['email'])) {
$msg = "Please Sign In Correctly or your Account will be De-activated Completely!";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("refresh: 0, ../");
}
include '../config.php';
if(isset($_POST['deposit'])){
    $query=mysqli_query($con, "SELECT * FROM bal WHERE user_id = '". $_SESSION['user_id']."'");
    $nums=mysqli_fetch_assoc($query);
    $amount = $_POST['amount'];
    $curBal = $nums['amount'];
    $num = mysqli_num_rows($query);

    if ($num >= 1) {
        mysqli_query($con, "UPDATE bal SET amount = amount + $amount WHERE user_id = '" . $_SESSION['user_id'] . "' ");
        $msg = "You are about to deposit $amount Ksh to your account.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0,./");
    }else{
        mysqli_query($con, "INSERT INTO bal(user_id, amount) VALUES('" . $_SESSION['user_id'] . "', $amount)");
        $msg = "You are about to deposit $amount Ksh to your account.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0,./");
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
    <div class="payment-title">
        <h3>SMART ATM</h3><hr><br>
        <h1>Account Information</h1>
        <p><?php echo $_SESSION['email']?></p>
        <h4>Balance: <span style="background-color:grey;color:white;border-radius:5px;padding:5px;"> KES <?php
                            $query = mysqli_query($con, "SELECT * FROM bal WHERE user_id = '" . $_SESSION['user_id'] . "' ");
                            $num = mysqli_num_rows($query);
                            if ($num >= 1) {
                                $row = mysqli_fetch_assoc($query);
                                $balance = $row['amount'];
                                echo $balance;
                            } else {
                                echo 0;
                            }
                            ?></span></h4>
        <div style="display:block;">
        <form action="" method="post">
            <div class="field-container">
                <input type="text" placeholder="Enter amount to deposit" name="amount" style="width: 300px;" required>
            </div>
            <br>
            <button style="width:100px;height:45px;background-color:rgb(17, 117, 156);border:none;color:white;" type="submit" name="deposit">Deposit</button> 
        </form>
        <h4><a href="../logout.php" style="color:black;">Logout</a></h4>
</div>
    </div>
    </center>
    <div class="container preload">
        <div class="creditcard">
            <div class="front">
                <div id="ccsingle"></div>
                <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                    <g id="Front">
                        <g id="CardBackground">
                            <g id="Page-1_1_">
                                <g id="amex_1_">
                                    <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                            C0,17.9,17.9,0,40,0z" />
                                </g>
                            </g>
                            <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                        </g>

                        <text transform="matrix(1 0 0 1 60.106 295.0121)" id="accno" class="st2 st3 st4"></text>
                        <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6"><?php echo $_SESSION['fullname']; ?></text>
                        <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                        <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                        <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                        <g>
                            <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/25</text>
                            <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                            <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                            <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		" />
                        </g>
                        <g id="cchip">
                            <g>
                                <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                        c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                            </g>
                            <g>
                                <g>
                                    <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                </g>
                                <g>
                                    <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                </g>
                                <g>
                                    <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                            c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                            C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                            c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                            c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                                </g>
                                <g>
                                    <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                </g>
                                <g>
                                    <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                </g>
                                <g>
                                    <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                </g>
                                <g>
                                    <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                </g>
                            </g>
                        </g>
                    </g>
                    <g id="Back">
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <div class="form-container">
        <form action="../home/index.php" method="post">
        <div class="field-container">
            <label>Phone No.</label>
            <input type="text" placeholder="enter phone" name="phone" maxlength="20" required>
        </div>
        <div class="field-container">
            <label >Account No.</label>
            <input type="text" name="accno" value="<?php echo $_SESSION['accountno']; ?>">
        </div>
        <div class="field-container">
            <label>Amount to Withdraw</label>
            <input type="text" placeholder="enter amount to withdraw" name="amount" required>
        </div>
        <div class="field-container">   
        </div>
        <hr>
        <div class="field-container">
            <button style="width:350px;height:45px;background-color:grey;border:none;color:white;" type="submit">Withdraw</button>
        </div>
        </form>
    </div>
   
    <script>
        function separateNumber(number) {
        var str = number.toString();
        var result = '';
        for (var i = 0; i < str.length; i++) {
            if (i > 0 && i % 4 == 0) {
            result += ' ';
            }
            result += str.charAt(i);
        }
        return result;
        }
        var number = <?php echo $_SESSION['cardno']?>;
        document.getElementById("accno").innerHTML = separateNumber(number);
    </script>
</body>
</html>