<?php
include "../classes/user.php";

$user = new User;
$user -> login($_POST);