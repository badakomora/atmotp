<?php


include '../config.php';
if(isset($_GET['deactivate'])) {

    mysqli_query($con, "UPDATE users SET status = '".$_GET['status']."' WHERE id = '".$_GET['deactivate']."'");
    $msg = "user status record updated successfully!";
        echo "<script type='text/javascript'>
        alert('$msg');
        window.location = './?p=Users';
    </script>";

}elseif(isset($_GET['delete'])){

    mysqli_query($con, "DELETE FROM users WHERE id = '".$_GET['delete']."'");
    mysqli_query($con, "DELETE FROM deposits WHERE user_id = '".$_GET['delete']."'");
    mysqli_query($con, "DELETE FROM withdrawals WHERE user_id = '".$_GET['delete']."'");
    mysqli_query($con, "DELETE FROM bal WHERE user_id = '".$_GET['delete']."'");
    $msg = "All user records deleted successfully!";
    echo "<script type='text/javascript'>
    alert('$msg');
    window.location = './?p=Uuser';
    </script>";

}else{

}
?>