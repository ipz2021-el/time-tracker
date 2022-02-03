<?php
    session_start();
    if (!isset($_SESSION["email"]) && !isset($_SESSION['idu']) && $_SESSION['idu'] != 2){
        header("Location: https://time.tea-it.pl/login.php");
        exit();
    }
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
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
    $result -> free_result();
    $mysqli -> close();
?>