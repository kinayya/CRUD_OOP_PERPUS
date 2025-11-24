<?php
session_start();
include "koneksi.php";
if ($_SESSION['role'] != 'user') {
    header("Location: login.php");
}
echo "<h2>Halo, ".$_SESSION['nama']."</h2>";
echo "<a href='peminjaman.php'>Pinjam Buku</a> | <a href='logout.php'>Logout</a>";
?>