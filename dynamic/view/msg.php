<?php

session_start();
require_once('../../include/connect.php');

$idThisUser = $_SESSION['data']['id'];
$idUser = $_GET['id'];
$connection = new Connection();

$id_corresp = $connection->getFirstData(
    "SELECT id FROM `correspondence` WHERE (user_id = ? AND user_id_with = ?) OR (user_id = ? AND user_id_with = ?)",
    [$idThisUser, $idUser, $idUser, $idThisUser]
);

if ($id_corresp) {
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
}

header("Location: ../../static/main/message.php");