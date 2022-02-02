
<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }
    $email = $_SESSION["email"];
    $iduser = $_SESSION["idu"];
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
    // require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'email_script.php';
    // $send_email = new send_email($email, $haslo_temp);
?>


<html>
    <head>
        <title>
            SKRYPT DODANIE CZASU PRACY
        </title>
    </head>

    <body>
        <?php

            //=========================================================
            //=========================================================
            //=========================================================
            $dzien_start = intval($_POST['dzien_start_']);
            $miesiac_start = intval($_POST['miesiac_start_']);
            $rok_start = intval($_POST['rok_start_']);
            $godzina_start = intval($_POST['godzina_start_']);
            $minuta_start = intval($_POST['minuta_start_']);
            $sekunda_start = intval(0);
            
            
            $czas_start = mktime($godzina_start, $minuta_start, $sekunda_start, $miesiac_start, $dzien_start, $rok_start);
            
            //=========================================================
            //=========================================================
            //=========================================================
            $dzien_stop = intval($_POST['dzien_stop_']);
            $miesiac_stop = intval($_POST['miesiac_stop_']);
            $rok_start = intval($_POST['rok_start_']);
            $godzina_stop = intval($_POST['godzina_stop_']);
            $minuta_stop = intval($_POST['minuta_stop_']);
            $sekunda_start = 0;
            
            $czas_stop = mktime($godzina_stop, $minuta_stop, $sekunda_stop, $miesiac_stop, $dzien_stop, $rok_stop);
            $projekt_nazwa = $_POST['projekt_nazwa_'];
            $notatka = $_POST['notatka_'];
            //=========================================================
            //=========================================================
            //=========================================================
            $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
            if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
            $sql_projekt = "SELECT id_projekt FROM projekt WHERE nazwa = '$projekt_nazwa'";
            $result = $mysqli->query($sql_projekt);
            if($results->num_rows === 0)
            {
                echo 'No results';
                $id_projekt = '';
            }
            else
            {
                if ($row = $result->fetch_assoc()) {
                    $id_projekt = $row["id_projekt"];
                }
            }
            $result -> free_result();
            $sql_add_time = "INSERT INTO czas_pracy (czas_start, czas_stop, notatka, id_uzytkownik, id_projekt) VALUES ('$czas_start', '$czas_stop', '$notatka', '$id_uzytkownik', '$id_projekt')";
            if ($mysqli->query($sql_add_time))
            {
                echo "Dodano czas pracy.";
            }
            else
            {
                echo "Nie dodano czasu pracy.";
            }                  
            $mysqli -> close();
            if(file_exists("private.php")) 
            {
                // include 'private.php';
                header("Location: https://time.tea-it.pl/private.php");
                exit;
            }
        ?>
    <br>
    </body>
</html>
