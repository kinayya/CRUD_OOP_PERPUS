<?php
include_once '../controller/c_user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD User</title>
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
      width: 25px;         /* ubah ukuran logo (bisa disesuaikan) */
      height: 25px;        /* biar bentuk tetap proporsional */
      object-fit: contain; /* jaga agar gambar tidak terdistorsi */ 
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
      <a href="v_tambah_data.php">Tambah User</a>
      <a href="v_tampil_data.php">Daftar User</a>
      <a href="dashboard_admin.php">Dashboard</a>
    </div>
    <div class="navbar-right">
      <h4>Daun Ilmu</h4>
      <img src="../asset/user.png" alt="logo" class="logo">
      <form method="get" style="display:inline-block;">
        <input type="text" name="cari" placeholder="Cari Siswa">
        <button type="submit">Cari</button>
      </form>
    </div>
  </div>

  <!-- Judul -->
  <h2>Daftar User</h2>

  <!-- Tabel -->
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>No Induk</th>
        <th></th>
      </tr>
    </thead>
    
    <tbody>
      <?php 
      $no = 1;
      // Pastikan $user berisi data array (bukan objek tunggal)
      foreach($user as $data): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data->nama ?></td>
          <td><?= $data->kelas ?></td>
          <td><?= $data->no_induk ?></td>
          <td>
            <!-- Tombol Update -->
            <a href="v_ubah_data.php?id=<?= $data->id_user ?>" class="btn-update">Update</a>

            <!-- Tombol Hapus -->
            <a href="../controller/c_user.php?aksi=hapus&id=<?= $data->id_user ?>" 
               onclick="return confirm('Yakin ingin menghapus data ini?')" 
               class="btn-hapus">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html> 