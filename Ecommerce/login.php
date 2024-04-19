<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log-in and Sign-up on Fake Fashion</title>
  <link rel="icon" href="/img/favicon.png" />
  <link rel="stylesheet" href="navbarstyle.css">
  <link rel="stylesheet" href="style-log.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />


</head>

<body>
  <?php
  require_once("navbar.html");
  ?>
  <div class="selezione-login"><button class="button-login" onclick="chooseLog('login')">LOG IN</button><button class="button-signup active" onclick="chooseLog('signup')">SIGN UP</button></div>
  <div class="form-login sign-in-container">
    <form action="#">
      <h2>Log in</h2>
      <div class="social-container">
        <a href="#" class="social-nav fb"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-nav google"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social-nav linkedin"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your account</span>
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />
      <a href="#">Forgot your password?</a>
      <button>Log In</button>
    </form>
  </div>

  <div class="form-login sign-up-container open">
    <form action="#">
      <h2>Create Account</h2>
      <div class="social-container">
        <a href="#" class="social-nav fb"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-nav google"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social-nav linkedin"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your account</span>
      <input type="text" placeholder="Name" />
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />
      <input type="password" placeholder="Repeat Password" />
      <button class="piu-margine">Sign Up</button>
    </form>
  </div>
<?php
require_once("footer.html");
?>
  <script src="script-log.js"></script>
</body>
</html>