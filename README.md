phpMessager
- регистрация и авторизация, хэширование паролей
- личный кабинет пользователя, включающий информацию о нём
- возможность поиска пользователя по имени, фильтрация
- просмотр профилей других пользователей
- создание переписок
- возможность обмениваться текстовыми сообщениями

Технологии -
PHP, JavaScript, HTML, CSS, bootstrap, MySQL, git

Для запуска этого проекта необходимо:
- перениести все файлы из репозитория
- импортировать MySQL базу данных из файла phpMessager.sql в корне проекта
- по необходимости изменить пользователя и пароль от базы данных в файле include/connect.php
- в браузере перейти по адресу localhost/static/login.php

Про проект:

В этом проекте не использовал никаких php фреймворков или MVC, поэтому он имеет некоторые недостатки.
Так как в проекте нету работы с WebSocet и контроллерами, приложение работает с backend частью только при 
обращении к определенным php файлам отвечающим за работу с данными, из-за этого, к примеру, чтобы посмотреть 
только что полученные сообщения, не достаточно просто обновить страницу, так как страница static/main/message.php
только отображает информацию которая пришла в сессии из файла dynamic/view/msg.php, соответственно необходимо
обратиться к этому файлу нажав на переписку на странице static/main/correspondence.php

Но проект сам по себе получился интересным, пришлось очень потрудится над работой с базой данных, над работой
с сессиями
