<?php

session_start();
require_once('../logic/user.php');
require_once('../include/connect.php');

$user = new UserAuth(
    $_POST['username'],
    $_POST['password']
);

$connection = new Connection();
$response = $connection->getFirstData(
    "SELECT * FROM `users` WHERE username = ?",
    [$user->getUsername()]
);

if (!password_verify($user->getPassword(), $response['password'])) {
    $_SESSION['error'] = 'Неправильный логин или пароль';
    header("Location: /static/login.php");
    die;
}

$_SESSION['data'] = $response;
header("Location: /static/main/main.php");