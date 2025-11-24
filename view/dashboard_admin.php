<?php

session_start(); //Memulai session untuk membaca data login user.

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])  || $_SESSION['role'] != 'admin') {  //Mengecek apakah user sudah login. //||  //Mengecek apakah user bukan admin.
    header("Location: login.php");  //Jika tidak lolos cek → redirect ke login.php agar tidak bisa masuk dashboard admin.
    exit;
}

include_once '../model/m_koneksi.php';
$koneksi = new m_koneksi();  //Membuat objek koneksi untuk dijadikan variabel $koneksi->koneksi

// Hitung total buku
$sql_buku = mysqli_query($koneksi->koneksi, "SELECT COUNT(*) AS total FROM buku"); //Menghitung jumlah baris di tabel buku.
$total_buku = mysqli_fetch_assoc($sql_buku)['total'];  //Mengambil hasil query sebagai array asosiatif.  //Mengambil nilai jumlah buku.

// Hitung total anggota
$sql_anggota = mysqli_query($koneksi->koneksi, "SELECT COUNT(*) AS total FROM user");
$total_anggota = mysqli_fetch_assoc($sql_anggota)['total'];

// Hitung total peminjaman, Query menghitung jumlah data di tabel peminjaman dengan status dipinjam.
$sql_pinjam = mysqli_query($koneksi->koneksi,
   "SELECT COUNT(*) AS total FROM peminjaman WHERE status = 'dipinjam'");  //memilih/mengambil data dari tabel, menghitung baris yg ada, disimpan dalam nama query 'total', dari tabel peminjaman yang dimana statusnya dipinjam
$total_pinjam = mysqli_fetch_assoc($sql_pinjam)['total'];

// Hitung total pengembalian
$sql_kembali = mysqli_query($koneksi->koneksi,
   "SELECT COUNT(*) AS total FROM peminjaman WHERE status = 'dikembalikan'"); 
$total_kembali = mysqli_fetch_assoc($sql_kembali)['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('../asset/bg_adm.png');
            background-size: cover; 
            background-repeat: no-repeat;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #136b39ff;
            position: fixed;
            padding-top: 20px;
            color: white;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            display: flex;
            align-items: center;   
            justify-content: center; 
            gap: 10px;             
        }
        img {
            width: 50px;
        }
        .sidebar a {
            display: block;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            margin: 8px;
            border-radius: 8px;
        }
        .sidebar a:hover {
            background: #1dbd3aff;
        }
        .sidebar i {
            margin-right: 10px;
        }

        .main {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            gap: 15px;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card i {
            font-size: 40px;
            color: #1a8918ff;
        }
        .card h3 {
            margin: 0;
            font-size: 16px;
        }
        .card p {
            margin: 5px 0 0;
            font-size: 22px;
            font-weight: bold;
            color: #0A4D68;
        }

        .chart-container {
            margin-top: 40px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2><img src="../asset/books.png">Perpustakaan</h2>
    <a href="dashboard_admin.php"><i class="fas fa-home"></i> Dashboard</a>
    <a href="daftar_buku_admin.php"><i class="fas fa-book"></i> Data Buku</a>
    <a href="v_tampil_data.php"><i class="fas fa-users"></i> Data Anggota</a>
    <a href="riwayat_peminjaman.php"><i class="fas fa-book-reader"></i> Peminjaman</a>
    <a href="riwayat_pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a>
    <a href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<!-- MAIN -->
<div class="main">
    <div class="header">Welcome Admin!</div>

    <div class="cards">
        <div class="card">
            <i class="fas fa-book"></i>
            <div>
                <h3>Total Buku</h3>
                <p><?php echo $total_buku; ?></p> <!-- Menampilkan nilai total buku ke halaman dashboard -->
            </div>
        </div>

        <div class="card">
            <i class="fas fa-users"></i>
            <div>
                <h3>Total Anggota</h3>
                <p><?php echo $total_anggota; ?></p>
            </div>
        </div>

        <div class="card">
            <i class="fas fa-book-reader"></i>
            <div>
                <h3>Peminjaman</h3>
                <p><?php echo $total_pinjam; ?></p>
            </div>
        </div>

        <div class="card">
            <i class="fas fa-undo"></i>
            <div>
                <h3>Pengembalian</h3>
                <p><?php echo $total_kembali; ?></p>
            </div>
        </div>
    </div>

</body>
</html>
