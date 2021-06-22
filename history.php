<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Conversion Site - Conversion Rate</title>
  </head>
  <body>
    <h3>Page 3 [History]</h3>
    <?php require 'menu.html'; ?>
    <h3>Convertion History</h3>
    <br>
    <style>
      fieldset {
        display: flex;
        justify-content: center;
      }
      table {
        width: 100vw;
      }
      td {
        width: 25%;
        padding: 5px;
        text-align: center;
      }
    </style>
    <fieldset>
      <table>
      <?php
        session_start();
        if (isset($_SESSION["history"])) {
          $j = 1;
          $data = explode(',', $_SESSION["history"]);
          echo "<tr><th>SL.</th><th>Convert</th><th>Input</th><th>Converted</th></tr>";
          for ($i=0; $i < count($data); $i+=3) {
            echo "<tr><td>" . $j++ . "</td><td>" . $data[$i] . "</td><td>" . $data[$i+1] . "</td><td>" . $data[$i+2] . "</td></tr>";
          }
        }
        else {
          echo "<p>no previous histoy</p>";
        }
      ?>
      </table>
    </fieldset>
  </body>
</html>
