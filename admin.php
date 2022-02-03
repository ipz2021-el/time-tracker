<?php
    session_start();
    if (!isset($_SESSION["email"]) && !isset($_SESSION['idu']) && $_SESSION['idu'] != 2){
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
    <div id="admin">
        <div id="del">
            <form method="get" action="">
                <label for="email">Podaj email: </label><br>
                <input type="email" id="email" name="delemail" placeholder="jan@kowalski.pl">
                <button type="submit" name="delbnt">Usuń konto</button>
            </form>
            <?php
                if (isset($_POST["delbnt"])){
                    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
                    if ($mysqli -> connect_errno) {
                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                        exit();
                    }
                    $sql = "DELETE FROM uzytkownik WHERE email='" . $_GET["delemail"] . "'";
                    if($mysqli->query($sql) === TRUE)
                    {
                        echo "Konto " . $_GET["delemail"] . " zostało usunięte.";
                    }
                    else
                    {
                        echo "Error deleting record: " . $conn->error;
                    }
                    $pmysqli -> close();
                }
            ?>
        </div>

        <div id="csv">
            
            <form method="get" action="">
                <button type="submit" name="delbnt">CSV</button>
            </form>
            <?php
                if (isset($_POST["csvbnt"])){
                    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
                    if ($mysqli -> connect_errno) {
                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                        exit();
                    }
                    $query = "SELECT * FROM czas_pracy";
                    $times = array();
                    $result = $mysqli->query($query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $times[] = $row;
                    }
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Disposition: attachment; filename=times.csv');
                    $output = fopen('php://output', 'w');
                    fputcsv($output, array('ID', 'Start', 'Stop', 'Note', 'IDuser', 'IDproject'));

                    if (count($times) > 0) {
                        foreach ($times as $row) {
                            fputcsv($output, $row);
                        }
                    }
                    $presult -> free_result();
                    $pmysqli -> close();
                }
            ?>
        </div>
    </div>
</body>
</html>