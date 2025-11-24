<?php
include_once '../model/m_buku.php';

$buku = new m_buku();

// Ambil ID dari URL
$id = $_GET['id'];  //nilai disimpan ke  var $id

// Ambil data buku berdasarkan ID
$data = $buku->tampil_data_by_id($id);  //Mengambil data 1 buku berdasarkan id yang diperoleh dari URL, Hasil query disimpan di $data lalu digunakan untuk mengisi form.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
     <style>

      @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@600&display=swap');

    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      padding: 20px;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #fff;
      padding: 25px 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      border-radius: 8px;
    }

    .navbar-left {
      font-weight: bold;
    }

    .navbar-left a {
      margin-right: 15px;
      text-decoration: none;
      color: #333;
    }

    .navbar-left a:hover {
      color: #2e8a30ff;
      transition: 0.3s;
    }

    .navbar-right {
     display: flex;
     align-items: center; /* sejajarkan vertikal */
     gap: 15px; /* jarak antara teks dan form */
    }

    .navbar-right input[type="text"] {
      padding: 6px 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .navbar-right button {
      padding: 6px 12px;
      background: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      margin-left: 5px;
      cursor: pointer;
    }

    .navbar-right button:hover {
      background-color: #3a9a5aff;
      transition: background-color 0.3s ease;
    }

    .navbar-right form {
      display: flex;
      align-items: center;
      gap: 5px;
      margin: 0;
    }

    .navbar-right h4 {
      margin: 0;
      color: #1b8040ff;
      font-weight: bold;
      font-size: 20px;
      white-space: nowrap; /* cegah turun baris */
      font-family: "Merienda", cursive;
      font-optical-sizing: auto;
      font-weight: 600;
      font-style: normal;
    }

    h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #14522bff;
    }

    .navbar-right .logo {
      width: 35px;         /* ubah ukuran logo (bisa disesuaikan) */
      height: 35px;        /* biar bentuk tetap proporsional */
      object-fit: contain; /* jaga agar gambar tidak terdistorsi */
      margin-left: 5px;    /* jarak kecil dari teks */
    } 

    /* Container */
    .container {
      max-width: 400px;
      margin: 0 auto;
      background: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .container label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
      color: #14522bff;
    }

    .container input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      transition: border-color 0.3s;
    }

    .btn {
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
    }

    .btn-primary {
      background-color: #4CAF50;
      color: white;
    }

    .btn-primary:hover {
      background-color: #297643ff;
      transition: background-color 0.3s ease;
    }

    .btn-secondary {
      background-color: #999;
      color: white;
      margin-left: 10px;
      transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
      background-color: #777;
    }
  </style>
</head>

<body>

<div class="navbar">
    <div class="navbar-left">
      <a href="#">CRUD</a>
      <a href="tambah_buku.php">Tambah Buku</a>
      <a href="daftar_buku_admin.php">Daftar Buku</a>
      <a href="dashboard_admin.php">Dashboard</a>
    </div>
    <div class="navbar-right">
         <h4>Daun Ilmu</h4>
         <img src="../asset/logo.png" alt="logo" class="logo">
      <form method="get" style="display:inline-block;">
        <input type="text" name="cari" placeholder="Cari Siswa">
        <button type="submit">Cari</button>
      </form>
    </div>
  </div> 

    <div class="container mt-5">
        <h3 class="mb-4">Update Data Buku</h3>
        <form method="POST" action="../controller/c_buku.php?aksi=update">
            <div class="mb-3" style="display:none;">
                <input type="hidden" name="id_buku" class="form-control" value="<?= $data->id_buku ?>" required>    <!-- Menyimpan id buku tanpa terlihat di form, Id diperlukan oleh controller untuk menentukan buku mana yang akan diupdate -->
            </div>
            <div class="mb-3">
                <label>Judul Buku</label>
                <input type="text" name="judul" class="form-control" value="<?= $data->judul ?>"  required>  <!-- menampilkan judul buku hasil query sebelumnya -->
            </div>
            <div class="mb-3">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="<?= $data->penulis ?>" required>
            </div>
            <div class="mb-3">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="<?= $data->penerbit ?>" required>
            </div>
            <div class="mb-3">
                <label>Tahun Terbit</label>
                <input type="text" name="tahun_terbit" class="form-control" value="<?= $data->tahun_terbit ?>" required>
            </div>
            <button type="submit" name="daftar" class="btn btn-primary">Edit</button>
            <button href="index.php" class="btn btn-secondary">Kembali</button>
        </form>
    </div>
</body>
</html> 