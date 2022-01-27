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
    return $this->people;
  }
  function set_people() {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $query = "SELECT COUNT(*) AS users FROM uzytkownik;";
    $result = $mysqli->query($query);
    if (!$result) {
      throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    }
    if ($row = $result->fetch_assoc()) {
      $this->people = $row['users'];
    }
    $result -> free_result();
    $mysqli -> close();
  }
  // week
  function get_week() {
    return $this->week;
  }
  function set_week() {
    // $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    // if ($mysqli -> connect_errno) {
    //   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    //   exit();
    // }
    // $query = "SELECT czas_start, czas_stop FROM czas_pracy;";
    // $result = $mysqli->query($query);
    // if (!$result) {
    //   throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    // }
    // if ($row = $result->fetch_assoc()) {
    //   $this->people = $row['users'];
    // }
    // $result -> free_result();
    // $mysqli -> close();
    $this->week = 0;
  }
  // month
  function get_month() {
    return $this->month;
  }
  function set_month() {
    // $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    // if ($mysqli -> connect_errno) {
    //   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    //   exit();
    // }
    // $query = "SELECT czas_start, czas_stop FROM czas_pracy;";
    // $result = $mysqli->query($query);
    // if (!$result) {
    //   throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    // }
    // if ($row = $result->fetch_assoc()) {
    //   $this->people = $row['users'];
    // }
    // $result -> free_result();
    // $mysqli -> close();
    $this->month = 0;
  }
  // year
  function get_year() {
    return $this->year;
  }
  function set_year() {
    // $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    // if ($mysqli -> connect_errno) {
    //   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    //   exit();
    // }
    // $query = "SELECT czas_start, czas_stop FROM czas_pracy;";
    // $result = $mysqli->query($query);
    // if (!$result) {
    //   throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
    // }
    // if ($row = $result->fetch_assoc()) {
    //   $this->people = $row['users'];
    // }
    // $result -> free_result();
    // $mysqli -> close();
    $this->year = 0;
  }
  // all
  function get_all() {
    return $this->all;
  }
  function set_all() {
    $mysqli = new mysqli(DBhost, DBuser, DBpass, DBname, DBport);
    if ($mysqli -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
    $query = "SELECT czas_start, czas_stop FROM czas_pracy;";
    $result = $mysqli->query($query);
    while ($row = $result->fetch_assoc()) {
      echo 'start' . strtotime($row["czas_stop"]);
      echo 'stop' . strtotime($row["czas_start"]) . '\n';
      echo floor((strtotime($row["czas_stop"]) - strtotime($row["czas_start"])) / 3600) ;
    }
    
    
    $result -> free_result();
    $mysqli -> close();
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