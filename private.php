<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }


    $email = $_SESSION["email"];
    // require_once(__DIR__ . '/summary.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'summary_private.php';
    $summary_private = new Summary_private($email);
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
        <?php
            echo "<H2>Witaj " . $_SESSION["name"] . "</H2>";
        ?>

    </div>
	<div id="buttons">
        <form method="get" action="add_time.php">
            <input type="hidden" value="<?php echo $email; ?>" name="email__"/>  
            <button type="submit">Dodaj pozycje czasu pracy</button>
        </form>

        <form method="get" action="delete_user.php">
            <input type="hidden" value="<?php echo $email; ?>" name="email__"/>  
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