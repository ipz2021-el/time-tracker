<?php
    // require_once(__DIR__ . '/summary.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'summary_private.php';
    $summary = new Summary_private();
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
	<div id="buttons">
        <form method="get" action="login.php">
            <button type="submit">Logowanie</button>
        </form>
        <form method="get" action="registration.php">
            <button type="submit">Rejestracja</button>
        </form>
    </div>
    <div id="banner">
        <!-- do zmiany na cos ladniejszego -->
        <H1>CLOCKER</H1>
    </div>
	<div id="summary_private">
        <div class="summ_private">
            <img src="people.png" alt="People">
            <p>Ilość pracowników: <?php echo $summary->get_people() ?></p>
        </div>
        <div class="summ_private">
        <img src="week.png" alt="Week">
            <p>W tym tygodniu przepracowaliśmy <?php echo $summary->get_week() ?> godzin</p>
        </div>
        <div class="summ_private">
        <img src="month.png" alt="Month">
            <p>W tym miesiącu przepracowaliśmy <?php echo $summary->get_month() ?> godzin</p>
        </div>
        <div class="summ_private">
        <img src="year.png" alt="Year">
            <p>W tym roku przepracowaliśmy <?php echo $summary->get_year() ?> godzin</p>
        </div>
        <div class="summ_private">
        <img src="all.png" alt="All">
            <p>Od zarania dziejów przepracowaliśmy <?php echo $summary->get_all() ?> godzin</p>
        </div>
    </div>
</body>
</html>