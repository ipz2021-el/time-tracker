<?php
class Summary {
  
  private $people;
  private $week;
  private $month;
  private $year;
  private $all;

  function __construct() {
    // require_once(__DIR__ . '/db.php');
    require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'db.php';
    $this->set_vars(); 
  }

  // people
  function get_people() {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    $query = "SELECT COUNT(*) AS users FROM uzytkownik;";
    $result = $mysqli->query($query);
    if (!$result) {
      throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    }
    // mysqli_query($mysqli, "SELECT COUNT(*) FROM uzytkownik;");
    if ($row = $result->fetch_assoc()) {
      $this->people = $row['users'];
    }
    return $this->people;
  }
  function set_people() {
    $this->people = 0;
  }
  // week
  function get_week() {
    return $this->week;
  }
  function set_week() {
    $this->week = 0;
  }
  // month
  function get_month() {
    return $this->month;
  }
  function set_month() {
    $this->month = 0;
  }
  // year
  function get_year() {
    return $this->year;
  }
  function set_year() {
    $this->year = 0;
  }
  // all
  function get_all() {
    return $this->all;
  }
  function set_all() {
    $this->all = 0;
  }

  function set_vars() {
    $this->set_people();
    $this->set_week();
    $this->set_month();
    $this->set_year();
    $this->set_all();
  }

  

}


?>