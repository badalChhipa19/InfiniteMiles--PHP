<?php
$connect = mysqli_connect('localhost', 'root', '', 'cars');

if (!$connect): ?>
  <script>
    alert('Database connectivity failed.');
  </script>

<?php endif; ?>