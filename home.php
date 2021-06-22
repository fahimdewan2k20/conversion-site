<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conversion Site - Home</title>
  </head>
  <body>

    <?php
      require 'functions.php';

      $input = "";
      $result = "";
      $selection = 0;

      if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $selection = input($_POST['selection']);
        echo "<h2>" . $selection . "</h2>";

        session_start();
        $_SESSION['selection'] = $selection;
        if(!isset($_SESSION['history'])) {
          $_SESSION["history"] = " ," . $input . "," . $result;
        }
        else {
          $_SESSION["history"] = $_SESSION["history"] . "\n" . " ," . $input . "," . $result;
        }
      }
    ?>

    <h3>Page 1 [Home]</h3>
    <?php require 'menu.html'; ?>
    <h4>Converter: </h4>
    <br>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="off">

      <select name="selection">

      <?php
        $readData = read();
        $arr1 = json_decode($readData);
        session_start();

        for($i = 0; $i < count($arr1); $i++) {
          $decode = $arr1[$i];
          $str1 = $str2 = "";

          if(isset($_SESSION["selection"])) {
            if($decode->from === $_SESSION['selection']) {
              $str1 = "selected";
            }
            if($decode->to === $_SESSION['selection']) {
              $str2 = "selected";
            }
          }
          else {
            $str1 = $decode->from;
          }

          echo "<option value=" . $decode->from . " " . $str1 . ">" . $decode->from . " to " . $decode->to . "</option>";
          echo "<option value=" . $decode->to . " " . $str2 . ">" . $decode->to . " to " . $decode->from . "</option>";
        }
      ?>

      </select>
      <br><br>
      <label for="value">Value: </label>
      <input type="number" name="value" value="<?php echo $input; ?>">
      <br><br>
      <button type="submit">Confirm</button>
    </form>
    <br>
    <label for="result">Result: </label>
    <input type="number" name="result" value="<?php echo $result; ?>" disabled>
  </body>
</html>
