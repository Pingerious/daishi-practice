<?php

include 'school.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class = "row">
    <div class = "col-6">
      <div class="card w-75 mx-auto mt-5">
        <div class="card-header text-center">
          <h1>Tuition Fee</h1>
        </div>
        <div class="card-body">
          <form method="post">
            <label for="name" class="form-label ">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required><br>
            
            <label for="year_level" class="form-label">Year-Level</label>
            <select name="year-level" class="form-select">
              <option value="1st Year">1st Year</option>
              <option value="2nd Year">2nd Year</option>
              <option value="3rd Year">3rd Year</option>
              <option value="4th Year">4th Year</option>
            </select><br>

            <label for="unit" class="form-label">Unit</label>
            <input type="text" class="form-control" name="unit" required><br>

            <div class="container text-center">
              <input type="radio" name="lab" value="lab" class="form-check-input" required>
              <label for="with_lab">With Lab</label>
              <input type="radio" name="lab" value="no_lab" class="form-check-input" required>
              <label for="No_Lab">No Lab</label>
            </div><br>

            <button type="submit" name="btn_submit" class="btn btn-success d-block mx-auto w-50">Calculate</button>
          </form>
        </div>    
      </div>
    </div>

    <div class="col-6">
      <?php
      if(isset($_POST['btn_submit'])){
        $name = $_POST['name'];
        $year = $_POST['year-level'];
        $unit = $_POST['unit'];
        $lab = $_POST['lab'];

        $school_fee = new School($year, $unit, $lab);

        $total_price = $school_fee->calculateFees();

        echo "<div class ='card w-75 mt-5'>";
        echo "<div class ='card-header fw-bold h3'> School Fee";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<p class ='lead'> Name: ".$name."</p>";
        echo "<p class ='lead'>Year: ".$year."</p>";
        echo "<p class ='lead'>Number of Unit(s): ".$unit."</p>";
        echo "<p class ='lead'>Total Fee: ".$total_price."</p>";
        echo "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </div>
</body>
</html>

