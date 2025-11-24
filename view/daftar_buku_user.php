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
.catalog {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 25px;
    padding: 40px;
}

.card {
    background-color: rgba(255, 255, 255, 0.85);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    transition: 0.3s;
    backdrop-filter: blur(3px);
}

.card img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    border-radius: 10px;
}

.card h4 {
    font-size: 18px;
    margin: 12px 0 5px;
}

.card p {
    font-size: 14px;
    color: #333;
}

.card button {
    background-color: #1bcb50ff;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
}

.card button:hover {
    background-color: #14a63fff;
}
.middle-title h2 {
    margin: 0;
    font-size: 25px;
}

.middle-title {
    flex-grow: 1;
    display: flex;
    justify-content: center;
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
        <a href="peminjaman.php">Peminjaman Buku</a>
     </div>

    </div>

    <div class="catalog">
    
    <div class="card">
        <img src="../asset/pemroweb.jpeg" alt="">
        <h4>Pemrograman Web Dasar</h4>
        <p>Penulis: Ahmad Fikri</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/algoritma.jpeg" alt="">
        <h4>Algoritma dan Pemrograman</h4>
        <p>Penulis: Dwi Nugroho</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/phpsql_data.jpeg" alt="">
        <h4>Database MySQL</h4>
        <p>Penulis: Rina Susanti</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/jarkom.jpeg" alt="">
        <h4>Jaringan Komputer</h4>
        <p>Penulis: Bambang Prasetyo</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/ui_ux.jpeg" alt="">
        <h4>Desain UI/UX Modern</h4>
        <p>Penulis: Fitri Handayani </p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/html_css.jpeg" alt="">
        <h4>HTML & CSS Lengkap</h4>
        <p>Penulis: Teguh Santoso</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/python.jpeg" alt="">
        <h4>Python Untuk Pemula</h4>
        <p>Penulis: Rudi Hartono </p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/AI.jpeg" alt="">
        <h4>Kecerdasan Buatan</h4>
        <p>Penulis: Siti Rahma</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/basdata.jpeg" alt="">
        <h4>Basis Data Lanjut</h4>
        <p>Penulis: Indra Yulianto</p>
        <button>Pinjam</button>
    </div>

    <div class="card">
        <img src="../asset/phpsql.jpeg" alt="">
        <h4>Pemrograman PHP&MySQL</h4>
        <p>Penulis: Yusuf Alamsyah</p>
        <button>Pinjam</button>
    </div>

</div>


</body>
</html>