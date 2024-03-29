<?php
session_start();
include './config.php';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $msg = '';

  $query = mysqli_query($con, "SELECT * FROM admin where email = '$email'");
  $row = mysqli_fetch_assoc($query);

  if ($row >= 1) {
    if (password_verify($password, $row['password'])) {

      $_SESSION['user_id'] = $row['id'];
      $_SESSION['fullname'] = $row['fullname'];
      $_SESSION['email'] = $row['email'];

      header('refresh: 0, ./admin/?p=Dashboard');
      $msg = "Admin Login Access Granted. WELCOME!";
      echo "<script type='text/javascript'>alert('$msg');</script>";
    } else {
      header('refresh: 0, ./adminlogin.php');
      $msg = "Admin Login Access Denied. Please use the correct credentials";
      echo "<script type='text/javascript'>alert('$msg');</script>";
    }
  } else {

    header('refresh: 0, ./');
    $msg = "This email does not exist in the system. Please use the correct credentials.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
  }
} elseif (isset($_POST['Register'])) {

  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $users = mysqli_query($con, "SELECT * FROM admin WHERE email='$email'");
  $rows = mysqli_num_rows($users);
  if ($rows >= 1) {
    $msg = "This user ALready Exists. Please use a different email to sign Up.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh: 0, ./adminlogin.php");
  } else {
    $insert = mysqli_query($con, "INSERT INTO admin(fullname, email, password) VALUES('$fullname', '$email', '$password')");
    $msg = "Admin Registration Successful! Procced to sign in.";
    echo "<script type='text/javascript'>alert('$msg');</script>";
    header("refresh: 0, ./adminlogin.php");
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
  <section class="user">
    <div class="user_options-container">
      <div class="user_options-text">
        <div class="user_options-unregistered">
          <h2 class="user_unregistered-title">SMART ATM, for you.</h2>
          <p class="user_unregistered-text">SmartATM allows a variety of transactions process and solutions such as deposits, withdrawals, and otp verification for your money safety. Don't have an account?</p>
          <button class="user_unregistered-signup" id="signup-button">Sign up</button>
        </div>

        <div class="user_options-registered">
          <h2 class="user_registered-title">Choose SMART ATM.</h2>
          <p class="user_registered-text">SmartATM is the place to be. Create your account for free and have your mobile money secure. Have an account?</p>
          <button class="user_registered-login" id="login-button">Login</button>
        </div>
      </div>

      <div class="user_options-forms" id="user_options-forms">
        <div class="user_forms-login">
        <img src="logo.png" height="100px" width="150px" alt="">
          <h2 class="forms_title" style="margin-left: 25px;">Admin Login</h2>
          <form class="forms_form" method="post" action=""  style="margin-left: 25px;">
            <fieldset class="forms_fieldset">
              <div class="forms_field">
                <input type="email" placeholder="Email" name="email" class="forms_field-input" required autofocus />
              </div>
              <div class="forms_field">
                <input type="password" placeholder="Password" name="password" class="forms_field-input" required />
              </div>
            </fieldset>
            <div class="forms_buttons">
              <input type="submit" value="Log In" name="login" class="forms_buttons-action">
            </div>
          </form>
        </div>
        <div class="user_forms-signup">
        <img src="logo.png" height="100px" width="150px" alt="">
          <h2 class="forms_title" style="margin-left: 25px;">Admin Sign Up</h2>
          <form class="forms_form" method="POST" action=""  style="margin-left: 25px;">
            <fieldset class="forms_fieldset">
              <div class="forms_field">
                <input type="text" placeholder="Full Name" name="fullname" class="forms_field-input" required />
              </div>
              <div class="forms_field">
                <input type="email" placeholder="Email" name="email" class="forms_field-input" required />
              </div>
              <div class="forms_field">
                <input type="password" placeholder="Password" name="password" class="forms_field-input" required />
              </div>
            </fieldset>
            <div class="forms_buttons">
              <input type="submit" value="Sign up" name="Register" class="forms_buttons-action">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <!----------Designed By Pradeep Singh Tomar------------>
  <script>
    /**
     * Variables
     */
    const signupButton = document.getElementById('signup-button'),
      loginButton = document.getElementById('login-button'),
      userForms = document.getElementById('user_options-forms')

    /**
     * Add event listener to the "Sign Up" button
     */
    signupButton.addEventListener('click', () => {
      userForms.classList.remove('bounceRight')
      userForms.classList.add('bounceLeft')
    }, false)

    /**
     * Add event listener to the "Login" button
     */
    loginButton.addEventListener('click', () => {
      userForms.classList.remove('bounceLeft')
      userForms.classList.add('bounceRight')
    }, false)
  </script>
</body>

</html>