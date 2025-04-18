<!DOCTYPE html>
<html lang="sk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/checkout-payment.css">
  <link rel="stylesheet" href="css/checkout-progress.css">
  <title>Adko Petko Market</title>
</head>
<body>


<!--**************** START OF TOP NAVBAR ********************-->
<!-- Horny cierny pruh -->
<div class="top-bar">
  Až 50% zľava na vybrané produkty do konca augusta
</div>

<!-- Horny navbar -->
<nav class="navbar bg-light navbar-light d-flex justify-content-center">
  <div class="container-fluid justify-content-start">
    <a href="#" class="nav-link gender-item strong-active">Muži</a>
    <a href="#" class="nav-link gender-item">Ženy</a>
    <a href="#" class="nav-link gender-item">Deti</a>
  </div>

  <!-- Logo -->
  <div id="name-of-shop">
    <a href="#" class="navbar-brand d-flex align-items-center">
      <img src="images/logo.png" alt="Superobchod" style="height: 40px; margin-right: 5px;">
      <span style="font-size: 24px; font-weight: bold;">Superobchod</span>
    </a>
  </div>
</nav>

<!-- Hlavna navigacia -->
<nav class="navbar navbar-expand-xl bg-light navbar-light">
  <div class="container-fluid justify-content-start">
    <a href="#" class="nav-link category-item"  onclick="window.location.href='index.html'">Novinky</a>
    <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Oblečenie</a>
    <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Topánky</a>
    <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Šport</a>
    <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Streetwear</a>
    <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Doplnky</a>
    <a href="#" class="nav-link category-item" onclick="window.location.href='products-view.html'">Výpredaj</a>

    <!-- tlacidlo na rozbalenie menu -->
    <button class="navbar-toggler ms-auto bg-light" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvas-right-navbar"
            aria-controls="offcanvas-right-navbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- navigacne menu -->
    <div class="collapse navbar-collapse justify-content-end" id="navmenu">
      <ul class="navbar-nav ms-auto d-flex">
        <li class="menu-item d-flex align-items-center search-group">
          <img src="images/lupa.png" alt="lupa" class="navbar-icon">
          <input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
        </li>

        <li class="menu-item active">
          <a class="nav-link" href="shopping_cart.html">
            <img src="images/kosik.png" alt="Košík" class="navbar-icon">
            <span>2 Košík</span>
          </a>
        </li>
        <li class="menu-item">
          <a class="nav-link" href="login-page.html">
            <img src="images/prihlasenie.png" alt="login" class="navbar-icon">
            Prihlásenie
          </a>
        </li>
        <li class="menu-item">
          <a class="nav-link" href="#">
            <img src="images/podpora.png" alt="podpora" class="navbar-icon">
            Podpora
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Offcanvas Menu (slides in from right) Duplikat toho hore-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-right-navbar" aria-labelledby="offcanvas-right-navbar-label">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvas-right-navbar-label">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav ms-auto d-flex">
      <li class="menu-item d-flex align-items-center search-group">
        <img src="images/lupa.png" alt="lupa" class="navbar-icon">
        <input type="text" class="form-control nav-textfield" placeholder="Vyhľadaj">
      </li>
      <li class="menu-item">
        <a class="nav-link" href="shopping_cart.html">
          <img src="images/kosik.png" alt="Košík" class="navbar-icon">
          2 Košík
        </a>
      </li>
      <li class="menu-item">
        <a class="nav-link" href="login-page.html">
          <img src="images/prihlasenie.png" alt="login" class="navbar-icon">
          Prihlásenie
        </a>
      </li>
      <li class="menu-item">
        <a class="nav-link" href="#">
          <img src="images/podpora.png" alt="podpora" class="navbar-icon">
          Podpora
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- ********************************************* END OF NAVBAR  **************************************************-->

<main class="container">
  <section class="summary-card">
  <h1>Zhrnutie objednávky</h1>

  <div class="progress">
    <span class="step">Adresa</span>
    <span class="separator">——————</span>
    <span class="step">Doručenie</span>
    <span class="separator">——————</span>
    <span class="step active">Platba</span>
  </div>

  <form class="payment-form">
    <fieldset>
      <label id="card-holder-name">
        <input type="text" name="cardholder" placeholder="Meno držiteľa karty" required>
      </label>

      <label>
        <input type="text" name="cardnumber" placeholder="Číslo karty" maxlength="19" required>
      </label>

      <div class="row">
        <select name="expiry-month" required>
          <option value="" disabled selected>Mesiac</option>
          <option>01</option><option>02</option><option>03</option>
          <option>04</option><option>05</option><option>06</option>
          <option>07</option><option>08</option><option>09</option>
          <option>10</option><option>11</option><option>12</option>
        </select>

        <select name="expiry-year" required>
          <option value="" disabled selected>Rok</option>
          <option>2025</option><option>2026</option><option>2027</option>
          <option>2028</option>
        </select>

        <input type="text" name="cvc" placeholder="CVC" maxlength="3" required>
      </div>

      <label>
        <input type="email" name="email" placeholder="Email" required>
      </label>
    </fieldset>

    <button id="pay-button" type="submit" >Zaplať</button>
  </form>
  </section>
</main>


<!-- FOOTER -->
<footer>
  &copy; 2025 Made with love from xStefanec & xKazimir
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="javascript-files/navbar.js"></script>

</html>

