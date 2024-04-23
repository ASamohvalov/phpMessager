<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <style>
        li {
            list-style-type: none;
        }
    </style>
    <main>
        <div class="main-main-div">
            <div class="main-nav">
                <a href="login.php" class="btn btn-light btn-sm m-n">Авторизоция</a>
                <a href="#" class="btn btn-light btn-sm m-n">Главная страница</a>
            </div>
            <div class="main-div shadow-lg rounded text-light">
                <div class="main-div_text mb-3">
                    Регистрация
                </div>
                <div class="main-div_content">
                    <form action="../dynamic/registration.php" method="post">
                        <div class="row mb-3">
                            <?php
                            $class = '';
                            $message1 = '';
                            if (isset($_SESSION['error']['first_name'])) {
                                $class = 'is-invalid';
                                $message1 = $_SESSION['error']['first_name'];
                            }
                            ?>
                            <div class="col">
                                <input type="text" class="form-control <? echo $class ?>" placeholder="first name" aria-label="First name" name="first_name">
                            </div>
                            <?php
                            $class = '';
                            $message2 = '';
                            if (isset($_SESSION['error']['last_name'])) {
                                $class = 'is-invalid';
                                $message2 = $_SESSION['error']['last_name'];
                            }
                            ?>
                            <div class="col">
                                <input type="text" class="form-control <? echo $class ?>" placeholder="last name" aria-label="Last name" name="last_name">
                            </div>
                            <div class="error">
                                <?php 
                                echo $message1;
                                if ($message1 != '' and $message2 != '') {
                                    echo "<br>";
                                }
                                echo $message2;
                                ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Придумайте логин</label>
                            <?php
                            $class = '';
                            $message = '';
                            if (isset($_SESSION['error']['username'])) {
                                $class = 'is-invalid';
                                $message = $_SESSION['error']['username'];
                            }
                            ?>
                            <input type="text" class="form-control <? echo $class ?>" id="formGroupExampleInput" placeholder="username" name="username">
                            <div class="error">
                                <? echo $message ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Придумайте пароль</label>
                            <?php
                            $class = '';
                            $message = '';
                            if (isset($_SESSION['error']['password'])) {
                                $class = 'is-invalid';
                                $message = $_SESSION['error']['password'];
                            }
                            ?>
                            <input type="password" class="form-control <? echo $class ?>" id="formGroupExampleInput2 passwordInput" placeholder="password" name="password">
                            <div class="error">
                                <? echo $message ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput3" class="form-label">Повторите пароль</label>
                            <?php
                            $class = '';
                            $message = '';
                            if (isset($_SESSION['error']['repeat_password'])) {
                                $class = 'is-invalid';
                                $message = $_SESSION['error']['repeat_password'];
                            }
                            ?>
                            <input type="password" class="form-control <? echo $class ?>" id="formGroupExampleInput3 passwordInput" placeholder="repeat password" name="repeat_password">
                            <div class="error">
                                <? echo $message ?>
                            </div>
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
unset($_SESSION['error']);
?>