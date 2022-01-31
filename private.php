<?php
    $email___ = $_GET['email_'];
    // require_once(__DIR__ . '/summary.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'summary_private.php';
    $summary_private = new Summary_private($email___);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>
        CLOCKER STRONA PRYWATNA
    </title>
    <link rel="stylesheet" href="lproject.css">
	<script src="lproject.js"></script>
</head>
<body>
<div id="banner">
        <!-- do zmiany na cos ladniejszego -->
        <H1>CLOCKER</H1>
        <H2>Uzytkownik: </H2>

        <?php

            $conn = mysqli_connect("46.41.140.79", "clockadmin", "VDm9T-Y#8b_Q4qqj", "clock");
            
            $email = $_GET['email_'];
            $sql_temp = "SELECT imie, nazwisko FROM uzytkownik WHERE email = '$email'";

            $resultAll = mysqli_query($conn, $sql_temp);
            $rowData = mysqli_fetch_array($resultAll);
            echo $rowData["imie"].' ';
            echo $rowData["nazwisko"].'<br><br>';
        ?>

    </div>
	<div id="buttons">
        <form method="get" action="add_time.php">
            <input type="hidden" value="<?php echo $_GET['email_']; ?>" name="email__"/>  
            <button type="submit">Dodaj pozycje czasu pracy</button>
        </form>

        <form method="get" action="delete_user.php">
            <input type="hidden" value="<?php echo $_GET['email_']; ?>" name="email__"/>  
            <button type="submit">Usuń konto</button>
        </form>

        <form method="get" action="show_time.php">
            <button type="submit">Wyświetl czas pracy</button>
        </form>

        <form action="index.php" method="GET">
            <input type="submit" value="Strona główna">
        </form>
    </div>
   
	<div id="summary_private">
       
        <div class="summ_private">
        <img src="week.png" alt="Week">
            <p>W tym tygodniu przepracowałeś <?php echo $summary_private->get_week($email) ?> godzin</p>
        </div>
        <div class="summ_private">
        <img src="month.png" alt="Month">
            <p>W tym miesiącu przepracowałeś <?php echo $summary_private->get_month($email) ?> godzin</p>
        </div>
        <div class="summ_private">
        <img src="year.png" alt="Year">
            <p>W tym roku przepracowałeś <?php echo $summary_private->get_year($email) ?> godzin</p>
        </div>
        <div class="summ_private">
    </div>
</body>
</html>