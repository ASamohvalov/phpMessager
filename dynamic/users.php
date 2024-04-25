<?php

session_start();
require_once('../include/connect.php');

$connection = new Connection();
$_SESSION['users'] = $connection->getAllData(
    "SELECT * FROM `users` WHERE id != ?",
    [$_SESSION['data']['id']]
);

header("Location: ../static/main/search.php");