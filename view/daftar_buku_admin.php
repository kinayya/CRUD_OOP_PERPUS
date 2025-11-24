<?php
include_once '../controller/c_buku.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Buku</title>
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
      position: relative;
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
     align-items: center;     /* sejajarkan vertikal di tengah */
     gap: 20px;               /* beri jarak antara logo+teks dan form */
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

    .navbar-right h4 {
      margin: 0;
      color: #1b8040ff;
      font-weight: bold;
      font-size: 20px;
      font-family: "Merienda", cursive;
      font-optical-sizing: auto;
      font-weight: 600;
      font-style: normal;
    }

    .navbar-right .logo {
      width: 35px;        
      height: 35px;        
      object-fit: contain; 
      margin: 0
    } 

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    thead {
      background: #4CAF50;
      color: white;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      text-transform: uppercase;
      font-size: 14px;
    }

    /* Tombol Update dan Hapus */
    .btn-update {
      background: #f0ad4e;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 5px;
      text-decoration: none;
    }

    .btn-hapus {
      background: #d9534f;
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn-update:hover {
      background: #ec971f;
      transition: background-color 0.3s ease;
    }

    .btn-hapus:hover {
      background: #c9302c;
      transition: background-color 0.3s ease;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
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

  <!-- Judul -->
  <h2>Daftar Buku</h2>

  <!-- Tabel -->
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun Terbit</th>
        <th></th>
      </tr>
    </thead>
    
    <tbody>
      <?php 
      $no = 1;  //Nomor urutan baris tabel
      // Pastikan $user berisi data array (bukan objek tunggal)    
      foreach($buku as $data): ?>   <!-- melakukan perulangan untuk setiap data buku yang diambil dari database -->
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data->judul ?></td>
          <td><?= $data->penulis ?></td>
          <td><?= $data->penerbit ?></td>
          <td><?= $data->tahun_terbit ?></td>
          <td>
            <!-- Tombol Update -->
            <a href="edit_buku.php?id=<?= $data->id_buku ?>" class="btn-update">Update</a> <!-- Mengirimkan ID buku lewat URL ke halaman edit_buku.php, digunakan untuk mencari buku mana yang ingin di-update -->

            <!-- Tombol Hapus --> 
            <a href="../controller/c_buku.php?aksi=hapus&id=<?= $data->id_buku ?>"   
               class="btn-hapus">Hapus</a>                                           <!-- Mengirim aksi hapus ke c_buku.php, Mengirim ID buku yang dipilih -->
          </td>
        </tr>
      <?php endforeach; ?> 
    </tbody>
  </table>

</body>
</html> 