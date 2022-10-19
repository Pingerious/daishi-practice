<?php
include 'Employee.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>
</head>
<body>
  <div class = "row">
    <div class = "col-6">
      <div class="card w-75 mx-auto mt-5">
        <div class="card-header text-center">
          <h1>Salary Calculator</h1>
        </div>
        <div class="card-body">
          <form method="post">
            <label for="name" class="form-label ">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Employee name" required><br>
            
            <label for="civilStatus" class="form-label">Civil Status</label>
            <select name="civilStatus" class="form-select">
              <option value="" hidden selected>SELECT CIVIL STATUS</option>
              <option value="Single">Single</option>
              <option value="Married">Married</option>
            </select><br>

            <label for="empStatus" class="form-label">Employment Status</label>
            <select name="empStatus" class="form-select">
              <option value="" hidden selected>SELECT EMPLOYMENT STATUS</option>
              <option value="Contractual">Contractual</option>
              <option value="Probationary">Probationary</option>
              <option value="Regular">Regular</option>
            </select><br>

            <label for="companyPosition" class="form-label">Company Position</label>
            <select name="companyPosition" class="form-select">
              <option value="" hidden selected>SELECT COMPANY POSITION</option>
              <option value="Staff">Staff</option>
              <option value="Admin">Admin</option>
            </select><br>

            <label for="hoursRendered" class="form-label">Hours Rendered</label>
            <input type="number" class="form-control" name="hoursRendered" required><br>

            <button type="submit" name="btn_submit" class="btn btn-success d-block mx-auto w-50">Calculate</button>
          </form>
        </div>    
      </div>
    </div>

    <div class="col-6">
      <?php
      if(isset($_POST['btn_submit'])){
        $civil_status = $_POST['civilStatus'];
        $name = $_POST['name'];
        $emp_status = $_POST['empStatus'];
        $position = $_POST['companyPosition'];
        $hours = $_POST['hoursRendered'];
        
        $netIncome = new Employee($civil_status, $emp_status, $position, $hours);


        echo "<div class ='card w-75 mt-5'>";
        echo "<div class ='card-header fw-bold h3'> Payment for a Worker";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<p class ='lead'> Name: ".$name."</p>";
        echo "<p class ='lead'>Civil Status: ".$civil_status."</p>";
        echo "<p class ='lead'>Employment Status: ".$emp_status."</p>";
        echo "<p class ='lead'>Company Position: ".$position."</p>";
        echo "<p class ='lead'>Hours Rendered: ".$hours."</p>";
        echo "<p class ='lead'>Total Payment: ".$netIncome->calculateGrossPay()."</p>";
        echo "<p class ='lead'>Taxed Payment: ".$netIncome->getTaxableIncome()."</p>";
        
        echo "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </div>
</body>
</html>
