<?php
    // require_once(__DIR__ . '/summary.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'summary.php';
    $summary = new Summary();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Clocker</title>
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
	<div id="summary">
    <!-- liczby użytkowników, 
    suma zaraportowanych godzin w tygodniu, 
    miesiącu, 
    roku, 
    zawsze. -->
        <div class="summ">
            <img src="people.jpg" alt="People">
            <p>Ilość pracowników: <?php $summary->get_people() ?></p>
        </div>
        <div class="summ">
        <img src="week.jpg" alt="Week">
            <p>W tym tygodniu przepracowaliśmy <?php $summary->get_week() ?> godzin</p>
        </div>
        <div class="summ">
        <img src="month.jpg" alt="Month">
            <p>W tym miesiącu przepracowaliśmy <?php $summary->get_month() ?> godzin</p>
        </div>
        <div class="summ">
        <img src="year.jpg" alt="Year">
            <p>W tym roku przepracowaliśmy <?php $summary->get_year() ?> godzin</p>
        </div>
        <div class="summ">
        <img src="all.jpg" alt="All">
            <p>Od zarania dziejów przepracowaliśmy <?php $summary->get_all() ?> godzin</p>
        </div>
    </div>
</body>
</html>