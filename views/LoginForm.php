<!DOCTYPE html>
<html lang="en">

<head>
  <title>Foxy Network</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="../assets/images/icons/icon.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" method="post">
          <span class="login100-form-title p-b-26">
            Welcome back !
          </span>
          <span class="login100-form-title p-b-48">
            <div class="icon">
              <img src="../assets/images/icons/icon.png">
            </div>
          </span>

          <div class="wrap-input100 validate-input" aria-autocomplete="none">
            <input class="input100" type="text" name="username">
            <span class="focus-input100" data-placeholder="Username"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button type="submit" class="login100-form-btn" name="loginSubmit">
                Login
              </button>
            </div>
          </div>

          <div class="text-center p-t-30">
            <span class="txt1">
              Don’t have an account ?
            </span>

            <a class="txt2" href="?action=register">
              Sign Up
            </a>
          </div>
          <div class="alert alert-danger mx-auto mt-3" id="loginFailure" style="display:none" role="alert">
            <p><strong>Mot de passe erroné !</strong></p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="../js/main.js"></script>

</body>

</html>