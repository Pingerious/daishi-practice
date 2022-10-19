<?php
session_start();

include "../classes/user.php";

$user = new User;
$user_details = $user->getUser($_GET['user_id']);
$full_name = $user_details['first_name'] . " " . $user_details['last_name'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/8f1b3de5ef.js" crossorigin="anonymous"></script>
   
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION['username'] ?></a></li>
                    <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container" style="padding-top: 80px">
        <div class="card w-25 mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h2 class="text-center text-danger">DELETE USER</h2>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                    <p class="fw-bold mb-0">Are you sure you want to delete "<?= $full_name ?>"?</p>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="dashboard.php" class="btn btn-secondary w-100">Cancel</a>
                    </div>
                    <div class="col">
                        <a href="../actions/delete-user.php?user_id=<?= $user_details['user_id'] ?>" class="btn btn-outline-danger w-100">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>