<?php

session_start();
require_once('../include/connect.php');

$user_id = $_SESSION['data']['id'];
$connection = new Connection();

// get all correspondence
$response = $connection->getAllData(
    "SELECT * FROM `correspondence` WHERE user_id = ? OR user_id_with = ?",
    [$user_id, $user_id]
);

if (count($response) == 0) {
    header("Location: ../static/main/correspondence.php");
}

// get all user ids
$ids = [];
$id_corresp = [];
foreach ($response as $corr) {
    $ids[] = $corr['user_id'] == $user_id ? $corr['user_id_with'] : $corr['user_id'];
    $id_corresp[end($ids)] = $corr['id'];
}

// id to first name and last name
$placeholders = implode(', ', array_fill(0, count($ids), '?'));

$data = $connection->getAllData(
    "SELECT id, first_name, last_name FROM `users` WHERE id IN ($placeholders)",
    $ids
);

// set data
foreach ($data as $user) {
    if (array_key_exists($user['id'], $id_corresp)) {
        $_SESSION['corresp'][] = ['id_corresp' => $id_corresp[$user['id']], 
            'first_name' => $user['first_name'], 'last_name' => $user['last_name']];
    }
}

header("Location: ../static/main/correspondence.php");