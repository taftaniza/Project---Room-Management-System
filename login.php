<?php

session_start();
include "admin/conn.php";

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin/css/login.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <title>LOGIN PAGE</title>
  </head>
  <body>
    <div class="loginBox"> <img class="user" src="logo.jpg" height="100px" width="100px">
    <h3>Fuzo Housing</h3>
    <form action="login.php" method="post">
        <div class="inputBox"> <input id="uname" type="text" name="username" placeholder="Username"> <input id="pass" type="password" name="password" placeholder="Password"> </div> <input type="submit" name="login" value="Login">
    </form>
</div>
<?php
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $qry = mysqli_query($conn, "SELECT * FROM `login` WHERE  username = '$username' AND password = md5('$password')");
  $result = mysqli_num_rows($qry);

  if ($result == 1) {
    $_SESSION['userweb'] = $username;
    echo '<script>
    setTimeout(function() {
     swal({
       title: "Login Successful",
       text: "Welcome back!",
       type: "success"
     }, function() {
         window.location = "admin/index.php";
     });
 }, 1000);
    </script>';
  }
  else {
    echo '<script>
    setTimeout(function() {
     swal({
       title: "Sorry, username and pasword are wrong!",
       text: "Access denied",
       type: "warning"
     }, function() {
         window.location = "login.php";
     });
 }, 1000);</script>';
  };
} ?>

  </body>
</html>
