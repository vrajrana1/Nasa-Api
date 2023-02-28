<?php

require_once __DIR__ . '/vendor/autoload.php';
error_reporting(0);
$data = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = require_once __DIR__ . '/process.php';
}
list ('fastest' => $fastest, 'nearest' => $nearest, 'smallest'=> $smallest, 'largest'=> $largest) = $data;
// var_dump($data);
?>
<html>
  <style>
    table, th, td {
    border: 1px solid black;
    border-radius: 10px;
}
  </style>
  <body>
    <h1>Asteroid Information</h1>
    <form action="" method="POST">
        <label for="start_date">Start Date:</label>
        <input type="text" id="start_date" name="start_date" required>
        
        <label for="end_date">End Date:</label>
        <input type="text" id="end_date" name="end_date" required>

        <input type="submit" value="Submit">
    </form>

    </br></br>
    
    <h2>Fastest Asteroid<h2>
    <table>
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>fastest</th>
      </thead>
      <tbody>
        <td><?php echo $fastest['id']; ?></td>
        <td><?php echo $fastest['name']; ?></td>
        <td><?php echo $fastest['speed']; ?> km/h </td>
      </tbody>
    </table>
    </br></br>

    <h2>Nearest Asteroid<h2>
    <table>
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Nearest</th>
      </thead>
      <tbody>
        <td><?php echo $nearest['id']; ?></td>
        <td><?php echo $nearest['name']; ?></td>
        <td><?php echo $nearest['distance']; ?> km </td>
      </tbody>
    </table>

    </br></br>

    <h2>Smallest Asteroid<h2>
    <table>
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Smallest</th>
      </thead>
      <tbody>
        <td><?php echo $smallest['id']; ?></td>
        <td><?php echo $smallest['name']; ?></td>
        <td><?php echo $smallest['minSize']; ?> km </td>
      </tbody>
    </table>

    </br></br>

    <h2>Largest Asteroid<h2>
    <table>
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Largest</th>
      </thead>
      <tbody>
        <td><?php echo $largest['id']; ?></td>
        <td><?php echo $largest['name']; ?></td>
        <td><?php echo $largest['maxSize']; ?> km </td>
      </tbody>
    </table>
  </body>
</html>
