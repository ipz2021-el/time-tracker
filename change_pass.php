<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }
    $email = $_POST['email'];
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';

    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    if ($haslo1 === $haslo2)
    {
        $sql_up = "UPDATE uzytkownik SET haslo = '{$haslo1}' WHERE email = '{$email}'";
        if($mysqli->query($sql_up) === TRUE)
        {
            $ans = "Hasło zostało zmienione.";
        } else {
            $ans = "Zmiana hasła nie powiodła się.";
        }
    }               
    $mysqli -> close();
    if(file_exists("login.php")) 
    {
        header("Location: https://time.tea-it.pl/private.php?ans={$ans}");
        exit;
    }
?>
