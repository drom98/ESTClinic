<?php

class Bd {
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $dbName = "ESTClinic";

  public function connect() {
    $conn = mysqli_connect($this->host, $this->user, $this->password);
    if(!$conn) {
      return false;
    } else {
      mysqli_select_db($conn, $this->dbName);
      return $conn;
    }
  }
}