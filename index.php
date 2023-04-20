<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wcontest-Team2</title>
<<<<<<< Updated upstream
  <!-- API (Bootstrap for design, Ajax for DOM)-->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <!--jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--Icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/font/themify-icons-font/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="./assets/css/loginUI.css">
=======


  <!-- <link rel="stylesheet" href="./assets/css/bootstrapcss/bootstrap.css">
  <script src="../assets/js/bootstrapjs/bootstrap.bundle.js"></script> -->

  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .bg {
      /* The image used */
      background-image: url("./assets/image/firstAppearance.svg");

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .buttons {
      display: relative;
      float: right;
      margin-right: 100px;
    }
    .btn {
      display: inline-block;
      width: 95px;
      height: 50px;
      background: linear-gradient(270deg, #AFA0FD 0%, #FF9FF0 100%);
      box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.25);
      border-radius: 18px;
      color: white;
      text-decoration: none;


      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-size: 20px;
      line-height: 50px;
      align-items: center;
      text-align: center;

      margin: 10px 10px;
    }
  </style>


>>>>>>> Stashed changes

</head>

<body>
<<<<<<< Updated upstream
  
  <nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="https://rabiloo.com/images/logo-menu-white.svg" alt=""></a>
      <a href="./login/adminLogin.php"><span class="navbar-toggler-icon"></span></a>
=======

  <div class="bg">
    <div class="buttons">
      <a href="./login/adminLogin.php">
        <div class="btn">Login</div>
      </a>
      <a href="./login/adminSignup.php">
        <div class="btn">Sign Up</div>
      </a>
>>>>>>> Stashed changes
    </div>
  </nav>

<<<<<<< Updated upstream
  <form action="userLogin.php" method="post" class="user-login">
    <fieldset>
      <div style="display: flex; justify-content: center">
        <input class="id-login" type="text" placeholder="Enter test id" name="testID">
      </div>
      <?php if (isset($_GET['error'])) { ?>
        <p id="invalid" style="text-align: center; color: red; padding-top: 1%; margin: 0; font-size: 1.2rem">
      <?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div style="display: flex; justify-content: center">
        <button class="user-login-button" type="submit">
          Login
        </button>
      </div>
    </fieldset>
=======

  </div>

  </div>
  <!-- <a href="./login/adminLogin.php"><img style="height:100%" src="./assets/image/firstAppearance.svg" alt=""></a> -->


>>>>>>> Stashed changes

  </form>
</body>

</html>