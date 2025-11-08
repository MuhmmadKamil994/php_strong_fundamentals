<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session </title>
</head>
<body>
  <?php
  if(isset($_SESSION['favcolor'])){
  echo "Favourite Color:". $_SESSION["favcolor"];
  }
  ?>
</body>
</html>
