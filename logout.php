<?php
    session_start();
    if (isset($_SESSION["email"])){
        session_unset();
        session_destroy();
    }
    header("Location: https://time.tea-it.pl/index.php");
    exit;