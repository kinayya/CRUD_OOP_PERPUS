<?php

class m_koneksi {
  
  private $host = "localhost";
  private $username = "root";
  private $pass = "";
  private $db = "rpl4";
  public $koneksi;

  function __construct() {
    $this->koneksi = mysqli_connect($this->host, $this->username, $this->pass, $this->db);

    if ($this->koneksi) {
      return $this->koneksi;
    } else {
      echo "koneksi kedatabase gagal";
    }
  }
}

$koneksi = new m_koneksi();


?>