<?php
include_once "m_koneksi.php";

class m_user {

  function tampil_data() {
    // Membuat objek dari kelas m_koneksi
    $koneksi = new m_koneksi();
    // Query untuk menampilkan semua data dari tabel user
    $sql = "SELECT * FROM user";
    // Jalankan query
    $query = mysqli_query($koneksi->koneksi, $sql);

    // Cek apakah ada data
    if ($query->num_rows > 0) {
      // Simpan hasil query ke array result
      while ($data = mysqli_fetch_object($query)) {     
        $result[] = $data;
      }
      return $result;
    } else {
      return [];
    }
  }

  function tampil_data_by_id($id) {
    
    $koneksi = new m_koneksi();
    $sql = "SELECT * FROM user WHERE id_user = $id";
    return mysqli_fetch_object(mysqli_query($koneksi->koneksi, $sql));
    
  }

  function tambah_data($id,$nama,$kelas,$no_induk,$pass,$role) {
    
    $koneksi = new m_koneksi();
    $sql = "INSERT INTO user (nama, kelas, no_induk, password, role)
        VALUES ('$nama', '$kelas', '$no_induk', '$pass', '$role')";
    $query = mysqli_query($koneksi->koneksi, $sql);
    return $query;
  }

  function update_data($id, $nama, $kelas, $no_induk, $pass, $role) {
    $koneksi = new m_koneksi();

    return mysqli_query($koneksi->koneksi, "UPDATE user SET nama= '$nama', kelas= '$kelas', no_induk= '$no_induk', password= '$pass', role= '$role' WHERE id_user = '$id' ");
  }

  function hapus_data($id) {
  $koneksi = new m_koneksi();
  $sql = "DELETE FROM user WHERE id_user = '$id'";
  return mysqli_query($koneksi->koneksi, $sql);
}


}