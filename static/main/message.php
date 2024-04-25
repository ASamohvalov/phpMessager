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
    <title>Seach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <style>
        .messages-div_message {
            background-color: rgb(131, 131, 131);
            margin-top: 5px;
            margin-bottom: 5px;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
            color: black;
        }

        .set-message {
            float: right;
            margin-left: 120px;
        }

        .get-message {
            float: left;
            margin-right: 120px;
        }
    </style>
    <div class="correspondence-div">
        <div class="main-nav">
            <a href="../../logic/logout.php" class="btn btn-light btn-sm m-n">Выход</a>
            <a href="main.php" class="btn btn-light btn-sm m-n">Главная страница</a>
            <a href="../../dynamic/corresp.php" class="btn btn-light btn-sm m-n">Сообщения</a>
        </div>
        <div class="main-div text-light shadow-lg rounded correspondence-div_main-div" style="width: 430px;">
            <div style="background-color: rgb(44, 44, 44); height: 10px;"></div>
            <div class="correspondence-div_main-div_scroll" id="scroll">
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are youhello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am finehihi i am fine</span><br>
                <span class="messages-div_message set-message">hello!!! how are you</span><br>
                <span class="messages-div_message get-message">hihi i am fine</span><br>
            </div>
            <div class="typing-zone mt-1">
                <form action="" method="post" class="row align-items-end" style="margin-left: 5px; margin-top: 10px;">
                    <div class="col-md-9 mb-2">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" style="height: 30px;"></textarea>
                    </div>
                    <div class="col-md-1 mb-2" style="margin-left: -10px;">
                        <button type="button" class="btn btn-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="script/scroll.js"></script>
</body>

</html>