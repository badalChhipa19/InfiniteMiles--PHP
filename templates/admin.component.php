<?php
if (isset($_SESSION) && $_SESSION['role'] === 'agency'):
  ?>
  <section class='section__addcars'>
    <div class="heading__box">
      <h1 class="heading__primary heading__primary-big">Wellcome Admin - <span style="font-size: 3.6rem;">
          <?= $_SESSION['username'] ?>
        </span></h1>
    </div>
    <div class="cars__container">
      <div class="mycars">
        <table class='cars__table'>
          <thead>
            <tr class='cars__row'>
              <th class="table__heading">Sr. no.</th>
              <th class="table__heading">Model</th>
              <th class="table__heading">Number</th>
              <th class="table__heading">capacity</th>
              <th class="table__heading">rent/day</th>
            </tr>
          </thead>
          <!--//TODO: Getting data form server-->
          <?php

          $agency_id = $_SESSION['id'];
          $query = "SELECT * FROM vehicle WHERE agencyid = $agency_id";
          $result = result($query);
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)): ?>
            <tbody>
              <tr class='cars__row'>
                <td class="table__data">
                  <?= ++$count ?>
                </td>
                <td class="table__data">
                  <?= $row['vehiclemodel'] ?>
                </td>
                <td class="table__data">
                  <?= $row['vehiclenumber'] ?>
                </td>
                <td class="table__data">
                  <?= $row['vehiclecapacity'] ?>
                </td>
                <td class="table__data">$
                  <?= $row['vehiclerent'] ?>
                  /-
                </td>
                <td class="table__data">
                  <a href="?edit=<?= $row['id'] ?>">
                    <?php customButton('div', '#', 'Edit', 'delete__btn_box', 'button__burgundy') ?>
                  </a>
                </td>
                <td class="table__data">
                  <a href="/cars/formactions/deletecar.action.php?delete=<?= $row['id'] ?>">
                    <?php customButton('div', '#', 'Delete', 'delete__btn_box', 'button__blue') ?>
                  </a>
                </td>
              </tr>
            </tbody>
          <?php endwhile; ?>
        </table>

        <?php
        $query_for_car_booked = "SELECT * FROM bookings WHERE agencyid = '$agency_id'";
        $result_for_car_booked = result($query_for_car_booked);
        if (mysqli_num_rows($result_for_car_booked) > 0):
          ?>
          <table class="cars__table">
            <h1 class='heading__secondary' style="margin-top: 3rem;">Booked Cars Data</h1>
            <thead>
              <tr>
                <th class="table__heading">sr. no.</th>
                <th class="table__heading">Model</th>
                <th class="table__heading">Booked By</th>
                <th class="table__heading">Booking Date</th>
                <th class="table__heading">Days</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count2 = 0;
              while ($row = mysqli_fetch_assoc($result_for_car_booked)):
                $model = $row['vehiclemodel'];
                $name = $row['customername'];
                $date = $row['date'];
                $days = $row['day'];
                ?>
                <tr>
                  <td class="table__data">
                    <?= ++$count2 ?>
                  </td>
                  <td class="table__data">
                    <?= $model ?>
                  </td>
                  <td class="table__data">
                    <?= $name ?>
                  </td>
                  <td class="table__data">
                    <?= $date ?>
                  </td>
                  <td class="table__data">
                    <?= $days ?> Day
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php endif; ?>

        <?php
        if (isset($_GET['edit'])) {
          $product_id = $_GET['edit'];
          $query_for_edit = "SELECT * FROM vehicle WHERE id = '$product_id'";
          $result_for_edit = result($query_for_edit);
          $row = mysqli_fetch_assoc($result_for_edit);
          $model = $row['vehiclemodel'];
          $number = $row['vehiclenumber'];
          $capacity = $row['vehiclecapacity'];
          $rent = $row['vehiclerent'];
        }
        ?>
      </div>
      <div class="form__container">
        <?php if (isset($_GET['edit'])): ?>
          <h3 class="heading__tertiary" style="text-align: left;">Update</h3>
          <form action="formactions/updatecar.action.php?edit=<?= $product_id ?>" class="addcar__form" method='POST'>
            <?php inputBox('label__addcar', 'input__model', 'text', 'input__model', 'Enter veicle model', "'$model'") ?>
            <?php inputBox('label__addcar', 'input__number', 'text', 'input__number', 'Enter veicle number', "'$number'") ?>
            <?php inputBox('label__addcar', 'input__capacity', 'text', 'input__capacity', 'Enter seating capacity', "'$capacity'") ?>
            <?php inputBox('label__addcar', 'input__rent', 'text', 'input__rent', 'Rent per day in $', "'$rent'") ?>
            <div class="btn__box">
              <?php customButton('div', '#', 'Update', 'button__box', 'button__burgundy', 'submit__car') ?>
            </div>
          </form>
        <?php else: ?>
          <div class="heading__box">
            <h1 class="heading__tertiary" style="text-align: left;">Add a vehicle</h1>
          </div>
          <form action="formactions/addcar.action.php" class="addcar__form" method='POST'>
            <?php inputBox('label__addcar', 'input__model', 'text', 'input__model', 'Enter veicle model') ?>
            <?php inputBox('label__addcar', 'input__number', 'text', 'input__number', 'Enter veicle number') ?>
            <?php inputBox('label__addcar', 'input__capacity', 'text', 'input__capacity', 'Enter seating capacity') ?>
            <?php inputBox('label__addcar', 'input__rent', 'text', 'input__rent', 'Rent per day in $') ?>
            <?php customButton('div', '#', 'Add Now', 'button__box', 'button__burgundy', 'submit__car') ?>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php else:
  locate('/cars/');
endif; ?>