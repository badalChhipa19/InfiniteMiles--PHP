<?php session_start() ?>
<?php include(__DIR__ . "/../functions/functions.php") ?>

<?php
// TODO: Add new Car in DB 
if (isset($_POST['submit__car'])) {
  $model = $_POST['input__model'];
  $number = $_POST['input__number'];
  $capacity = $_POST['input__capacity'];
  $rent = $_POST['input__rent'];
  $agency_id = $_SESSION['id'];

  //? Checking is agency exist (Not neccessary) -> Logout immeditly
  $query_for_fetch_auth = "SELECT id FROM agency WHERE id = '$agency_id'";
  $result_for_fetch_auth = result($query_for_fetch_auth);
  if (mysqli_num_rows($result_for_fetch_auth) < 1) {
    alert('Illegal activity.', '/cars/formactions/logout.action.php');
  }

  //? Check if same number
  $query_for_fetch = "SELECT * FROM vehicle WHERE vehiclenumber = '$number'";
  $result_for_fetch = result($query_for_fetch);

  if (mysqli_num_rows($result_for_fetch) > 0) {
    echo 'In..';
    alert('Car alredy registered.', '/cars/addcar');
  } else {
    echo 'In';
    //? If no match found then add one
    $query = "INSERT INTO vehicle(vehiclemodel, vehiclenumber, vehiclecapacity, vehiclerent, agencyid) ";
    $query .= " VALUES('$model', '$number', '$capacity', '$rent', '$agency_id')";
    // $query .= " VALUES('Toyota Corolla', 'ABC 123', 5, 50.00, '$agency_id'),
    // ('Ford F-150', 'XYZ 456', 3, 70.00, '$agency_id'),
    // ('Honda Civic', 'DEF 789', 4, 60.00, '$agency_id'),
    // ('Chevrolet Tahoe', 'GHI 101', 7, 90.00, '$agency_id'),
    // ('Volkswagen Golf', 'JKL 202', 5, 55.00, '$agency_id'),
    // ('Nissan Altima', 'MNO 303', 4, 65.00, '$agency_id'),
    // ('Jeep Wrangler', 'PQR 404', 4, 75.00, '$agency_id'),
    // ('BMW X5', 'STU 505', 5, 100.00, '$agency_id'),
    // ('Audi Q7', 'VWX 606', 6, 110.00, '$agency_id'),
    // ('Mercedes-Benz E-Class', 'YZA 707', 5, 95.00, '$agency_id'),
    // ('Hyundai Sonata', 'BCD 808', 4, 45.00, '$agency_id'),
    // ('Kia Sportage', 'EFG 909', 5, 55.00, '$agency_id'),
    // ('Subaru Outback', 'HIJ 010', 5, 60.00, '$agency_id'),
    // ('Lexus RX', 'KLM 111', 5, 85.00, '$agency_id'),
    // ('Mazda CX-5', 'NOP 212', 5, 55.00, '$agency_id'),
    // ('Chevrolet Camaro', 'QRS 313', 2, 80.00, '$agency_id'),
    // ('Dodge Charger', 'TUV 414', 4, 70.00, '$agency_id'),
    // ('Ford Explorer', 'WXY 515', 6, 75.00, '$agency_id'),
    // ('Jeep Grand Cherokee', 'ZAB 616', 5, 90.00, '$agency_id'),
    // ('Honda CR-V', 'CDE 717', 5, 65.00, '$agency_id')";
    $result = result($query);
    alert('Vehicle added.', '/cars/admin');
  }
}
?>