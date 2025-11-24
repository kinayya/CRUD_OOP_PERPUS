<?php

session_start(); //Memulai session untuk membaca data login user.

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])  || $_SESSION['role'] != 'user') {  //Mengecek apakah user sudah login. //||  //Mengecek apakah user bukan admin.
    header("Location: login.php");  //Jika tidak lolos cek → redirect ke login.php agar tidak bisa masuk dashboard admin.
    exit;
}

include_once '../model/m_koneksi.php';
$koneksi = new m_koneksi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@600&display=swap');

    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('../asset/bg_user.png');
    background-size: cover; 
    background-repeat: no-repeat;
}

.header {
    display: flex;
    justify-content: space-between; 
    align-items: center; 
    padding: 30px 30px;
    background-color: #49ee5ad0;
    color: #fff;
}

.header img {
    width: 50px;
}

.header h3 {
    margin: 0;
    font-size: 24px;
    font-family: "Merienda", cursive;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
    margin-left: 80px;
}

.navbar-left {
    display: flex;
    align-items: center;
    gap: 25px; 
}

.navbar a {
    text-decoration: none;
    color: #fff;
    margin-left: 25px;
    margin-right: 20px;
    font-size: 17px;
    font-weight: bold;
    transition: 0.3s;
}

.navbar a:hover {
    background-color: #1bcb50ff; 
    border-radius: 15px;
    padding: 10px;
}

    </style>
</head>

<body>
    <div class="header">
     <div class="navbar-left">
      <h3>Daun Ilmu</h3>
      <img src="../asset/logo.png" >
      </div>

     <div class="navbar">
        <a href="dashboard_user.php">Dashboard</a>
        <a href="daftar_buku_user.php">Daftar Buku</a>
        <a href="peminjaman.php">Peminjaman Buku</a>
     </div>

    </div>


</body>
</html>