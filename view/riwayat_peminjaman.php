<?php
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

include '../model/m_koneksi.php';
$koneksi = new m_koneksi();

// SEARCH
$search = isset($_GET['search']) ? $_GET['search'] : ""; //?(operator ternary seperti if)  //: (pemisah antara kondisi benar & salah)  //"" (isi dgn string ksong)

// FILTER TANGGAL
$filter = isset($_GET['filter']) ? $_GET['filter'] : "semua";   //Menampung pilihan filter waktu (semua/hari/minggu/bulan)
$where = "WHERE p.status = 'dipinjam'";  //Menampilkan hanya buku yang masih dipinjam

if ($filter == "hari") {
    $where .= " AND p.tanggal_pinjam = CURDATE()"; //tanggal pinjamnya sama dengan hari ini
}
if ($filter == "minggu") {
    $where .= " AND YEARWEEK(p.tanggal_pinjam) = YEARWEEK(CURDATE())";  //menampilkan data di minggu yg sama (tidak tercampur dengan minggu tahun lain)
}
if ($filter == "bulan") {
    $where .= " AND MONTH(p.tanggal_pinjam) = MONTH(CURDATE()) /*menampilkan data yang tanggalnya masih dalam bulan dan tahun yang sama seperti sekarang.*/
                AND YEAR(p.tanggal_pinjam) = YEAR(CURDATE())";
}

// SEARCH QUERY
if (!empty($search)) {  //!empty() berarti jalankan blok hanya kalau $search tidak kosong.  //empty($search) mengembalikan true kalau $search kosong
    $where .= " AND (b.judul LIKE '%$search%' OR u.nama LIKE '%$search%')";  //mencari lewat judul atau nama, selagi masih ada kata di tengah' %% maka akan ditampilkan
}

$query = mysqli_query($koneksi->koneksi, " 
    SELECT p.*, b.judul, u.nama  
    FROM peminjaman p
    JOIN buku b ON p.id_buku = b.id_buku
    JOIN user u ON p.id_user = u.id_user
    $where
    ORDER BY p.id_peminjaman DESC 
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Peminjaman</title>
    <style>
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
    background: #46a834ff;
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
    background: #1dbd3aff;
}

    </style>

</head>

<body>
<div class="container">
    <h2> Riwayat Peminjaman Buku</h2>

    <form method="GET" class="filter-box">
        <select name="filter">
            <option value="semua">Semua</option>
            <option value="hari" <?= $filter == "hari" ? "selected" : "" ?>>Hari ini</option> <!-- Untuk mengecek apakah filter yang dipilih user sebelumnya adalah "hari". Jika iya → tambahkan selected pada tag <option> agar tetap terpilih setelah halaman reload. -->
            <option value="minggu" <?= $filter == "minggu" ? "selected" : "" ?>>Minggu ini</option>
            <option value="bulan" <?= $filter == "bulan" ? "selected" : "" ?>>Bulan ini</option>
        </select>

        <input type="text" name="search" placeholder="Cari buku atau nama..." value="<?= $search ?>"> <!-- Menampilkan kembali teks pencarian yang tadi diketik user ke input search setelah submit form. -->

        <button type="submit">Filter</button>
    </form>

    <table>
        <tr>
            <th>Judul</th>
            <th>Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Batas Kembali</th>
            <th>Status</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($query)) { ?>  <!-- Mengambil data satu per satu dari database, Disimpan ke dalam array $row, Perulangan berjalan selama masih ada data -->
        <tr>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['tanggal_pinjam']; ?></td>
            <td><?= $row['tanggal_kembali']; ?></td>
            <td><span style="color: red; font-weight: bold;"><?= $row['status']; ?></span></td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>
