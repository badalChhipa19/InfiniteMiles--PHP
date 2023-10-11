<?php $url = $_SERVER['REQUEST_URI'] ?>
<!--//! Navbar Start-->
<nav class="navigation__bar">
  <!--//TODO: Logo-->
  <div class="nav__logo_box" onclick="parent.location='/cars/'">
    <img class="logo__image" src="public/images/main/logo.png" alt="Logo Image">
    <img class="logo__image-1" src="public/images/main/favicon.png" alt="Logo Image">
  </div>

  <!--//TODO: Search box-->
  <?php if (pageVerification('/cars/')): ?>
    <div class="product__searchbox">
      <input class="searchbox" type="search" name="productSearch" id="productSearch">
      <ion-icon class="searchbox__icon" name="search-outline"></ion-icon>
    </div>
  <?php endif ?>

  <!--//TODO: Links for authentication Page-->
  <?php if (pageVerification("/cars/authentication")): ?>
    <ul class="nav__list list__auth">
      <li class="nav__list_item"><a href="#">Membership</a></li>
      <?php customButton("li", '/cars/', 'Book now', 'nav__list_item', "button__blue") ?>
    </ul>

    <!--//TODO: Links for shop Page-->
  <?php elseif (pageVerification("/cars/") || pageVerification("/cars/admin") || pageVerification("/cars/booking")): ?>
    <div class="abstract__container">
      <input type="checkbox" id="abstract__checkbox">
      <label for="abstract__checkbox" class="abstract__nav">
        <li class='abstract__list'>
          <div class="line mid__line"></div>
        </li>
      </label>
      <ul class="nav__list list__shop">
        <?php if (isset($_SESSION['username'])): ?>
          <?php if ($_SESSION['role'] === 'agency' && !pageVerification('/cars/admin')): ?>
            <li class="nav__list_item" style="cursor: pointer;" onclick="location.href='/cars/admin';">Admin</li>
          <?php elseif ($_SESSION['role'] == 'customer' && !pageVerification('/cars/booking')): ?>
            <li class="nav__list_item" style="cursor: pointer;" onclick="location.href='/cars/booking';">My Booking</li>
          <?php elseif (!pageVerification('/cars/')): ?>
            <li class="nav__list_item" style="cursor: pointer;" onclick="location.href='/cars/';">Home</li>
          <?php endif; ?>

          <li class="nav__list_item" style="cursor: pointer;"
            onclick="location.href='/cars/formactions/logout.action.php';">Sign
            out</li>
        <?php else: ?>
          <li class="nav__list_item"><a href="/cars/authentication">Sign-in</a></li>
        <?php endif; ?>
      </ul>
    </div>
  <?php endif ?>
</nav>

<link rel="stylesheet" href="public/css/navigation.style.css">