<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }


    $email = $_SESSION["email"];
    // require_once(__DIR__ . '/summary.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'summary_private.php';
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
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
    <?php
        if (isset($_GET["ans"])){
            echo "<p>" . $_GET["ans"] . "</p>";
        }
    ?>
    <div id="banner">
        <!-- do zmiany na cos ladniejszego -->
        <H1>CLOCKER</H1>
        <?php
            echo "<H2>Witaj " . $_SESSION["name"] . "</H2>";
        ?>
    </div>
	<div id="btns">
        <?php
            if (isset($_SESSION['idr']) && $_SESSION['idr'] == 2){
                echo "</form>";
                echo "<form method='get' action='admin.php'>";
                echo "<button type='submit'>Admin panel</button>";
                echo "</form>";
            }
        ?>
        <form method='get' action='logout.php'>
            <button type='submit'>Wyloguj</button>
        </form>
        <form action="index.php" method="GET">
            <button type='submit'>Strona główna</button>
        </form>
    </div>
    <div>
        <h3>Zaloguj czas pracy</h3>
        <form action="add_time_script.php" method="POST">
        <!-- <form method="get" action="add_time.php"> -->
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
                    var_dump($summary_private);
                    foreach ($summary_private->projects as $item){
                        echo "<option value='" . $item . "'>" . $item . "</option>";
                    }
                ?>
                </select>
            </div>
            <div class="oneinput">
                <label for="notatka_">Opis czynności: </label><br>
                <input type="text" id="notatka" name="notatka_" placeholder="Wykonałem zadnie....">
            </div>
            <button type="submit">Dodaj pozycje czasu pracy</button>
        </form>
    </div>
    <div>
        <h3>Zmień hasło</h3>
        <form method="POST" action="change_pass.php">
            <div class="oneinput">
                <label for="haslo1">Podaj haslo: </label><br>
                <input type="password" id="haslo1" name="haslo1" placeholder="haslo123!">
                <div id="message">
                <h3>Hasło musi zawierać:</h3>
                <p id="letter" class="invalid">Przynajmniej 1 małą literę</p>
                <p id="capital" class="invalid">Przynajmniej 1 wielką literę</p>
                <p id="number" class="invalid">Przynajmniej 1 cyfrę</p>
                <p id="special_char" class="invalid">Przynajmniej 1 znak specjalny</p>
                <p id="length" class="invalid">Minimum 8 znaków</p>
                </div>
            </div>
            <div class="oneinput">
                <label for="haslo2">Powtórz haslo: </label><br>
                <input type="password" id="haslo2" name="haslo2" placeholder="haslo123!">
            </div>
            <button type="submit">Zmień hasło</button>
        </form>
    </div>
   
	<div id="summary_private">
        <h3>Twoje podsumowanie</h3>
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

    <div id="find">
        <h3>Wyszukaj</h3>
        <form method="POST" action="">
        <div class="oneinput">
                <label for="fstart">Start</label>
                <input type="date" id="fstart" name="fstarttime">
            </div>
            <div class="oneinput">
                <label for="fstop">Stop</label>
                <input type="date" id="fstop" name="fstoptime">
            </div>
            <div class="oneinput">
                <label for="fproject">Wybierz projekt:</label>
                <select id="fproject" name="fproject">
                    <option value="">Bez projektu</option>
                <?php
                    foreach ($summary_private->projects as $item){
                        echo "<option value='" . $item . "'>" . $item . "</option>";
                    }
                ?>
                </select>
            </div>
            <button type="submit" name="findbnt">Znajdz zalogowany czas</button>
        </form>
        <?php
            if (isset($_POST["findbnt"])){
                $query = "select * from czas_pracy WHERE id_uzytkownik=" . $_SESSION['idu'];
                if (isset($_POST["fstarttime"])){
                    $fstarttime = " and czas_start LIKE '%" . $_POST['fstarttime'] . "%'";
                }else{
                    $fstarttime = '';
                }
                if (isset($_POST["fstoptime"])){
                    $fstoptime = " and czas_stop LIKE '%" . $_POST['fstoptime'] . "%'";
                }else{
                    $fstoptime = '';
                }
                if (!empty($_POST["fproject"])){
                    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
                    if ($mysqli -> connect_errno) {
                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                        exit();
                    }
                    $sql_projekt = "SELECT id_projekt FROM projekt WHERE nazwa='" . $_POST["fproject"] . "'";
                    $result = $mysqli->query($sql_projekt);
                    if($result->num_rows === 0)
                    {
                        $fproject = '';
                    }
                    else
                    {
                        if ($row = $result->fetch_assoc()) {
                            $fproject = " and id_projekt=" . $row["id_projekt"];
                        }
                    }
                    $result -> free_result();
                    $mysqli -> close();
                }else{
                    $fproject = '';
                }                
                if(!empty($_POST["fstarttime"])){
                    $query .= $fstarttime;
                }
                if(!empty($_POST["fstoptime"])){
                    $query .= $fstoptime;
                }
                if(!empty($_POST["fproject"])){
                    $query .= $fproject;
                }
                $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
                if ($mysqli -> connect_errno) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }
                $result = $mysqli->query($query);
                if($result->num_rows > 0)
                {
                    echo "<p>Znaleziono:</p>";
                    while($row = $result->fetch_assoc()) {

                        if(!empty($_POST["fproject"])){
                            echo "<p>" . $_POST["fproject"] . " " . $row["czas_start"] . " " . $row["czas_stop"] . " " . $row["notatka"] . "</p>";
                        }else{
                            $pmysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
                            if ($pmysqli -> connect_errno) {
                                echo "Failed to connect to MySQL: " . $pmysqli -> connect_error;
                                exit();
                            }
                            $psql_projekt = "SELECT nazwa FROM projekt WHERE id_projekt='" . $row["id_projekt"] . "'";
                            $presult = $pmysqli->query($psql_projekt);
                            if($presult->num_rows === 0)
                            {
                                echo 'No result';
                            }
                            else
                            {
                                if ($prow = $presult->fetch_assoc()) {
                                    echo "<p>" . $prow["nazwa"] . $row["czas_start"] . " " . $row["czas_stop"] . " " . $row["notatka"] . "</p>";
                                }
                            }
                            $presult -> free_result();
                            $pmysqli -> close();
                        }
                    }
                }
                $result -> free_result();
                $mysqli -> close();
            }
        ?>
    </div>
</body>
</html>