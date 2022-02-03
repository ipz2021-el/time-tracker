<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }
    $email = $_SESSION["email"];
    $id_uzytkownik = $_SESSION["idu"];
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
    // require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'email_script.php';
    // $send_email = new send_email($email, $haslo_temp);
?>