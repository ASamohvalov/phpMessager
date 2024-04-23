<?php

session_start();
require_once('../logic/user.php');
require_once('../include/connect.php');

$user = new UserReg(
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['username'],
    $_POST['password'],
    $_POST['repeat_password']
);

// validate 
$errors = $user->getErrors();
if ($errors !== []) {
    $_SESSION['error'] = $errors;
    header("Location: /static/register.php");
    die;
}

// check username 
$connection = new Connection();

$response = $connection->getData("SELECT * FROM `users` WHERE username = ?", [$user->getUsername()]);

if ($response) {
    $_SESSION['error']['username'] = 'Имя пользователя уже занято';
    header("Location: /static/register.php");
    die;
}

// registration
$response = $connection->setData(
    "INSERT INTO `users` (first_name, last_name, username, password) VALUES (?, ?, ?, ?)",
    [$user->getFirstName(), $user->getLastName(), $user->getUsername(), $user->getPassword()]
);

$_SESSION['success'] = 'Пользователь успешно зарегистрирован';

header("Location: /static/login.php");
