<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php session_start() ?>
<?php
//TODO: SignIn function
if (isset($_POST['submit__signin'])) {
  $identity = escap($_POST['signin__name']);
  $password = escap($_POST['signin__password']);
  $role = escap($_POST['select__signin_role']);
  $table = $role;

  $query = "SELECT * FROM $table WHERE useremail = '$identity' OR usermobile = '$identity'";
  $result = result($query);

  if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
      $db_id = $row['id'];
      $db_name = $row['username'];
      $db_password = $row['userpassword'];
      if ($db_password == $password) {
        $_SESSION['username'] = $db_name;
        $_SESSION['id'] = $db_id;
        $_SESSION['role'] = $role;
        locate('/cars/');
      } else {
        alert("Wrong Password.", '/cars/authentication');
      }
    }
  } else {
    alert("User doesn't exist. Register now.", '/cars/authentication');
  }
}