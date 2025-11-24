<?php
include_once '../model/m_user.php';

// buat objek model
$m_user = new m_user();

// ambil id dari URL, misal: v_ubah_data.php?id=3
$id = $_GET['id'] ?? null;

// kalau id tidak ada, hentikan eksekusi
if (!$id) {
    die("ID user tidak ditemukan di URL.");
}

// ambil data user dari database
$user = $m_user->tampil_data_by_id($id);

// kalau tidak ditemukan, hentikan
if (!$user) {
    die("Data user dengan ID $id tidak ditemukan.");
}
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
      width: 25px;         /* ubah ukuran logo (bisa disesuaikan) */
      height: 25px;        /* biar bentuk tetap proporsional */
      object-fit: contain; /* jaga agar gambar tidak terdistorsi */
      margin-left: 5px;    /* jarak kecil dari teks */
    } 

    /* Container */
    .container {
      max-width: 500px;
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
      background-color: #3a9a5a;
      transition: background-color 0.3s ease;
    }

    .btn-secondary {
      background-color: #999;
      color: white;
      margin-left: 10px;
    }

    .btn-secondary:hover {
      background-color: #565353ff;
      transition: background-color 0.3s ease;
    }
  </style>
</head>

<body>

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

    <div class="container mt-5">
        <h3 class="mb-4">Form Ubah Pengguna</h3>
        <form method="POST" action="../controller/c_user.php?aksi=update">
            <div class="mb-3" style="display:none;">                
                <input type="hidden" class="form-control" name="id_user" value="<?= $user->id_user ?>" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="<?= $user->nama ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" value="<?= $user->kelas ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>No_induk</label>
                <input type="text" name="no_induk" value="<?= $user->no_induk ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <input type="text" name="role" value="<?= $user->role ?>" class="form-control">
            </div>
            <button type="submit" name="daftar" class="btn btn-primary">update</button>
            <button href="index.php" class="btn btn-secondary">Kembali</button>
        </form>
    </div>
</body>
</html> 