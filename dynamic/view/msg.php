<?php

session_start();
require_once('../../include/connect.php');

$idThisUser = $_SESSION['data']['id'];
$idUser = $_GET['id'];
$connection = new Connection();

$id_correp = $connection->getFirstData(
    "SELECT id FROM `correspondence` WHERE (user_id = ? AND user_id_with = ?) OR (user_id = ? AND user_id_with = ?)",
    [$idThisUser, $idUser, $idUser, $idThisUser]
);

if ($id_correp !== []) {
    $msg = $connection->getAllData(
        "SELECT * FROM `messages` WHERE"
    );
}

header("Location: ../../static/main/message.php");