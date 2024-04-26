<?php

session_start();
require_once('../../include/connect.php');

$connection = new Connection();
$_SESSION['user'] = $connection->getFirstData(
    "SELECT * FROM `users` WHERE id = ?",
    [$_GET['id']]
);

header("Location: ../../static/main/uspage.php");