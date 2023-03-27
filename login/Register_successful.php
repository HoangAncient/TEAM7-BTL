<?php
  include "../config.php";
  session_start();

  if (isset($_SESSION['submit'])) {
    function validate($data) {
      $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $adminAcc = validate($_SESSION['adminAcc']);
    $adminPass = validate($_SESSION['adminPass']);
    $firstName = validate($_SESSION['firstName']);
    $lastName = validate($_SESSION['lastName']);
    $email = validate($_SESSION['email']);
    $birthday = validate($_SESSION['birthday']);
    $phone = validate($_SESSION['phone']);

    $sql = "INSERT INTO person (account, pass, firstName, lastName, email, birthday, phoneNumber) VALUES ('$adminAcc', '$adminPass', '$firstName', '$lastName', '$email', '$birthday', '$phone')";

    $result = $conn->query($sql);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Document</title>
</head>
<body>
  <h1>You have successfully created an account!</h1>
  <h2>We are redirecting you to the 'Sign in' page in seconds</h2>

  <script>
    function sign_in() {
      setTimeout(() => {
        window.location.href = 'adminLogin.php';
      }, 5000);
    }
    sign_in();
  </script>
</body>
</html>