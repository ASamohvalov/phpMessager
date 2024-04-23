<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <main>
        <div class="main-main-div">
            <div class="main-nav">
                <a href="register.php" class="btn btn-light btn-sm m-n">Регистрация</a>
                <a href="#" class="btn btn-light btn-sm m-n">Главная страница</a>
            </div>
            <div class="main-div shadow-lg rounded text-light">
                <div class="main-div_text">
                    Авторизоция
                </div>
                <div class="seccess-message">
                    <? echo isset($_SESSION['success']) ? $_SESSION['success'] : '' ?>
                </div>
                <div class="error-message">
                    <? echo isset($_SESSION['error']) ? $_SESSION['error'] : '' ?>
                </div>
                <div class="main-div_content">
                    <form action="../dynamic/authorization.php" method="post">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Введите ваш логин</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="username" name="username">
                        </div>
                        <div class="mb-4">
                            <label for="formGroupExampleInput2" class="form-label">Введите ваш пароль</label>
                            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="password" name="password">
                        </div>
                        <div class="main-div_content_button">
                            <button type="submit" class="btn btn-light mb-3">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<?php
unset($_SESSION['success']);
unset($_SESSION['error']);
?>