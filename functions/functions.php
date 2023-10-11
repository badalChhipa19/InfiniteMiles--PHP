<?php include "connect.db.php" ?>
<?php
function checkError($result)
{
  if (!$result) {
    echo "error in result[$result]";
  }
}

function escap($str)
{
  global $connect;
  return mysqli_real_escape_string($connect, trim($str));
}

function locate($location)
{
  return header("Location: $location");
}

function alert($message, $lo = '#')
{
  echo "<script>alert(`$message`)</script>";
  echo "<script>window.location.href='$lo'</script>";
  return;
}

function result($query)
{
  global $connect;
  $result = mysqli_query($connect, $query);
  checkError($result);
  return $result;
}