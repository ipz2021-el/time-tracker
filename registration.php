
<html>
    <head>
        <title>
            SKRYPT WYSYLKI
        </title>
    </head>

    <body>
        
        <?php
            $imie = $_GET['imie_'];
            $nazwisko = $_GET['nazwisko_'];
            $adres_ulica = $_GET['adres_ulica_'];
            $adres_numer_domu_mieszkania = $_GET['adres_numer_domu_mieszkania_'];
            $adres_miasto = $_GET['adres_miasto_'];
            $adres_kod_pocztowy = $_GET['adres_kod_pocztowy_'];
            $adres_kraj = $_GET['adres_kraj_'];
            $klasa_uzytkownika = $_GET['klasa_uzytkownika_'];
            $email = $_GET['email_'];
            $telefon_komorkowy = $_GET['telefon_komorkowy_'];
            $haslo1 = $_GET['haslo1_'];
            $haslo2 = $_GET['haslo2_'];

            function validatePaswd($h1)
            {
                if( strlen($h1 ) < 8 ) {
                    $error .= "Password too short!
                    ";
                    }
                    if( strlen($h1 ) > 20 ) {
                    $error .= "Password too long!
                    ";
                    }
                    if( strlen($h1 ) < 8 ) {
                    $error .= "Password too short!
                    ";
                    }
                    if( !preg_match("#[0-9]+#", $h1 ) ) {
                    $error .= "Password must include at least one number!
                    ";
                    }
                    if( !preg_match("#[a-z]+#", $h1 ) ) {
                    $error .= "Password must include at least one letter!
                    ";
                    }
                    if( !preg_match("#[A-Z]+#", $h1 ) ) {
                    $error .= "Password must include at least one CAPS!
                    ";
                    }
                    if( !preg_match("#W+#", $h1 ) ) {
                    $error .= "Password must include at least one symbol!
                    ";
                    }
                    if($error){
                    echo "Password validation failure(your choise is weak): $error";
                    return(false);
                    } else {
                    return(true);
                    }
            }
        
            if ($haslo1 == $haslo2)
            {
                $dsn = 'mysql:dbname=clock;host=46.41.140.79;port=3306;charset=utf8';
                $username = 'clockadmin';
                $h1 = 'VDm9T-Y#8b_Q4qqj';

                try 
                {
                    $connection = new \PDO($dsn, $username, $h1);
                    $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    $connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                    echo "Połączono prawidłowo\n";
                }
                catch(PDOException $e)
                {
                    echo "Nie połączono, następujący błąd: " . $e->getMessage();
                }
                if (! validatePaswd($haslo1))
                {
                    echo("Hasło nie spełnia warunków.");
                }

                if ($connection == true)
                {   
                    $conn = mysqli_connect("46.41.140.79", "clockadmin", "VDm9T-Y#8b_Q4qqj", "clock");

                    $sql = "INSERT INTO uzytkownik (imie, nazwisko, adres_ulica, adres_numer_domu_mieszkania, adres_miasto, adres_kod_pocztowy, adres_kraj, klasa_uzytkownika, email, telefon_komorkowy, haslo)
                            VALUES ('$imie', '$nazwisko', '$adres_ulica', '$adres_numer_domu_mieszkania', '$adres_miasto', '$adres_kod_pocztowy', '$adres_kraj', '$klasa_uzytkownika', '$email', '$telefon_komorkowy', '$haslo1')";
                            

                    if($conn == false)
                    {
                        die("Błąd połączenia". mysqli_connect_error());
                    }
                    
                    if(mysqli_query($conn, $sql))
                    {
                        echo "Dodano rekord";
                        include 'login.html';
                    }

                    else
                    {
                    echo "Nie dodano rekordu $sql. " 
                        . mysqli_error($conn);
                    }
                }
                else
                {
                    echo "Nie dodano rekordu\n";
                }
            }
            else
            {
                echo "Hasla sa rózne";
                echo "Podaj ponownie haslo";
                include 'registration.html';
            }
        ?>
    <br>

    </body>
</html>
