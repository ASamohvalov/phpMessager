<?php

session_start();
require_once('../../include/connect.php');

$idThisUser = $_SESSION['data']['id'];
$idUser = $_GET['id'];
$connection = new Connection();

$id_corresp = $connection->getFirstData(
    "SELECT * FROM `correspondence` WHERE (user_id = ? AND user_id_with = ?) OR (user_id = ? AND user_id_with = ?)",
    [$idThisUser, $idUser, $idUser, $idThisUser]
);

if ($id_corresp) {
    $is_read = $id_corresp['user_id'] == $idThisUser ? 'user_is_read' : 'user_with_is_read';
    $connection->setData(
        "UPDATE `correspondence` SET $is_read = ? WHERE id = ?;
        UPDATE `messages` SET is_read = ? WHERE id_correspondence = ? AND id_sender = ?",
        [1, $id_corresp['id'], 1, $id_corresp['id'], $id_corresp[$id_corresp['user_id'] == $idUser ? 'user_id' : 'user_id_with']]
    );

    $response = $connection->getAllData(
        "SELECT * FROM `messages` WHERE id_correspondence = ?",
        [$id_corresp['id']]
    );

    $messages = [];
    foreach ($response as $msg) {
        $status = '';
        if ($msg['id_sender'] == $idThisUser) {
            $status = 'set';
        } else {
            $status = 'get';
        }

        $messages[] = [
            'msg' => $msg['message'],
            'status' => $status,
            'is_read' => $msg['is_read'],
            'send_time' => $msg['send_time']
        ];
    }
    $_SESSION['messages'] = $messages;
} else {
    unset($_SESSION['messages']);
}

$_SESSION['user'] = $connection->getFirstData(
    "SELECT * FROM `users` WHERE id = ?",
    [$idUser]
);

header("Location: ../../static/main/message.php");