<?php
session_start();
include "../model/m_koneksi.php";

$k = new m_koneksi();  //membuat objek $k dari class m_koneksi
$koneksi = $k->koneksi; //Mengakses dan menyimpan koneksi database ke variabel $koneksi.


if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Mengecek apakah halaman dipanggil dengan metode POST (artinya tombol Login ditekan).
    $no_induk = $_POST['no_induk']; //Mengambil data No Induk yang dikirim dari form.
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE no_induk='$no_induk' AND password='$password'"); //Mengirim perintah SQL untuk mencari user yang cocok
    $data = mysqli_fetch_array($query); //Jika ditemukan → $data berisi informasi user, jika tidak berarti kosons

    if ($data) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];    //Menyimpan data user dalam session, supaya bisa digunakan di halaman lain (misalnya tampilkan nama user di dashboard).
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: dashboard_admin.php");  //jika admin diarahkan ke dashboard amin
        } else {
            header("Location: dashboard_user.php");   //jika user diarahkan ke dashboard user
        }
        exit;
    } else {
        $error = "No induk atau password salah!";   //kalau no induk/pw salah
    }
}
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
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background: #fff;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
      width: 350px;
      text-align: center;
    }


    h2 {
      color: #2e8a30;
      margin-bottom: 5px;
      font-family: "Merienda", cursive;
      font-optical-sizing: auto;
      font-weight: 600;
      font-style: normal;
    }

    .caption {
    display: flex;
    align-items: center; /* Sejajarkan vertikal */
    justify-content: center; /* Pusatkan horizontal */
    margin-bottom: 25px; /* Pindahkan margin dari p ke wrapper */
    }

    p {
    color: #388b44ff;
    font-size: 14px;
    margin: 0; /* Hapus margin-bottom asli dari p */
    /* Pastikan p tidak mengambil lebar penuh, agar img bisa di samping */
    display: inline-block; 
   }

    /* New: Atur ukuran gambar */
   .caption img {
    width: 25px; /* Atur lebar (disesuaikan) */
    height: 25px; /* Atur tinggi (disesuaikan) */
    object-fit: contain;
    margin-left: 8px; /* Beri jarak antara teks dan gambar */
   }

    h4 {
      margin-bottom: 20px;
      color: #2e8a30;
      font-weight: 600;
      display: inline-block;
      padding-bottom: 5px;
    }

    label {
      display: block;
      text-align: left;
      font-size: 14px;
      color: #14522bff;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 15px;
      box-sizing: border-box;

    }

    input[type="submit"] {
      width: 100%;
      background-color: #3b8f3eff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #4fb656ff;
    }

    .mb-4 {
      margin-bottom: 15px;
    }
    .error {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>Daun Ilmu</h2>

    <div class="caption">
    <p>Temukan petualangan baru di setiap halaman.</p>
    <img src="../asset/book.png" class="icon">
       </div>

    <h4>Login</h4>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?> <!-- agar tulisan error muncul -->

    <form method="POST">
    <div class="mb-4">
      <label>No Induk</label>
      <input type="text" name="no_induk">
    </div>
    <div>
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <input type="submit" value="Login">
  </form>

  </div>

</body>
</html>