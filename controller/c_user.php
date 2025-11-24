<?php
include_once '../model/m_user.php';
$user = new m_user(); 

try {

  if (!empty($_GET['aksi'])) {

    // ===== TAMBAH DATA =====
    if ($_GET['aksi'] == 'tambah') {
      $id = $_POST['id_user'];
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];
      $no_induk = $_POST['no_induk'];
      $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $role = $_POST['role'];

      $result = $user->tambah_data($id, $nama, $kelas, $no_induk, $pass, $role);

      if ($result) {
        echo "<script>alert('Data berhasil ditambahkan');window.location='../view/v_tampil_data.php';</script>";
      } else {
        echo "<script>alert('Gagal menambahkan data');window.location='../view/v_tambah_data.php';</script>";
      }
    }

    // ===== HAPUS DATA =====
    else if ($_GET['aksi'] == 'hapus') {
      $id = $_GET['id'];
      $result = $user->hapus_data($id);

      if ($result) {
        echo "<script>alert('Data berhasil dihapus');window.location='../view/v_tampil_data.php';</script>";
      } else {
        echo "<script>alert('Gagal menghapus data');window.location='../view/v_tampil_data.php';</script>";
      }
    }

    // ===== UPDATE DATA =====
    else if ($_GET['aksi'] == 'update') {
      $id = $_POST['id_user'];
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];
      $no_induk = $_POST['no_induk'];
      $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $role = $_POST['role'];

      $result = $user->update_data($id, $nama, $kelas, $no_induk, $pass, $role);

      if ($result) {
        echo "<script>alert('Data berhasil diupdate');window.location='../view/v_tampil_data.php';</script>";
      } else {
        echo "<script>alert('Gagal mengupdate data');window.location='../view/v_update_data.php?id=$id';</script>";
      }
    }

  } 
  // ============ AKSI SEARCH ============ 
  else {

    if (isset($_GET['cari']) && $_GET['cari'] != "") {
      $keyword = $_GET['cari'];
      $user = $user->cari_data($keyword);   // memanggil fungsi search
    } else {
      $user = $user->tampil_data();         // default: tampil semua user
    }

  }

} catch (Exception $e) {
  echo $e->getMessage();
}
?>
