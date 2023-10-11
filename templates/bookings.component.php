<?php
if (isset($_POST['booking_cancel'])) {
  $id = $_POST['id'];
  $query = "DELETE FROM bookings WHERE id = '$id'";
  $result = result($query);
  alert('Tour Cancle.');
}

// TODO: Getting booked vehicles from DB 
$id = $_SESSION['id'];
$query = "SELECT * FROM bookings WHERE customerid = '$id'";
$result = result($query);

if (mysqli_num_rows($result) > 0):
  ?>

  <section class="section__booking">
    <section class="section__cards">
      <h1 class="heading__primary heading__primary-big">My Bookings</h1>
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
            $days = $row['day'];
            $date = $row['date'];
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
                  <p class="card__text card__rent">Total: $
                    <?= $rent * $days ?>/-
                  </p>
                </div>
                <div class="card__text_box">
                  <p class="card__text card__days">
                    <?php echo $days == 1 ? "$days day" : "$days days"; ?>
                  </p>
                </div>
                <div class="card__text_box">
                  <p class="card__text card__date"> Booking Date:
                    <?= $date ?>
                  </p>
                </div>
              </div>

              <form action="#" class="rent__car_container" method="POST">
                <div class="rent__input_box">

                  <input type="hidden" name="id" value="<?= $carid ?>">
                </div>
                <div class="rent__input_box">
                  <button class="btn__box  " type="submit" name="booking_cancel">
                    <p class="btn btn__book">Cancel</p>
                  </button>
                </div>
              </form>
            </div>
            <?php
          }
        }
        ?>
    </section>

    <link rel="stylesheet" href="public/css/main.style.css">
    <link rel="stylesheet" href="public/css/booking.style.css">
    <?php
else:
  alert('No Booking Yet! Book now', '/cars/');
endif;
?>