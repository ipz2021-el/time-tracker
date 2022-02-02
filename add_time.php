<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            CLOCKER FORMULARZ DODAWANIA CZASU PRACY
        </title>
        <link rel="stylesheet" href="lproject.css">
	    <script src="lproject.js"></script>
    </head>
    <body>
        <div id="banner_add_time">
            <!-- do zmiany na cos ladniejszego -->
            <H1>CLOCKER</H1>
            <H2>Dodaj czas...</H2>
        </div>
        <form action="add_time_script.php" method="POST">
            <div class="oneinput">
                <label for="start">Start</label>
                <input type="datetime-local" id="start" name="starttime">
            </div>
            <div class="oneinput">
                <label for="stop">Stop</label>
                <input type="datetime-local" id="stop" name="stoptime">
            </div>
            <div class="oneinput">
                <label for="project">Wybierz projekt:</label>
                <select id="project" name="project">
                    <option value="project">Bez projektu</option>
                <?php
                    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
                    if ($mysqli -> connect_errno) {
                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                        // exit();
                    }
                    $sql_projekt = "SELECT nazwa FROM projekt";
                    $result = $mysqli->query($sql_projekt);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["nazwa"] . "'>" . $row["nazwa"] . "</option>";
                    }
                    $result -> free_result();
                    $mysqli -> close();
                ?>
                </select>
            </div>
            <!-- <div class="oneinput">
            <label for="projekt_nazwa_">Nazwa projektu: </label><br>
            <input type="text" id="projekt_nazwa" name="projekt_nazwa_" placeholder="Projekt">
            </div> -->

            <div class="oneinput">
            <label for="notatka_">Opis czynności: </label><br>
            <input type="text" id="notatka" name="notatka_" placeholder="Wykonałem zadnie....">
            </div>

            <!-- ================================================= -->
            <!-- ================================================= -->
            <!-- ================================================= -->
            
            <!-- Przycisk WYŚLIJ -->
            <div class="oneinput">
                <input type="submit" value="Dodaj czas pracy">
            </div>
        </form>

        <form action="private.php" method="GET">
            <label for="private">Powrót na Twoją stronę prywatną </label><br>
            <input id="private" type="submit" value="Strona prywatna">
        </form>
        <form action="index.php" method="GET">
            <label for="mainsite">Powrót na stronę główną </label><br>
            <input id="mainsite" type="submit" value="Strona główna">
        </form>
    </body>
</html>
