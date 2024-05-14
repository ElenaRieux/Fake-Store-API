
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="img/favicon.png" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <title>Fake Store | Get Now Tech, Jewelry and Clothings</title>
  <meta name="description" content="Explore Trendy Clothes for women and men, Stunning Jewelry, and Cutting-Edge Tech Gadgets.
      Elevate Your Style with Convenient Online Shopping" />
  <meta name="author" content="Elena Rieux" />
  <meta name="keywords" content="online store, ecommerce website,">

</head>

<body>
  <?php
  require_once("include/config_session.php");
  require_once("models/Role.models.php");
  require_once("models/User.models.php");
  require_once("navbar.php");
  
  ?>
  <div class="main">
    <h1>NEW COLLECTION</h1>
    <button>SHOP NOW</button>
  </div>
  <article class="contenuto">
    <div class="container-categorie">
      <a href="#">
        <div class="card">
          <div class="container-foto">
            <img src="img/categoria-donna.jpg" alt="women clothes section" />
          </div>
          <h3>WOMAN</h3>
        </div>
      </a>
      <a href="#">
        <div class="card">
          <div class="container-foto">
            <img src="img/categoria-uomo.jpg" alt="men clothes section" />
          </div>
          <h3>MAN</h3>
        </div>
      </a>
      <a href="#">
        <div class="card">
          <div class="container-foto">
            <img src="img/categoria-gioielli.jpg" alt="jewlery section" />
          </div>
          <h3>JEWELRY</h3>
        </div>
      </a>
      <a href="#">
        <div class="card">
          <div class="container-foto">
            <img src="img/categoria-tech.jpg" alt="tech products section" />
          </div>
          <h3>TECH</h3>
        </div>
      </a>
    </div>
    <div class="container-linea">
      <div class="linea"></div>
      <div class="testo">
        <h2>Discover our latest arrivals</h2>
      </div>
      <div class="linea"></div>
    </div>
    <!-- <select id="filter-options">
      <option value="all">Tutti</option>
      <option value="clothing">Abbigliamento</option>
      <option value="jewelry">Gioielli</option>
      <option value="tech">Tecnologia</option>
    </select> -->
    <div class="container-prodotti"></div>
    <div class="all-products"><a href="#">View all products</a></div>
  </article>
  <section class="banner">
    <h4>April Discounts</h4>
    <h3>Save up to <span>70% Off</span> - All t-shirts & Accessories</h3>
    <button>Save now</button>
  </section>

  <section class="container-form">
    <form method="POST" id="contact-form">
      <span>CONTACT US</span>
      <h3>We'd love to hear from you</h3>
      <input name="name" type="text" placeholder="Your Name" required />
      <input name="email" type="email" placeholder="Your Email" required />
      <input name="subject" type="text" placeholder="Subject" required />
      <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
      <div id="conferma" style="display: none">
        <p></p>
      </div>
      <div class="submit-button">
        <button class="sub-button" type="submit">Send your message</button>
        <img class="img-form" style="display: none" src="img/Spinner@1x-1.0s-200px-200px.gif" alt="loading" />
      </div>
    </form>
  </section>

  <div class="confirm">
    <p></p>
  </div>

  <?php
  require_once("footer.html");
  ?>

  <script src="script.js"></script>
</body>

</html>