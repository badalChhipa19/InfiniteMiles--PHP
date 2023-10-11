<?php
function customButton($parentTagName, $location, $content, $parentClass, $buttonType = '', $name = '', $value = '')
{
  ?>

  <<?= $parentTagName ?> class="button__container
    <?= $parentClass ?> ">
    <button class="button <?= $buttonType ?>" data-set="<?= $content ?>" onclick="parent.location = '<?= $location ?>'"
      name='<?= $name ?>' value='<?= $value ?>'>
      <?= $content ?>
    </button>
  </<?= $parentTagName ?>>
  <link rel="stylesheet" href="public/css/button.style.css">

  <?php
}
?>