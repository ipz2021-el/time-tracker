<html>
    <head>
        <meta charset="utf-8">
        <title>
            CLOCKER SKRYPT WYSYLKI
        </title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>

    <body>
        <?php
            if (!empty($_POST['email_']) && !empty($_POST['haslo_']))
            {
                $poprawne_dane = false;
                $email = $_POST['email_']; 
                $haslo = $_POST['haslo_'];

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
                    $sql = "SELECT email, haslo, imie FROM uzytkownik WHERE email='{$email}'";

                    if($conn == false)
                    {
                        die("Błąd połączenia". mysqli_connect_error());
                    }
                    else
                    {
                        $wynik = mysqli_query($conn,$sql);
                        if($wynik == false)
                        {
                            //echo "Bląd zapytania SQL";
                            // include 'login.php';
                            header("Location: https://time.tea-it.pl/login.php");
                            exit;
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($wynik))
                            {
                                if (($row['email'] == $email) && ($row['haslo']  == $haslo))
                                {
                                    $imie = $row['imie'];
                                    $poprawne_dane = true;
                                }
                            }
                        }
                    }
                    if ($poprawne_dane == true)
                    {
                        if(file_exists("private.php"))
                        {
                            session_start();
                            $_SESSION['email'] = htmlspecialchars($email);
                            $_SESSION['name'] = htmlspecialchars($imie);
                            header("Location: https://time.tea-it.pl/private.php");
                            exit;
                            // include 'private.php';
                            //echo "Zalogowano poprawnie";
                        }
                    }
                    else
                    {
                        if(file_exists("login.php"))
                        {
                            // Tu lepiej dać header("Location: https://time.tea-it.pl/login.php?[tu parametr z info ze sie nie udalo]") 
                            // opcjonalnie z parametram email do wpisania do póla
                            echo "Podano nieprawidlowe dane.";
                            header("Location: https://time.tea-it.pl/login.php?email={$email}");
                            exit;
                        }
                        else
                        {
                            echo "Błąd otwarcia strony";
                        }
                    }
                    mysqli_close($conn);
                }
                else
                {
                    if(file_exists("index.php"))
                    {
                        // include 'index.php';
                        //echo "Błąd połączenia";
                        header("Location: https://time.tea-it.pl/index.php");
                        exit;
                    }
                    else
                    {
                        echo "Błąd otwarcia strony";
                    }
                }
            }
        ?>
    <br>
    </body>
</html>
