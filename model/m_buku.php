<?php
include_once "m_koneksi.php";

class m_buku {

  public $koneksi;

  // ===== CONSTRUCTOR =====
  function __construct() {
    $db = new m_koneksi();     
    $this->koneksi = $db->koneksi;  // simpan koneksi dalam properti class
  }

  // ===== TAMPIL DATA =====
  function tampil_data() {
    $sql = "SELECT * FROM buku";
    $query = mysqli_query($this->koneksi, $sql);

    while ($data = mysqli_fetch_object($query)) {   //mysqli_fetch_object($query) mengambil 1 baris dari hasil query dalam bentuk object.
      $result[] = $data;
    }
    return $result ?? [];  //tanda ?? & [] agar jika tidak ada data, code tidak akan error
  }

  // ===== TAMPIL DATA BY ID =====
  function tampil_data_by_id($id) {
    $sql = "SELECT * FROM buku WHERE id_buku = $id";
    return mysqli_fetch_object(mysqli_query($this->koneksi, $sql));
  }

  // ===== TAMBAH DATA =====
  function tambah_buku($judul, $penulis, $penerbit, $tahun) {
    $sql = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit)
            VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    return mysqli_query($this->koneksi, $sql);
  }

  // ===== UPDATE DATA =====
  function update_buku($id, $judul, $penulis, $penerbit, $tahun) {
     $sql = "UPDATE buku SET  
            judul = '$judul',
            penulis = '$penulis',
            penerbit = '$penerbit',           
            tahun_terbit = '$tahun'
            WHERE id_buku = '$id'";   //hanya baris tertentu yang berubah
    return mysqli_query($this->koneksi, $sql);
  }

  // ===== HAPUS DATA =====
  function hapus_buku($id) {
    $sql = "DELETE FROM buku WHERE id_buku = '$id'";
    return mysqli_query($this->koneksi, $sql);
  }


}
?>
