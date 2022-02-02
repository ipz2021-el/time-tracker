
<html>
    <head>
        <title>
            SKRYPT WYSYLKI
        </title>
    </head>

    <body>
        
        <?php
            // po co klasa usera?
            // Nie jest dodawana rola usera !!!!
            $imie = $_POST['imie_'];
            $nazwisko = $_POST['nazwisko_'];
            $adres_ulica = $_POST['adres_ulica_'];
            $adres_numer_domu_mieszkania = $_POST['adres_numer_domu_mieszkania_'];
            $adres_miasto = $_POST['adres_miasto_'];
            $adres_kod_pocztowy = $_POST['adres_kod_pocztowy_'];
            $adres_kraj = $_POST['adres_kraj_'];
            $klasa_uzytkownika = "foo" //$_POST['klasa_uzytkownika_'];
            $email = $_POST['email_'];
            $telefon_komorkowy = $_POST['telefon_komorkowy_'];
            $haslo1 = $_POST['haslo1_'];
            $haslo2 = $_POST['haslo2_'];
            $rola = 1;

            function validatePaswd($h1)
            {
                $pattern = preg_quote('#$%^&*()+=-[]\';,./{}|\":<>?~', '#');

                if (strlen($h1 ) < 8) 
                {
                    $error = "Hasło jest za krótkie!";
                    echo $error;
                    return(false);
                }
                if (!preg_match("#[0-9]+#", $h1)) 
                {
                    $error = "Hasło musi zawierać przynajmniej 1 cyfrę!";
                    echo $error;
                    return(false);
                }
                if (!preg_match("#[a-z]+#", $h1)) 
                {
                    $error = "Hasło musi zawierać przynajmniej 1 małą literę!";
                    echo $error;
                    return(false);
                }
                if (!preg_match("#[A-Z]+#", $h1)) 
                {
                    $error = "Hasło musi zawierać przynajmniej 1 wielką literę!";
                    echo $error;
                    return(false);
                }
                if (!preg_match('@[^\w]@', $h1)) 
                {
                    $error = "Hasło musi zawierać przynajmniej 1 znak specjalny!";
                    echo $error;
                    return(false);
                }
                else 
                {
                    return(true);
                }
            }

            if (($haslo1 == $haslo2) and (validatePaswd($haslo1) == true))
            {
                $dsn = 'mysql:dbname=clock;host=46.41.140.79;port=3306;charset=utf8';
                $username = 'clockadmin';
                $password = 'VDm9T-Y#8b_Q4qqj';

                try 
                {
                    $connection = new \PDO($dsn, $username, $password);
                    $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    $connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                    //echo "Połączono prawidłowo\n";
                }
                catch(PDOException $e)
                {
                    echo "Nie połączono, następujący błąd: " . $e->getMessage();
                }

                if ($connection == true)
                {   
                    $conn = mysqli_connect("46.41.140.79", "clockadmin", "VDm9T-Y#8b_Q4qqj", "clock");

                    $sql = "INSERT INTO uzytkownik (imie, nazwisko, adres_ulica, adres_numer_domu_mieszkania, adres_miasto, adres_kod_pocztowy, adres_kraj, klasa_uzytkownika, email, telefon_komorkowy, haslo, id_rola)
                            VALUES ('$imie', '$nazwisko', '$adres_ulica', '$adres_numer_domu_mieszkania', '$adres_miasto', '$adres_kod_pocztowy', '$adres_kraj', '$klasa_uzytkownika', '$email', '$telefon_komorkowy', '$haslo1', '$rola')";
                            

                    if($conn == false)
                    {
                        die("Błąd połączenia". mysqli_connect_error());
                    }
                    
                    if(mysqli_query($conn, $sql))
                    {
                        // echo "Dodano uytkownika.";
                        // include 'login.php';
                        header("Location: https://time.tea-it.pl/login.php");
                        exit;
                        
                    }

                    else
                    {
                    echo "Nie dodano uytkownika. $sql. " 
                        . mysqli_error($conn);
                    }
                }
                else
                {
                    echo "Nie dodano uytkownika.\n";
                }
            }
            else
            {
                // Tu lepiej dać header("Location: https://time.tea-it.pl/registration.php?[tu lista parametrow bez hasla]") z parametrami a na registration.php wpisac je do pól
                echo " Hasla sa rózne.";
                echo " Podaj ponownie haslo.";
                // include 'registration.php';
                header("Location: https://time.tea-it.pl/registration.php");
                exit;
            }
        ?>
    <br>

    </body>
</html>
