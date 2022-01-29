
<?php
    
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'email_script.php';
    $send_email = new send_email($email, $haslo_temp);
?>


<html>
    <head>
        <title>
            SKRYPT USUNIECIA KONTA
        </title>
    </head>

    <body>
        <?php
                $poprawne_dane = false;
                $email = $_GET['email__'];

                echo "asercja";
                echo $email;

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
                            include 'index.php';
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($wynik))
                            {
                                $temp_email = $row['email'];
                                if ($temp_email == $email)
                                {
                                    $haslo_temp = strval(rand(100000,999999));
                                    $sql_temp = "UPDATE uzytkownik SET haslo = 'DELETE', email = 'DELETE' WHERE email = '$email'";
                                    if(mysqli_query($conn, $sql_temp))
                                    {
                                        
                                        if ($send_email -> send_email($email, "Konto zostało usunięte."))
                                        {
                                            echo "Konto zostało usunięte.";
                                        }
                                        else
                                        {
                                            echo "Konto nie zostało usunięte.";
                                        }
                                        $poprawne_dane = true;
                                    }
                                }
                            }
                        }
                    }
                    if ($poprawne_dane == true)
                    {
                        if(file_exists("index.php")) 
                        {
                            include 'index.php';
                        }
                    }
                    else
                    {
                        if(file_exists("index.php")) 
                        {
                            echo "Nie zresetowano hasła.";
                            include 'index.php';
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
