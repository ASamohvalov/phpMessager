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
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <main>
        <div class="main-div_main">
            <div class="main-nav">
                <a href="../../logic/logout.php" class="btn btn-light btn-sm m-n">Выход</a>
                <a href="../../dynamic/corresp.php" class="btn btn-light btn-sm m-n">Сообщения</a>
            </div>
            <div class="main-div shadow-lg rounded text-light">
                <div style="text-align: center; font-size: 20px; font-weight: 500;">Главная страница</div>
                <div class="row">
                    <div class="col">
                        <img src="img/no_avatar.jpg" alt="avatar" class="main-div_main_avatar">
                    </div>
                    <div class="col-7 main-div_table">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><? echo $_SESSION['data']['first_name'] ?></td>
                                    <td><? echo $_SESSION['data']['last_name'] ?></td>
                                    <td><? echo $_SESSION['data']['username'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>