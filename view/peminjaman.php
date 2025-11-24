<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// Pinjam buku
if (isset($_POST['pinjam'])) {
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = date('Y-m-d');
    $tanggal_kembali = date('Y-m-d', strtotime('+7 days')); // otomatis 7 hari
    $status = 'dipinjam';

    mysqli_query($koneksi, "INSERT INTO peminjaman (id_buku, id_user, tanggal_pinjam, tanggal_kembali, status)
                            VALUES ('$id_buku','$id_user','$tanggal_pinjam','$tanggal_kembali','$status')");
    header("Location: peminjaman.php");
}

// Kembalikan buku
if (isset($_GET['kembalikan'])) {
    $id = $_GET['kembalikan'];
    mysqli_query($koneksi, "UPDATE peminjaman SET status='dikembalikan' WHERE id_peminjaman='$id'");
    header("Location: peminjaman.php");
}
?>

<h2>Data Peminjaman Buku</h2>
<a href="<?php echo $_SESSION['role'] == 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php'; ?>">⬅ Kembali</a> | 
<a href="logout.php">Logout</a>
<hr>

<?php if ($_SESSION['role'] == 'user'): ?>
<form method="post">
    <label>Pilih Buku:</label>
    <select name="id_buku" required>
        <option value="">-- Pilih Buku --</option>
        <?php
        $buku = mysqli_query($koneksi, "SELECT * FROM buku");
        while ($b = mysqli_fetch_assoc($buku)) {
            echo "<option value='$b[id_buku]'>$b[judul]</option>";
        }
        ?>
    </select>
    <button type="submit" name="pinjam">Pinjam Buku</button>
</form>
<?php endif; ?>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <?php if ($_SESSION['role'] == 'user') echo "<th>Aksi</th>"; ?>
    </tr>
    <?php
    $query = ($_SESSION['role'] == 'admin') ?
        "SELECT p.*, b.judul FROM peminjaman p JOIN buku b ON p.id_buku=b.id_buku" :
        "SELECT p.*, b.judul FROM peminjaman p JOIN buku b ON p.id_buku=b.id_buku WHERE id_user='$id_user'";

    $data = mysqli_query($koneksi, $query);
    while ($p = mysqli_fetch_assoc($data)) {
        echo "
        <tr>
            <td>$p[id_peminjaman]</td>
            <td>$p[judul]</td>
            <td>$p[tanggal_pinjam]</td>
            <td>$p[tanggal_kembali]</td>
            <td>$p[status]</td>";
        if ($_SESSION['role'] == 'user' && $p['status'] == 'dipinjam') {
            echo "<td><a href='peminjaman.php?kembalikan=$p[id_peminjaman]'>Kembalikan</a></td>";
        } else if ($_SESSION['role'] == 'user') {
            echo "<td>-</td>";
        }
        echo "</tr>";
    }
    ?>
</table>