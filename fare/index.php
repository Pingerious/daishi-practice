<?php

include 'fare.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compute Fare</title>
</head>
<body>
  <h1> Compute Fare </h1>
  <form method="post">
    <label for = "distance" class="form-control">Distance</label>
    <input type = "number" name="distance" placeholder="Enter the distance"><br>
    <label for = "age" class= "form-control">Age</label>
    <input type = "number" name = "age" placeholder="Enter your age">
    <input type = "submit" name="btn_submit">
  </form>

  <?php
  if(isset($_POST['btn_submit'])){
    $distance = $_POST['distance'];
    $age = $_POST['age'];
    
    $fare = new Fare;
    $fare->setDistance($distance);
    $fare->setAge($age);
    $fare->computeFare();

    echo "The fare is ". $fare->computeFare()."$";
  }

    ?>

</body>
</html>