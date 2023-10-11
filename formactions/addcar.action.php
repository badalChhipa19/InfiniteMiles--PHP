<?php session_start() ?>
<?php include(__DIR__ . "/../functions/functions.php") ?>

<?php
// TODO: Add new Car in DB 
if (isset($_POST['submit__car'])) {
  $model = $_POST['input__model'];
  $number = $_POST['input__number'];
  $capacity = $_POST['input__capacity'];
  $rent = $_POST['input__rent'];
  $agent_id = $_SESSION['id'];

  //? Checking is agent exist (Not neccessary) -> Logout immeditly
  $query_for_fetch_auth = "SELECT id FROM agent WHERE id = '$agent_id'";
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
    $query = "INSERT INTO vehicle(vehiclemodel, vehiclenumber, vehiclecapacity, vehiclerent, agentid) ";
    $query .= " VALUES('$model', '$number', '$capacity', '$rent', '$agent_id')";
    // $query .= " VALUES('Toyota Corolla', 'ABC 123', 5, 50.00, '$agent_id'),
    // ('Ford F-150', 'XYZ 456', 3, 70.00, '$agent_id'),
    // ('Honda Civic', 'DEF 789', 4, 60.00, '$agent_id'),
    // ('Chevrolet Tahoe', 'GHI 101', 7, 90.00, '$agent_id'),
    // ('Volkswagen Golf', 'JKL 202', 5, 55.00, '$agent_id'),
    // ('Nissan Altima', 'MNO 303', 4, 65.00, '$agent_id'),
    // ('Jeep Wrangler', 'PQR 404', 4, 75.00, '$agent_id'),
    // ('BMW X5', 'STU 505', 5, 100.00, '$agent_id'),
    // ('Audi Q7', 'VWX 606', 6, 110.00, '$agent_id'),
    // ('Mercedes-Benz E-Class', 'YZA 707', 5, 95.00, '$agent_id'),
    // ('Hyundai Sonata', 'BCD 808', 4, 45.00, '$agent_id'),
    // ('Kia Sportage', 'EFG 909', 5, 55.00, '$agent_id'),
    // ('Subaru Outback', 'HIJ 010', 5, 60.00, '$agent_id'),
    // ('Lexus RX', 'KLM 111', 5, 85.00, '$agent_id'),
    // ('Mazda CX-5', 'NOP 212', 5, 55.00, '$agent_id'),
    // ('Chevrolet Camaro', 'QRS 313', 2, 80.00, '$agent_id'),
    // ('Dodge Charger', 'TUV 414', 4, 70.00, '$agent_id'),
    // ('Ford Explorer', 'WXY 515', 6, 75.00, '$agent_id'),
    // ('Jeep Grand Cherokee', 'ZAB 616', 5, 90.00, '$agent_id'),
    // ('Honda CR-V', 'CDE 717', 5, 65.00, '$agent_id')";
    $result = result($query);
    alert('Vehicle added.', '/cars/admin');
  }
}
?>