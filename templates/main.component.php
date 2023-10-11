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
<section class="section__cards">
  <h1 class="heading__primary heading__primary-big">Book Your Ride</h1>
  <div class="cards__container">
    <?php
    //? Checking If no vehicle avlebal
    if (mysqli_num_rows($result) < 0) {
      echo "<h2 style='font-size: 5rem;'>No car to rent.</h2>";
    } else {
      //? Using loop to create cards
      while ($row = mysqli_fetch_assoc($result)) {
        $model = $row['vehiclemodel'];
        $number = $row['vehiclenumber'];
        $capacity = $row['vehiclecapacity'];
        $rent = $row['vehiclerent'];
        $carid = $row['id'];
        $agency = $row['agencyid'];
        ?>

        <div class="card">
          <div class="card__texts">
            <div class="card__text_box card__text_box-model">
              <h2 class="card__model heading__secondary">
                <?= $model ?>
              </h2>
            </div>
            <div class="card__text_box">
              <p class="card__text card__number">

                <?= $number ?>
              </p>
            </div>
            <div class="card__text_box">
              <p class="card__text card__capacity">
                <?= $capacity ?> Seater
              </p>
            </div>
            <div class="card__text_box">
              <p class="card__text card__rent">$
                <?= $rent ?>/-
              </p>
            </div>
          </div>

          <form action="./formactions/bookcar.action.php" class="rent__car_container" method="POST">
            <hr />
            <select name="days" class="rent__input_box input_rent" id="days">
              <?php for ($i = 1; $i <= 7; $i++):
                if ($i == 1): ?>
                  <option value="<?= $i ?>">
                    <?= $i ?> day
                  </option>
                <?php else: ?>
                  <option value="<?= $i ?>">
                    <?= $i ?> days
                  </option>
                <?php endif; endfor; ?>
            </select>
            <hr />
            <div class="rent__input_box">
              <input type="hidden" name="model" value="<?= $model ?>">
              <input type="hidden" name="number" value="<?= $number ?>">
              <input type="hidden" name="capacity" value="<?= $capacity ?>">
              <input type="hidden" name="rent" value="<?= $rent ?>">
              <input type="hidden" name="agency" value="<?= $agency ?>">
              <input type="date" class="input_rent" name="date" id="dateInput" required>
            </div>
            <div class="rent__input_box">
              <?php
              $query_for_checking = "SELECT * FROM bookings WHERE vehiclenumber = '$number'";
              $result_for_checking = result($query_for_checking);
              $booked = mysqli_num_rows($result_for_checking);
              ?>
              <button class="btn__box <?php if ($booked > 0) {
                echo "btn__booked";
              } ?> " type="submit" name="book_car">
                <p class="btn btn__book">
                  <?php if ($booked > 0) {
                    echo "Booked";
                  } else {
                    echo "Rent Car";
                  } ?>
                </p>
              </button>
            </div>
          </form>
        </div>
        <?php
      }
    }
    ?>
    <ul class="pagination">
      <?php
      for ($i = 1; $i <= $pageCount; $i++) {
        if ($i == $limit) {
          $active = 'active__page';
        } else {
          $active = '';
        }
        echo "<li class='pagination__item'><a class='pagination__link  $active' href='/cars?page={$i}'>{$i}</a></li>";
      }
      ?>
    </ul>
</section>

<script>
  // Get the current date in the format yyyy-mm-dd
  const today = new Date().toISOString().split('T')[0];

  // Set the default value of the date input to today
  document.querySelectorAll('#dateInput').forEach(el => el.value = today)
</script>

<link rel="stylesheet" href="public/css/main.style.css">