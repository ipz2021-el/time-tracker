<!DOCTYPE html>
<html>
  
<head>
    <title>SKRYPT WYSYLKI</title>
</head>
  
<body>

    <?php
      $dsn = 'mysql:dbname=clock;host=46.41.140.79;port=3306;charset=utf8';
      $username = 'clockadmin';
      $password = 'VDm9T-Y#8b_Q4qqj';

      try 
      {
        $connection = new \PDO($dsn, $username, $password);
        // throw exceptions, when SQL error is caused 
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // prevent emulation of prepared statements
        $connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        echo "Połączono prawidłowo\n";
      }
      catch(PDOException $e)
      {
        echo "Nie połączono, następujący błąd: " . $e->getMessage();
      }

      if ($connection == true)
      {
        echo "Funkcja dodaje uzytkownika\n";

        $id_uzytk = $connection->lastInsertId();
        $imie = $_REQUEST['imie'];
        $nazwisko = $_REQUEST['nazwisko'];
        $adres_ulica = $_REQUEST['adres_ulica'];
        $adres_numer_domu_mieszkania = $_REQUEST['adres_numer_domu_mieszkania'];
        $adres_miasto = $_REQUEST['adres_miasto'];
        $adres_kod_pocztowy = $_REQUEST['adres_kod_pocztowy'];
        $adres_kraj = $_REQUEST['adres_kraj'];
        $klasa_uzytkownika = $_REQUEST['klasa_uzytkownika'];
        $email = $_REQUEST['email'];
        $telefon_komorkowy = $_REQUEST['telefon_komorkowy'];
        $haslo = $_REQUEST['haslo'];
        

        try {
          
          $connection->beginTransaction();

          $sql = 'INSERT INTO `uzytkownik` (`id_uzytk`, `imie`, `nazwisko`, `adres_ulica`, `adres_numer_domu_mieszkania`, `adres_miasto`,  `adres_kod_pocztowy`, `adres_kraj`, `klasa_uzytkownika`, `email`, `telefon_komorkowy`, `haslo`)
                  VALUES (:id_uzytk, :imie, :nazwisko, :adres_ulica, :adres_numer_domu_mieszkania, :adres_miasto, :adres_kod_pocztowy, :adres_kraj, :klasa_uzytkownika, :email, :telefon_komorkowy, :haslo)';
          $statement = $connection->prepare($sql);
          $statement->bindParam(':id_uzytk', $id_uzytk, PDO::PARAM_STR);
          $statement->bindParam(':imie', $imie, PDO::PARAM_STR);
          $statement->bindParam(':nazwisko', $nazwisko, PDO::PARAM_STR);
          $statement->bindParam(':adres_ulica', $adres_ulica, PDO::PARAM_STR);
          $statement->bindParam(':adres_numer_domu_mieszkania', $adres_numer_domu_mieszkania, PDO::PARAM_STR);
          $statement->bindParam(':adres_miasto', $adres_miasto, PDO::PARAM_STR);
          $statement->bindParam(':adres_kod_pocztowy', $adres_kod_pocztowy, PDO::PARAM_STR);
          $statement->bindParam(':adres_kraj', $adres_kraj, PDO::PARAM_STR);
          $statement->bindParam(':klasa_uzytkownika', $klasa_uzytkownika, PDO::PARAM_STR);
          $statement->bindParam(':email', $email, PDO::PARAM_STR);
          $statement->bindParam(':telefon_komorkowy', $telefon_komorkowy, PDO::PARAM_STR);
          $statement->bindParam(':haslo', $haslo, PDO::PARAM_STR);
          $statement->execute();
           
          $connection->commit();
      }
      catch ( PDOException $e ) {
          // Failed to insert the order into the database so we rollback any changes
          $connection->rollback();
          throw $e;
      }
      }
      else
      {
        echo "Funkcja nie dodała uzytkownika\n";
      }
    ?>
</body>
</html>