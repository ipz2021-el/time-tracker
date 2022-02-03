<?php
session_start();
if (!isset($_SESSION["email"])){
    header("Location: https://time.tea-it.pl/login.php");
    exit();
}
$email = $_SESSION["email"];
class Summary_private {
  private $week;
  private $month;
  private $year;
  public $projects;

  function __construct($email) {
    // require_once(__DIR__ . '/db.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
    $this->set_vars($email); 
    $this->projects = [];
  }

  function set_projects() {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $query = "select name from projekt;";
    $result = $mysqli->query($query);
    while($row = $result->fetch_row()) {
      $this->projects[] = $row;
    }
    $result -> free_result();
    $mysqli -> close();
  }

  
  // week
  function get_week() {
    return $this->week;
  }
  function set_week($email) {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    //====================
    //====================
    //====================
    $query_id_user = "SELECT id_uzytkownik FROM uzytkownik WHERE email = '{$email}'";
    $resultAll = mysqli_query($mysqli, $query_id_user);
    $rowData = mysqli_fetch_array($resultAll);
    $id_uzytkownik_ = $rowData["id_uzytkownik"];
    //====================
    //====================
    //====================

    $query = "select czas_start, czas_stop, id_uzytkownik from czas_pracy WHERE id_uzytkownik='{$id_uzytkownik_}' AND czas_start between date_sub(now(),INTERVAL 1 WEEK) and now();";
    $result = $mysqli->query($query);
    $sum = 0;
    while ($row = $result->fetch_assoc()) {
      // if ($row["id_uzytkownik"]==$id_uzytkownik_)
      // {
      $sum += floor((strtotime($row["czas_stop"]) - strtotime($row["czas_start"])) / 3600);
      // }
    }

    $result -> free_result();
    $mysqli -> close();
    $this->week = $sum;
  }

  // month
  function get_month() {
    return $this->month;
  }
  function set_month($email) {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    //====================
    //====================
    //====================
    $query_id_user = "SELECT id_uzytkownik FROM uzytkownik WHERE email = '{$email}'";
    $resultAll = mysqli_query($mysqli, $query_id_user);
    $rowData = mysqli_fetch_array($resultAll);
    $id_uzytkownik_ = $rowData["id_uzytkownik"];
    //====================
    //====================
    //====================
    $query = "select czas_start, czas_stop from czas_pracy WHERE id_uzytkownik='{$id_uzytkownik_}' AND czas_start between date_sub(now(),INTERVAL 1 MONTH) and now();";
    $result = $mysqli->query($query);
    $sum = 0;
    while ($row = $result->fetch_assoc()) {
      // if ($row["id_uzytkownik"]==$id_uzytkownik_)
      // {
        $sum += floor((strtotime($row["czas_stop"]) - strtotime($row["czas_start"])) / 3600);
      // }
    }
    $result -> free_result();
    $mysqli -> close();
    $this->month = $sum;
  }

  // year
  function get_year() {
    return $this->year;
  }
  function set_year($email) {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    //====================
    //====================
    //====================
    $query_id_user = "SELECT id_uzytkownik FROM uzytkownik WHERE email = '{$email}'";
    $resultAll = mysqli_query($mysqli, $query_id_user);
    $rowData = mysqli_fetch_array($resultAll);
    $id_uzytkownik_ = $rowData["id_uzytkownik"];
    //====================
    //====================
    //====================
    $query = "select czas_start, czas_stop from czas_pracy WHERE id_uzytkownik='{$id_uzytkownik_}' AND czas_start between date_sub(now(),INTERVAL 1 YEAR) and now();";
    $result = $mysqli->query($query);
    $sum = 0;
    while ($row = $result->fetch_assoc()) {
      // if ($row["id_uzytkownik"]==$id_uzytkownik_)
      // {
        $sum += floor((strtotime($row["czas_stop"]) - strtotime($row["czas_start"])) / 3600);
      // }
    }
    
    $result -> free_result();
    $mysqli -> close();
    $this->year = $sum;
  }

  function set_vars($email) {
    
    $this->set_week($email);
    $this->set_month($email);
    $this->set_year($email);
    
  }

}


?>
