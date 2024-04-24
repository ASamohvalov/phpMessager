<?php
session_start();

if (!isset($_SESSION['data']['id'])) {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="correspondence-div">
        <div class="main-nav">
            <a href="../../logic/logout.php" class="btn btn-light btn-sm m-n">Выход</a>
            <a href="main.php" class="btn btn-light btn-sm m-n">Главная страница</a>
        </div>
        <div class="main-div text-light shadow-lg rounded correspondence-div_main-div">
            <div class="correspondence-div_main-div_seach">
                <form action="" method="get" class="d-flex">
                    <input class="form-control me-2 mt-2 mb-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light mt-2 mb-2" type="submit">Search</button>
                </form>
            </div>
            <div class="correspondence-div_main-div_scroll">
                <?php

                if (isset($_SESSION['corresp'])) {
                    foreach ($_SESSION['corresp'] as $data) {
                        echo '
                            <a href="#" class="correspondence-div_main-div_content row text-light">
                                <div class="col-1">
                                    <img src="img/no_avatar.jpg" alt="avatar" class="main-div_correspondence_avatar">
                                </div>
                                <div class="col main-div_correspondence_text">
                                    ' . $data['last_name'] . ' ' . $data['first_name'] . '
                                </div>
                            </a>
                        ';
                    }
                } else {
                    echo '  
                        <div class="correspondence-div_main-div_content_is-empty">
                            is empty
                        </div>
                    ';
                }

                ?>
                <!-- <a href="#" class="correspondence-div_main-div_content row text-light">
                    <div class="col-1">
                        <img src="img/no_avatar.jpg" alt="avatar" class="main-div_correspondence_avatar">
                    </div>
                    <div class="col main-div_correspondence_text">
                        samohvalov artem
                    </div>
                </a> -->
            </div>
        </div>
    </div>
</body>

</html>