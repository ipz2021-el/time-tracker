
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

<html>
    <head>
        <title>
            SKRYPT DODANIE CZASU PRACY
        </title>
    </head>

    <body>
        <?php
            $starttime = $_POST['starttime'];
            $stoptime = $_POST['stoptime'];
            $project = $_POST['project'];            
            $notatka = $_POST['notatka_'];
            // $czas_start = mktime($godzina_start, $minuta_start, $sekunda_start, $miesiac_start, $dzien_start, $rok_start);
            // $czas_stop = mktime($godzina_stop, $minuta_stop, $sekunda_stop, $miesiac_stop, $dzien_stop, $rok_stop);

            $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
            if ($mysqli -> connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
            $sql_projekt = "SELECT id_projekt FROM projekt WHERE nazwa = '{$project}'";
            $result = $mysqli->query($sql_projekt);
            if($result->num_rows === 0)
            {
                echo 'No result';
                $id_projekt = '';
            }
            else
            {
                if ($row = $result->fetch_assoc()) {
                    $id_projekt = $row["id_projekt"];
                }
            }
            $result -> free_result();
            $sql_add_time = "INSERT INTO czas_pracy (czas_start, czas_stop, notatka, id_uzytkownik, id_projekt) VALUES ('$starttime', '$stoptime', '$notatka', '$id_uzytkownik', '$id_projekt')";
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
    </body>
</html>
