<?php
//TODO: Getting vehicles count
$query_for_count = "SELECT * FROM vehicle";
$result_for_count = result($query_for_count);
$count = mysqli_num_rows($result_for_count);

$pageCount = ceil($count / 5);
if (isset($_GET['page'])) {
  $limit = $_GET['page'];
} else {
  $limit = '';
}

if ($limit == '' || $limit == '1') {
  $pageStart = 0;
} else {
  $pageStart = ($limit * 5) - 5;
}
// TODO: Getting vehicles from DB
$query = "SELECT * FROM vehicle LIMIT $pageStart, 5";
$result = result($query);

?>
<section class="section cards">
  <!--//TODO: Top section of the Main page  -->
  <div class="cards__heading_box">
    <div class='card__heading'>
      <h1 class="heading__primary">Book Your Ride</h1>
      <p class="heading__paragraph">Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et
        velit interdum, ac aliquet odio mattis.</p>
    </div>
  </div>

  <div class="cards__membership">
    <img src="" alt="">
    <div class="membership__content">
      <div></div>
      <h2 class="heading__secondary">Subscribe Now</h2>
      <p class="membership__paragraph">Join the Drive Club and Unlock Exclusive Benefits! Subscribe to Our Membership
        Today!</p>
    </div>
  </div>


</section>

<script>
  // Get the current date in the format yyyy-mm-dd
  const today = new Date().toISOString().split('T')[0];

  // Set the default value of the date input to today
  document.querySelectorAll('#dateInput').forEach(el => el.value = today)
</script>