<?php
include 'fee.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fare Table</title>
</head>
<body>
  <h1>Entrance Fee</h1>
     <form method="post">
      <label for="age" class="form-control">Age</label>
      <input type="number" name="age" placeholder="Enter your age">
      <input type="submit" name="btn_submit">
     </form>

     <?php
     if(isset($_POST['btn_submit'])){
      $age = $_POST['age'];

      $fee = new Fee;
      $fee ->setAge($age);
      $fee -> computeFee();

      echo "The fee is ".$fee->computeFee()."$";

     }

     ?>
  
</body>
</html>