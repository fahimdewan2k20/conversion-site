<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conversion Site - Conversion Rate</title>
  </head>
  <body>
    <?php
      require 'functions.php';
    ?>
    <h3>Page 2 [Conversion Rate]</h3>
    <?php require 'menu.html'; ?>
    <h3>Conversion Rate: </h3>

    <?php
      $readData = read();
      $arr1 = json_decode($readData);

      for($i = 0; $i < count($arr1); $i++) {
        $decode = $arr1[$i];
        echo "<label>" . $decode->from . ' to ' . $decode->to . ": </label>";
        echo "<input value='1' disabled></input>";
        echo "<input value=" . $decode->value . " disabled></input>";
        echo "<br>";
        echo "<label>" . $decode->to . ' to ' . $decode->from . ": </label>";
        echo "<input value='1' disabled></input>";
        echo "<input value=" . 1/$decode->value . " disabled></input>";
        echo "<br>";
      }
    ?>
  </body>
</html>
