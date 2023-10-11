<?php include(__DIR__ . "/../functions/functions.php") ?>
<?php session_start() ?>
<?php
if (isset($_GET['delete'])) {
  $product_id = $_GET['delete'];
  $query_for_delete = "DELETE FROM vehicle WHERE id ='$product_id'";
  $result_for_delete = result($query_for_delete);
  alert('vehicle deleted', '/cars/admin');
}