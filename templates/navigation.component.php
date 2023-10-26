<?php $url = $_SERVER['REQUEST_URI'] ?>
<!--//! Navbar Start-->
<div class="navigation">
  <nav class="navigation__bar">
    <!--//TODO: Logo-->
  <div class="logo" onclick="parent.location='/cars/'">
    <img class="logo__image" src="public/images/logo.png" alt="Logo Image">
    <img class="logo__image_small" src="public/images/favicon.png" alt="Logo Image">
  </div>

  <!--//TODO: Links for authentication Page-->
  <?php if (pageVerification("/cars/authentication")): ?>
    <ul class="nav__list list__auth">
      <li class="nav__list_item"><a href="#">Membership</a></li>
      <?php customButton("li", '/cars/', 'Book now', 'nav__list_item', "button__blue") ?>
    </ul>

    <!--//TODO: Links for shop Page-->
  <?php elseif (pageVerification("/cars/") || pageVerification("/cars/admin") || pageVerification("/cars/booking")): ?>
    <div class="links">
      <input type="checkbox" id="abstract__checkbox">
      <label for="abstract__checkbox" class="links__menu">
        <li class='abstract__list'>
          <div class="line mid__line"></div>
        </li>
      </label>

      <ul class="links__list links__shop">
        <?php if (isset($_SESSION['username'])): ?>
          <?php if ($_SESSION['role'] === 'agency' && !pageVerification('/cars/admin')): ?>
            <li class="links__item" style="cursor: pointer;" onclick="location.href='/cars/admin';">Admin</li>
          <?php elseif ($_SESSION['role'] == 'customer' && !pageVerification('/cars/booking')): ?>
            <li class="links__item" style="cursor: pointer;" onclick="location.href='/cars/booking';">My Booking</li>
          <?php elseif (!pageVerification('/cars/')): ?>
            <li class="links__item" style="cursor: pointer;" onclick="location.href='/cars/';">Home</li>
          <?php endif; ?>

          <li class="links__item" style="cursor: pointer;"
            onclick="location.href='/cars/formactions/logout.action.php';">Sign
            out</li>
        <?php else: ?>
          <li class="links__item"><a href="/cars/authentication">Sign-in</a></li>
        <?php endif; ?>
      </ul>
    </div>
  <?php endif ?>
  </nav>
</div>
