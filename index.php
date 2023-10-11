<?php session_start(); ?>
<?php include "functions/conditions.php" ?>
<?php include "functions/inputBox.php" ?>
<?php include "functions/button.php" ?>
<?php include "functions/connect.db.php" ?>
<?php include "functions/functions.php" ?>
<?php

if (pageVerification('/cars/'))
  include "views/main.view.php";
elseif (pageVerification('/cars/authentication'))
  include "views/auth.view.php";
elseif (pageVerification('/cars/cart'))
  include "views/cart.view.php";
elseif (pageVerification('/cars/admin'))
  include "views/admin.view.php";
elseif (pageVerification('/cars/booking')) {
  include "views/booking.view.php";
} else
  include "views/4o4.view.php";