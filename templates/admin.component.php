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
        $agent_id = $_SESSION['id'];
        $query = "SELECT * FROM vehicle WHERE agentid = $agent_id";
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
        <div class="heading__box">
          <h1 class="addcar__heading heading__primary">Update</h1>
        </div>
        <form action="formactions/updatecar.action.php?edit=<?= $product_id ?>" class="addcar__form" method='POST'>
          <?php inputBox('label__addcar', 'input__model', 'text', 'input__model', 'Enter veicle model', "'$model'") ?>
          <?php inputBox('label__addcar', 'input__number', 'text', 'input__number', 'Enter veicle number', "'$number'") ?>
          <?php inputBox('label__addcar', 'input__capacity', 'text', 'input__capacity', 'Enter seating capacity', "'$capacity'") ?>
          <?php inputBox('label__addcar', 'input__rent', 'text', 'input__rent', 'Rent per day in $', "'$rent'") ?>
          <?php customButton('div', '#', 'Update', 'button__box', 'button__burgundy', 'submit__car') ?>
        </form>
      <?php else: ?>
        <div class="heading__box">
          <h1 class="addcar__heading heading__primary">Add a vehicle</h1>
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

<link rel="stylesheet" href="public/css/admin.style.css">