<?php

session_start();
require_once('../include/connect.php');

$connection = new Connection();
$_SESSION['users'] = $connection->getAllData(
    "SELECT * FROM `users`"
);

header("Location: ../static/main/seach.php");