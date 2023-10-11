<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php session_start() ?>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'agency') {
  alert('Login as customer to book a ride.', "/cars/");
} else if (!isset($_SESSION['role'])) {
  alert('Login as customer to book a ride.', "/cars/authentication");
} else {
  if (isset($_POST['book_car'])) {
    $model = $_POST['model'];
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $rent = $_POST['rent'];
    $days = $_POST['days'];
    $date = $_POST['date'];
    $agency = $_POST['agency'];
    $customer = $_SESSION['id'];
    $name = $_SESSION['username'];

    $query = "INSERT INTO bookings(vehiclemodel, vehiclenumber, vehiclecapacity, vehiclerent, agencyid, date, day, customerid, customername) VALUES('$model', '$number', '$capacity', '$rent', '$agency', '$date', '$days', '$customer', '$name')";
    $result = result($query);

    alert('Booking confirmed.', '/cars/booking');
  }
}