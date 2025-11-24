<?php
// Memanggil file model buku
include_once '../model/m_buku.php';

// Membuat objek dari kelas m_buku
$buku = new m_buku();

try {

  // Cek apakah ada parameter aksi pada URL
  if (!empty($_GET['aksi'])) {
    
    // ===== TAMBAH DATA =====
    if ($_GET['aksi'] == 'tambah') {
      
      $judul = $_POST['judul'];
      $penulis = $_POST['penulis'];
      $penerbit = $_POST['penerbit'];
      $tahun = $_POST['tahun_terbit'];

      $result = $buku->tambah_buku($judul, $penulis, $penerbit, $tahun);

      if ($result) {
        echo "<script>alert('Buku berhasil ditambahkan');window.location='../view/daftar_buku_admin.php';</script>";
      } else {
        echo "<script>alert('Gagal menambahkan buku');window.location='../view/tambah_buku.php';</script>";
      }
    }


    // ===== HAPUS DATA =====
    else if ($_GET['aksi'] == 'hapus') {
      
      $id = $_GET['id'];

      $result = $buku->hapus_buku($id);

      if ($result) {
        echo "<script>alert('Buku berhasil dihapus');window.location='../view/daftar_buku_admin.php';</script>";
      } else {
        echo "<script>alert('Gagal menghapus buku');window.location='../view/daftar_buku_admin.php';</script>";
      }
    }


    // ===== UPDATE DATA =====
    else if ($_GET['aksi'] == 'update') {
      
      $id = $_POST['id_buku'];
      $judul = $_POST['judul'];
      $penulis = $_POST['penulis'];
      $penerbit = $_POST['penerbit'];
      $tahun = $_POST['tahun_terbit'];

      $result = $buku->update_buku($id, $judul, $penulis, $penerbit, $tahun);

      if ($result) {
        echo "<script>alert('Buku berhasil diupdate');window.location='../view/daftar_buku_admin.php';</script>";
      } else {
        echo "<script>alert('Gagal mengupdate buku');window.location='../edit_buku.php?id=$id';</script>";
      }
    }

 }  // tutup if(!empty($_GET['aksi']))

  // ====== TANPA AKSI (TAMPILKAN / SEARCH DATA BUKU) ======
  else {

    // Jika search
    if (isset($_GET['cari']) && $_GET['cari'] != "") {
      $keyword = $_GET['cari'];
      $buku = $buku->cari_buku($keyword);   // fungsi search buku
    } 

    // Jika tidak search → tampil semua buku
    else {
      $buku = $buku->tampil_data();
    }

  } // akhir else tanpa aksi

} catch (Exception $e) {
  echo $e->getMessage();
}

?>
