<?php
    $haslo_temp = "Try1234!";
    $email = $_GET['email_'];
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'email_script.php';
    echo " wysylka";
    $send_email = new send_email($email, $haslo_temp);
    echo "po";
?>


<html>
    <head>
        <title>
            SKRYPT RESETU HASLA
        </title>
    </head>

    <body>
        <?php
                $poprawne_dane = false;
                $email = $_GET['email_'];

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
                                    $sql_temp = "UPDATE uzytkownik SET haslo = '$haslo_temp' WHERE email = '$email'";
                                    //UPDATE table_name SET column1 = value1, column2 = value2 WHERE id=100;
                                    if(mysqli_query($conn, $sql_temp))
                                    {
                                        
                                        if ($send_email -> send_email($email, $haslo_temp))
                                        {
                                            echo "Zresetowano haslo. Sprawdz pocztę email.";
                                        }
                                        else
                                        {
                                            echo "Blad podczas wysyłania hasła na pocztę email.";
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
