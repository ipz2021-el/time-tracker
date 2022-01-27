
<html>
    <head>
        <title>
            SKRYPT WYSYLKI
        </title>
    </head>

    <body>
        <?php
                $poprawne_dane = false;
                $email = $_GET['email_'];
                $haslo = $_GET['haslo_'];

                $dsn = 'mysql:dbname=clock;host=46.41.140.79;port=3306;charset=utf8';
                $username = 'clockadmin';
                $password = 'VDm9T-Y#8b_Q4qqj';
                try 
                {
                    $connection = new \PDO($dsn, $username, $password);
                    $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    $connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
                    echo "Połączono prawidłowo\n";
                }
                catch(PDOException $e)
                {
                    echo "Nie połączono, następujący błąd: " . $e->getMessage();
                }

                if ($connection == true)
                {   
                    $conn = mysqli_connect("46.41.140.79", "clockadmin", "VDm9T-Y#8b_Q4qqj", "clock");
                    $sql = "SELECT email, haslo FROM uzytkownik";

                    if($conn == false)
                    {
                        die("Błąd połączenia". mysqli_connect_error());
                    }
                    else
                    {
                        $wynik = mysqli_query($conn,$sql);
                        if($wynik == false)
                        {
                            echo "Bląd zapytania SQL";
                            include 'login.php';
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($wynik))
                            {
                                $temp_email = $row['email'];
                                $temp_haslo = $row['haslo'];
                                if (($temp_email == $email) and ($temo_haslo  == $haslo))
                                {
                                    $poprawne_dane = true;
                                }
                            }
                        }
                    }
                    if ($poprawne_dane == true)
                    {
                        if(file_exists("private.php"))
                        {
                            include 'private.php';
                            echo "Zalogowano poprawnie";
                        }
                    }
                    else
                    {
                        if(file_exists("index.php"))
                        {
                            include 'index.php';
                            echo "Blad";
                        }
                    }
                    mysqli_close($conn);
                }
                else
                {
                    echo "Błąd połączenia";
                }
        ?>
    <br>
    </body>
</html>
