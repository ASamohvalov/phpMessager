<?php
    session_start();
    session_unset();
    header("Location: ../static/login.php");