<?php

session_start();
require_once('../include/connect.php');

$message = $_POST['message'];
$connection = new Connection();

$thisUserId = $_SESSION['data']['id'];
$userId = $_SESSION['user']['id'];

$id_corresp;

// create correspondence
if (!isset($_SESSION['messages'])) {
    $id_corresp = $connection->setDataAndGetId(
        "INSERT INTO `correspondence` (user_id, user_id_with, user_is_read, user_with_is_read) VALUES (?, ?, ?, ?)",
        [$thisUserId, $userId, 1, 0]
    );
} else {
    $data = $connection->getFirstData(
        "SELECT * FROM `correspondence` WHERE (user_id = ? AND user_id_with = ?) OR (user_id = ? AND user_id_with = ?)",
        [$thisUserId, $userId, $userId, $thisUserId]
    );
    $is_read = $data['user_id'] == $userId ? 'user_is_read' : 'user_with_is_read'; 
    $connection->setData(
        "UPDATE `correspondence` SET $is_read = ? WHERE id = ?",
        [0, $data['id']]
    );

    $id_corresp = $data['id'];
}

// set message
$connection->setData(
    "INSERT INTO `messages` (id_sender, id_recipient, id_correspondence, message, is_read) VALUES (?, ?, ?, ?, ?)",
    [$thisUserId, $userId, $id_corresp, $message, 0]
);

header("Location: view/msg.php?id=$userId");