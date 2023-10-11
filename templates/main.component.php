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
  <div class="headin__primary_container">
    <h1 class="headin__primary">Choose a ride now</h1>
  </div>
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
        ?>
        <div class="card">
          <div class="card__texts">
            <div class="card__text_box card__text_box-model">
              <p class="card__text card__model">
                <?= $model ?>
              </p>
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

          <form action="" class="rent__car_container">
            <select name="days" class="rent__input_box input_rent" id="select__days">
              <?php for ($i = 1; $i <= 7; $i++): ?>
                <option value="'<?= $i ?>'">
                  <?= $i ?>
                </option>
              <?php endfor; ?>
            </select>
            <hr />
            <div class="rent__input_box">
              <input type="date" class="input_rent" name="" id="">
            </div>
            <div class="rent__input_box">
              <a href="#" type="submit" class="btn btn__book">Rent Car 👉</a>
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
        echo "<li class='pagination__link'><a href='/cars?page={$i}'>{$i}</a></li>";
      }
      ?>
    </ul>
</section>

<link rel="stylesheet" href="public/css/main.style.css">