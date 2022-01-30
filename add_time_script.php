
<?php
    
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'email_script.php';
    $send_email = new send_email($email, $haslo_temp);
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

                $dzien_start = intval($_GET['dzien_start_']);
                $miesiac_start = intval($_GET['miesiac_start_']);
                $rok_start = intval($_GET['rok_start_']);
                $godzina_start = intval($_GET['godzina_start_']);
                $minuta_start = intval($_GET['minuta_start_']);
                $sekunda_start = intval(0);
                
                
                $czas_start = mktime($godzina_start, $minuta_start, $sekunda_start, $miesiac_start, $dzien_start, $rok_start);
                
                //=========================================================
                //=========================================================
                //=========================================================

                $dzien_stop = intval($_GET['dzien_stop_']);
                $miesiac_stop = intval($_GET['miesiac_stop_']);
                $rok_start = intval($_GET['rok_start_']);
                $godzina_stop = intval($_GET['godzina_stop_']);
                $minuta_stop = intval($_GET['minuta_stop_']);
                $sekunda_start = 0;
                
                $czas_stop = mktime($godzina_stop, $minuta_stop, $sekunda_stop, $miesiac_stop, $dzien_stop, $rok_stop);

                $projekt_nazwa = $_GET['projekt_nazwa_'];
                $notatka = $_GET['notatka_'];

                //=========================================================
                //=========================================================
                //=========================================================


                
                $email = $_GET['email__'];
 
                $conn = mysqli_connect("46.41.140.79", "clockadmin", "VDm9T-Y#8b_Q4qqj", "clock");
                    
                $sql_uzytkownik = "SELECT id_uzytkownik FROM uzytkownik WHERE email = '$email'";
                $sql_projekt = "SELECT id_projekt FROM projekt WHERE nazwa = '$projekt_nazwa'";

                if($conn == false)
                {                        
                    die("Błąd połączenia". mysqli_connect_error());
                }
                else
                {
                    
                    $resultAll = mysqli_query($conn,$sql_uzytkownik);
                    $resultAll_proj = mysqli_query($conn, $sql_projekt);
                    if (($resultAll == false) || ($resultAll_proj == false))
                    {
                        echo "Bląd zapytania SQL";
                        include 'index.php';
                    }
                    else
                    {
                        
                        $rowData = mysqli_fetch_array($resultAll);
                        $id_uzytkownik = $rowData["id_uzytkownik"];

                        $rowData = mysqli_fetch_array($resultAll_proj);
                        $id_projekt = $rowData["id_projekt"];
                    }

                    $sql_add_time = "INSERT INTO czas_pracy (czas_start, czas_stop, notatka, id_uzytkownik, id_projekt) VALUES ('$czas_start', '$czas_stop', '$notatka', '$id_uzytkownik', '$id_projekt')";
                    if (mysqli_query($conn, $sql_add_time))
                    {
                        
                        echo "Dodano czas pracy."
                        if(file_exists("private.php")) 
                        {
                            include 'private.php';
                        }
                    }
                    else
                    {
                        echo "Nie dodano czasu pracy.";
                        if(file_exists("private.php")) 
                        {
                            include 'private.php';
                        }
                    }                          
                }
                mysqli_close($conn);      
        ?>
    <br>
    </body>
</html>
