<?php
include "Include/config.php";
// error_reporting(0);
session_start();
if (isset($_SESSION["id"])) {
  header("Location: user.php");
}
$notif = '';
$status = 0; // Default status is 0 (login failed)

if (isset($_POST['loginBtn'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM employee_tbl WHERE username = '" . $username . "'";
  $list = $conn->query($sql);
  $fetch = $list->fetch_assoc();

  if ($username && $password) {
    if ($list->num_rows) {
      if ($fetch['status'] == 1) { // Check if the account is active
        if ($password == $fetch['password']) {
          // Successful login
          $_SESSION['id'] = $fetch['id'];
          $_SESSION['username'] = $fetch['username'];
          $_SESSION['usertype'] = $fetch['usertype'];
          $_SESSION['access'] = $fetch['access'];
          $_SESSION['status'] = 1; // Set status 1 for successful login

          $_SESSION['success'] = 'primary';

                header("location: user.php");
        } else {
          // Incorrect password
          $_SESSION['status'] = 0; // Set status 0 for incorrect password
          $notif = "Incorrect password. Please try again.";
          $_SESSION['message'] = 'Incorrect password. Please try again!';
          $_SESSION['success'] = 'danger';
        }
      } else {
        // Account is inactive
        $_SESSION['status'] = 0; // Set status 0 for inactive account
        $notif = "Account is inactive. Kindly please contact your administrator.";
        $_SESSION['message'] = 'Account is inactive. Kindly please contact your administrator!';
        $_SESSION['success'] = 'danger';
      }
    } else {
      // No such account
      $_SESSION['status'] = 0; // Set status 0 for no such account
      $notif = 'There is no such account';
      $_SESSION['message'] = 'There is no such account';
      $_SESSION['success'] = 'danger';
    }
  } else {
    // Empty fields
    $_SESSION['status'] = 0; // Set status 0 for empty fields
    $notif = 'Please fill up all fields';
    $_SESSION['message'] = 'Please fill up all fields';
    $_SESSION['success'] = 'danger';
  }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <title>Login Form Demo</title>
</head>

<body>
  <div class="login-wrapper">
    <form method="post" class="form">
      <img src="images/logo1.jpg" alt="">
      <h2>Login</h2>
      <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success'] == 'danger' ? '  btn-border text-light text-center' : null ?>" role="alert" style="background-color:red;">
          <?= $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
      <?php endif ?>
      &nbsp;
      <div class="input-group">
        &nbsp;
        <input type="text" name="username" id="loginUser" placeholder="Enter your Username">
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        &nbsp;
        <input type="password" name="password" id="loginPassword" placeholder="Enter your Password">
        <label for="loginPassword">Password</label>
        <i class="bi bi-eye-slash" id="togglePassword"></i>
      </div>
      <div class="row m-t-25 text-left">
        <div class="col-sm-7 col-xs-12">
          <div class="checkbox-fade fade-in-primary text-left">
            <input type="checkbox" value="lsRememberMe" id="rememberMe">
            <span class="text-inverse">Remember Me</span>
          </div>
        </div>
        <div class="col-sm-5 col-xs-12 forgot-phone text-right">
          <a href="#forgot-pw" class="text-right f-w-600 text-inverse"> Forgot Password?</a>
        </div>
      </div>
      <br><br>
      <button class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="loginBtn">Sign IN</button>
    </form>

    <!-- <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div> -->
  </div>
  <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#loginPassword");

    togglePassword.addEventListener("click", function() {
      // toggle the type attribute
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);

      // toggle the icon
      this.classList.toggle("bi-eye");
    });
  </script>
</body>

</html>