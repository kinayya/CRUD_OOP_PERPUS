<?php
session_start();
include "koneksi.php";
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
}
echo "<h2>Selamat datang, Admin ".$_SESSION['nama']."</h2>";
echo "<a href='buku.php'>Kelola Buku</a> | <a href='peminjaman.php'>Lihat Peminjaman</a> | <a href='logout.php'>Logout</a>";
?>