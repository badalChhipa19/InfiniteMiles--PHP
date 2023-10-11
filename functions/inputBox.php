<?php
function inputBox($labelClass, $inputId, $inputType, $inputClass, $placeholder, $value = '')
{
  ?>
  <div class="input__box">
    <input type="<?= $inputType ?>" class="input <?= $inputClass ?>" id="<?= $inputId ?>" name="<?= $inputId ?>"
      placeholder="<?= $placeholder ?>" required value=<?= $value ?>>
    <label class="label <?= $labelClass ?>" for="<?= $inputId ?>">
      <?= $placeholder ?>
    </label>
  </div>
  <link rel="stylesheet" href="public/css/inputBox.style.css">
  <?php
}