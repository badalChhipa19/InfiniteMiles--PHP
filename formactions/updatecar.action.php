<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php session_start() ?>
<?php

if (isset($_POST['submit__car'])) {

  $model = $_POST['input__model'];
  $number = $_POST['input__number'];
  $capacity = $_POST['input__capacity'];
  $rent = $_POST['input__rent'];
  $product_id = $_GET['edit'];

  $query = "UPDATE vehicle SET vehiclemodel='$model',vehiclenumber='$number',vehiclecapacity='$capacity',vehiclerent='$rent' WHERE id = '$product_id'";
  $result = result($query);
  alert('Update successfull.', '/cars/admin');
}