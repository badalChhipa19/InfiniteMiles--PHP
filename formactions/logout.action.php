<?php session_start(); ?>
<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php
// session_reset();
// session_destroy();
$_SESSION['username'] = null;
$_SESSION['role'] = null;
locate('/cars/authentication');