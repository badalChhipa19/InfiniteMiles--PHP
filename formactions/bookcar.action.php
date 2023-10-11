<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php session_start() ?>
<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'agent') {
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
    $agent = $_POST['agent'];
    $customer = $_SESSION['id'];
    $name = $_SESSION['username'];

    $query = "INSERT INTO bookings(vehiclemodel, vehiclenumber, vehiclecapacity, vehiclerent, agentid, date, day, customerid, customername) VALUES('$model', '$number', '$capacity', '$rent', '$days', '$date', '$agent', '$customer', '$name')";
    $result = result($query);

    alert('Booking confirmed.', '/cars/booking');
  }
}