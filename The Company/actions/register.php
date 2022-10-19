<?php

include "../classes/user.php";

$user = new User;
$user->store($_POST);
