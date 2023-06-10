<?php
session_start();
if (empty($_SESSION['email'])) {
  header("location:login.php?pesan=belum");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Input - Berkah</title>
  <link rel="icon" href="image/salary.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #f2f2f2;
  }

  .btn {
    margin-top: 50px;
    margin-left: 35px;
  }

  .form-label {
    margin-left: 35px;
    margin-top: 50px;
  }

  #isi-barcode {
    margin-left: 30px;
    width: 350px;
  }

  .background-box {
    background-color: #cfe3ff;
    padding: 10px;
    border-radius: 5px;
    margin: 25px;
    min-height: 100vh;
  }

  .text-center {
    margin: 25px;
    padding: 10px;
    border-radius: 10px;
    font-weight: lighter;

  }

  .footer {
    background-color: #f2f2f2;
    padding: 10px;
  }

  .footer-text {
    padding: 5px;
    margin-left: 250px;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg" style="background-color: #cfe3ff;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">Input Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="stock.php">Stock</a>
          </li>
          <?php
          if (strtoupper($_SESSION['email']) == "ADMIN") {
            echo '<li class="nav-item">
            <a class="nav-link" href="daftarkaryawan.php">Daftar Karyawan</a>
          </li><br>';
            echo '<li class="nav-item">
          <a class="nav-link" href="riwayatnota.php">Laporan</a>
        </li>';
          }
          ?>
        </ul>
        <span class="navbar-text">
          <a class="nav-link active" aria-current="page" href="con_logout.php">Logout</a>
        </span>
      </div>
    </div>
  </nav>
  <h1 class="text-center bg-white">Input Barang</h1>
      <div style="text-align: center;">
      <?php
      if (isset($_GET["pesan"]) && $_GET["pesan"] == "berhasil") {
        echo "<div class='alert alert-primary' role='alert'>Input Barang Berhasil</div>";
      } elseif (isset($_GET["pesan"]) && $_GET["pesan"] == "gagal") {
        echo "<div class='alert alert-primary' role='alert'>Input Barang Gagal</div>";
      }
      ?>
    </div>
  <div class="background-box">

    <div class="informasi-tambahan">
      <h3>Panduan Penggunaan:</h3>
      <ul>
        <li>Isi barcode dengan kode unik barang.</li>
        <li>Isi nama barang sesuai dengan nama yang tertera.</li>
        <li>Isi harga barang dengan angka tanpa tanda baca.</li>
        <li>Isi stok barang dengan jumlah stok yang tersedia.</li>
      </ul>
    </div>
    <form method="POST" action="con_input.php">
      <div class="barcode-inputan">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Barcode</label>
          <input name="barcode" type="number" class="form-control" id="isi-barcode" required>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="nama-barang">
              <label for="inputEmail4" class="form-barang" style="margin-top: 80px;">Nama Barang</label>
              <input name="nama" type="text" class="form-control" id="kotak-nama" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="harga-barang">
              <label for="inputEmail4" class="form-harga">Harga Barang</label>
              <input name="harga" type="number" class="form-control" id="kotak-harga" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="stok-barang">
              <label for="inputEmail4" class="form-stok">Stok</label>
              <input name="stok" type="number" class="form-control" id="kotak-stok" required>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<footer class="footer">
  <div class="container text-center">
    <p class="footer-text">&copy; 2023 Your Company. All rights reserved.</p>
  </div>
</footer>



</html>