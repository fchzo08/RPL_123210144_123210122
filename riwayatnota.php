<?php
session_start();
if (empty($_SESSION['email']) && strtoupper($_SESSION['email']) == "ADMIN") {
  header("location:login.php?pesan=belum");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengeluaran - Laporan</title>
  <link rel="icon" href="image/salary.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #90EE90;
  }



  #tombol-bayar {
    margin-left: -50px;
  }

  .table-container {
    margin-left: 35px;
    margin-right: 35px;
  }

  #tombol-hapus {
    margin: auto;
    width: auto;
    height: auto;
  }

  .text-center {
    margin: 25px;
    padding: 10px;
    border-radius: 10px;
    font-weight: lighter;

  }
</style>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active">Laporan</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link active" aria-current="page" href="index.php">Kembali</a>
        </span>
      </div>
    </div>
  </nav>
  <h1 class="text-center bg-white">Riwayat Pembelian</h1>

  <form action="riwayatnota.php" method="post">
  <label for="inputEmail4" class="form-label">Date</label>
    <input type="month" id="bulanTahun" name="bulanTahun" style="margin-left: 30px; border-radius : 5px; width : 350px; margin-top : 50px; padding : 10px;">
    <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 10px;">Cek</button>
  </form>

  <?php
  include "koneksi.php";

  @$tanggal = $_POST["bulanTahun"];
  $date = new DateTime($tanggal);
  $bulan = $date->format("m");
  $tahun = $date->format("Y");
  $query = (mysqli_query($connect, "SELECT * FROM notulen WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'"));

  ?>

  <br><br><br>
  <div class="table-container">
    <table class="table" style="background-color: whitesmoke;">
      <thead>
        <tr>
          <th scope="col">No nota</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Barcode</th>
          <th scope="col">Nama</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($data = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td><?= $data['id_nota'] ?></td>
            <td><?= $data['tanggal'] ?></td>
            <td><?= $data['id_barang'] ?></td>
            <td><?= $data['nama_barang'] ?></td>
            <td><?= $data['jumlah'] ?></td>
            <td><?= $data['harga'] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr style="background-color: whitesmoke; height:calc(100vh - 400px);">
          <td colspan="6"></td>
        </tr>
      </tfoot>
    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>