<?php
require_once("include/config_session.php");
?>
<nav>
  <div class="wrapper">
    <a class="logo" href="index.php"
      ><img src="img/logo.png" alt="Fake Store Logo"
    /></a>
    <input type="radio" name="slider" id="menu-btn" />
    <input type="radio" name="slider" id="close-btn" />
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"
        ><i class="fas fa-times"></i
      ></label>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li>
        <a href="#" class="desktop-item">Products</a>
        <input type="checkbox" id="showMega" />
        <label for="showMega" class="mobile-item">Products</label>
        <div class="mega-box">
          <div class="content">
            <div class="row">
              <img src="img/menu.png" alt="Fashion Clothings" />
            </div>
            <div class="row">
              <header>Woman</header>
              <ul class="mega-links">
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">jewlery</a></li>
                <li><a href="#">Shoes</a></li>
              </ul>
            </div>
            <div class="row">
              <header>Man</header>
              <ul class="mega-links">
                <li><a href="#">T-shirt</a></li>
                <li><a href="#">Pants</a></li>
                <li><a href="#">jewlery</a></li>
                <li><a href="#">Shoes</a></li>
              </ul>
            </div>
            <div class="row">
              <header>Tech</header>
              <ul class="mega-links">
                <li><a href="#">Cellphone</a></li>
                <li><a href="#">Computer</a></li>
                <li><a href="#">TV</a></li>
                <li><a href="#">Appliance</a></li>
              </ul>
            </div>
          </div>
        </div>
      </li>
      <li class="menu-cell">
        <a href="login.php"><i class="bi bi-person"></i></a>
      </li>
      <li class="menu-cell">
        <a href="#"><i class="bi bi-bookmark"></i></a>
      </li>
      <li class="menu-cell">
        <a href="#"><i class="bi bi-cart3"></i></a>
      </li>
    </ul>
    <span class="section">
      <ul class="nav-links">
        <li>
          <a><i class="desktop-item bi bi-person"></i></a>
          <input type="checkbox" id="showDrop" />
          <ul class="drop-menu">
            <li>
              <?php
              if(isset ($_SESSION["logged_in"])){
                echo '
                <li>You are logged in as '. $_SESSION["user_username"].'</li>
                <form action="include/logout.php" method="post">
                <button>Log Out</button>
              </form>';?>
<?php
              } else {
                echo '<li>Access your account</li> <button onclick="displayBarraLaterale()">Log in / Sign up</button>';
              }
              ?>
              
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="bi bi-bookmark"></i></a>
        </li>
        <li>
          <a href="#"><i class="bi bi-cart3"></i></a>
        </li>
      </ul>
    </span>
    <label for="menu-btn" class="btn menu-btn"
      ><i class="fas fa-bars"></i
    ></label>
  </div>
</nav>
<div class="form-laterale sign-in-container">
  <form action="include/login_check.php" method="post">
    <i class="fas fa-times" onclick="closeBarraLaterale()"></i>
    <h2>Log in</h2>
    <div class="social-container">
      <a href="#" class="social-nav fb"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="social-nav google"
        ><i class="fab fa-google-plus-g"></i
      ></a>
      <a href="#" class="social-nav linkedin"
        ><i class="fab fa-linkedin-in"></i
      ></a>
    </div>
    <span>or use your account</span>
    <input name="email" type="email" placeholder="Email" />
    <input name="password" type="password" placeholder="Password" />
    <a href="#">Forgot your password?</a>
    <button>Log In</button>
  </form>
  <hr />
  <div class="no-account">
    <p>You don't have an account?</p>
    <a href="login.php"><button>Sign up</button></a>
  </div>
</div>
