<?php
  include "../config.php";
  session_start();

  if (isset($_SESSION['submit'])) {
    $adminAcc = $_SESSION['adminAcc'];
    $password = $_SESSION['adminPass'];
    $pass_check = $_SESSION['password_check'];

    $sql = "SELECT * FROM `person` WHERE `account` = '$adminAcc'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      header ('Location: ./adminSignup.php?error=Username already existed!');
      exit();
    } else if ($password != $pass_check) {
      header ('Location: ./adminSignup.php?error=Incorrect password!');
      exit();
    } else {
      header ('Location: ./Register_successful.php');
      exit();
    }
  }
?>