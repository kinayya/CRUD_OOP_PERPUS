<?php
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

include '../model/m_koneksi.php';
$koneksi = new m_koneksi();

$query = mysqli_query($koneksi->koneksi, "
    SELECT p.*, b.judul, u.nama 
    FROM peminjaman p
    JOIN buku b ON p.id_buku = b.id_buku
    JOIN user u ON p.id_user = u.id_user
    WHERE p.status = 'dikembalikan'
    ORDER BY p.id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pengembalian Buku</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@600&display=swap');

    body {
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 20px;
}

.container {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    max-width: 1200px;
    margin: auto;
}

h2 {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table tr th, 
table tr td {
    padding: 12px;
    border: 1px solid #ddd;
}

table tr td {
    background-color: #f6f6e1ff;
}

table tr th {
    background: #1f7e0fff;
    color: white;
}

.filter-box {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.filter-box input,
.filter-box select {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button {
    padding: 8px 15px;
    background: #46a834ff;
    color: white;
    border-radius: 6px;
    border: none;
}

button:hover {
    background: #37e156ff;
}
    </style>

</head>
<body>

<div class="container">
    <h2>Riwayat Pengembalian Buku</h2>
   
    <form method="GET" class="filter-box">
        <select name="filter">
            <option>Semua</option>
            <option>Hari ini</option>
            <option>Minggu ini</option>
            <option>Bulan ini</option>
        </select>

        <input type="text" name="search" placeholder="Cari buku atau nama...">

        <button type="submit">Filter</button>
    </form>

    <table>
        <tr>
            <th>Judul Buku</th>
            <th>Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Dikembalikan</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['tanggal_pinjam']; ?></td>
            <td><?= $row['tanggal_kembali']; ?></td>
            <td><span style="color: green; font-weight: bold;"><?= $row['status']; ?></span></td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>
