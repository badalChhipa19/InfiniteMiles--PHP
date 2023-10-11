<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php
//TODO: Signup function
if (isset($_POST['submit__signup'])) {
  //? Walues from signup form
  $name = escap($_POST['signup__name']);
  $email = escap($_POST['signup__email']);
  $mobile = escap($_POST['signup__mobile']);
  $password = escap($_POST['signup__password']);
  $cPassword = escap($_POST['signup__cPassword']);
  $role = escap($_POST['select__signup_role']);
  $date = date("l, d-M-y H:i:s T");
  $table = $role;

  //? checking if any error with password and storing
  $error = [
    'password' => ''
  ];

  if ($cPassword !== $password) {
    $error['password'] = 'Password and confirm password are not same.';
  } else if (strlen($password) < 6 || strlen($password) > 16) {
    $error['password'] = 'Password length must be in range of 6 to 16 characters.';
  }

  //? checking if there is no error counters in error array then procced
  if (empty(array_filter($error))) {
    //? Fetch query for checking emails and mobile numbers
    $query_for_fetch = "SELECT useremail, usermobile FROM $table WHERE useremail = '$email' AND usermobile = '$mobile'";
    $result_for_fetch = result($query_for_fetch);

    if (mysqli_num_rows($result_for_fetch) > 0) {
      alert('User exist.', '/cars/authentication');
    } else {
      //? Query for inserting data in DB
      $query = "INSERT INTO $table(username, useremail, usermobile, userpassword, date)";
      $query .= " VALUE('$name', '$email', '$mobile', '$password', '$date')";
      $result = result($query);
      checkError($result);
      alert('Registration Successful.', '/cars/authentication');
    }
  } else {
    alert($error['password'], '/cars/authentication');
  }
}