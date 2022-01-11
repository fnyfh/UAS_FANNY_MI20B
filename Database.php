<?php

class Database
{
  public function DBConnect(){
    $dbhost = 'localhost';
    $dbname = 'oop_fanny';
    $dbuser = 'root';
    $dbpass = '';

    try {
      $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      $dbConnection->exec("set names utf8");
      $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnection;
    } catch (PDOException $e) {
      return 'Connection Failed: ' . $e->getMessage();
    }
  }
  // var $host = "localhost";
  // var $uname = "root";
  // var $pass = "";
  // var $db = "oop_fanny";

  // function __construct()
  // {
  //   mysqli_connect($this->host, $this->uname, $this->pass);
  //   mysqli_select_db($this->db);
  // }
  
}

?>