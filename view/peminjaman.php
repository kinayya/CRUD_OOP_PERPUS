<?php
include "../model/m_koneksi.php"; // Sesuaikan lokasi file koneksi kamu
$k = new m_koneksi();
$koneksi = $k->koneksi;

// Ambil data riwayat peminjaman Budi (id_user = 2)
$query = mysqli_query($koneksi, "
SELECT peminjaman.*, buku.judul, buku.penulis
FROM peminjaman
JOIN buku ON peminjaman.id_buku = buku.id_buku
WHERE peminjaman.id_user = 2
ORDER BY peminjaman.id_peminjaman DESC
");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Peminjaman - Budi Santoso</title>
    <style>
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
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            font-size: 15px;
            background: #f7fbd9ff;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background: #2ecc71;
            color: #fff;
            padding: 12px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        h2 {
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>

    <div class="header">
     <div class="navbar-left">
      <h3>Daun Ilmu</h3>
      <img src="../asset/logo.png" >
      </div>

    <div class="middle-title">
        <h2>Daftar Buku</h2>
    </div>

     <div class="navbar">
        <a href="dashboard_user.php">Dashboard</a>
        <a href="daftar_buku_user.php">Daftar Buku</a>
     </div>

    </div>

    <h2>Riwayat Peminjaman - Budi Santoso</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
        </tr>

        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['judul']; ?></td>
            <td><?= $data['penulis']; ?></td>
            <td><?= $data['tanggal_pinjam']; ?></td>
            <td><?= $data['tanggal_kembali']; ?></td>
            <td><?= $data['status']; ?></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
