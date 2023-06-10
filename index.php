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
  <title>Transaksi - Berkah</title>
  <link rel="icon" href="image/salary.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #90EE90;
  }

  .btn {
    margin-left: 19px;
    margin-top: 10px;
    width: 150px;
    height: 50px;
    font-size: 19px;
  }

  #tombol-bayar {
    margin-left: auto;
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
            <a class="nav-link active" aria-current="page">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="input.php">Input Barang</a>
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
  <form method="POST" action="con_TEMP.php">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Barcode</label>
          <input name="barcode" type="number" class="form-control" id="isi-barcode" required>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-total">Total</label>
          <div class="square">
            <?php
            include "koneksi.php";
            $quary1 = mysqli_query($connect, "SELECT SUM(total) AS total_stok FROM temp");
            if ($data1 = mysqli_fetch_array($quary1)) {
              echo '<h1 class="square-price">' . $data1['total_stok'] . '</h1>';
              $total_pem = $data1['total_stok'];
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="jumlah-transaksi">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-barang">Jumlah</label>
        <input name="jumlah" type="number" class="form-control" id="kotak-nama" required>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-auto">
          <button type="submit" class="btn btn-success btn-lg">Tambah</button>
        </div>
        <div class="col-auto">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="tombol-bayar">
          Bayar
        </button>
        </div>
      </div>
    </div>
  </form>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?php
          echo "<h1>Rp. " . $data1['total_stok'] . "</h1>"; ?>
          <form action="con_bayar.php" method="post">
            <label class="form-label">Masukan Jumlah uang</label>
            <input name="pembayaran" type="text" class="form-control" id="isi-barcode">
            <input type="hidden" name="total" value="<?php echo $data1['total_stok']; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Bayar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div style="text-align: center;">


    <?php
    if (isset($_GET['kembalian'])) {
      if ($_GET['kembalian'] >= 0) {
        echo '
        <div>
          <P>Kembalian = ' . $_GET['kembalian'] . '</P>
          <a href="cetak.php" target="_BLANK" class="btn btn-primary">Print</a>
          <a href="con_hapus_temp.php" class="btn btn-danger">Clear</a>
        </div>
         ';
      }
    }
    if (isset($_GET['pesan']) == "kurang") {
      if ($_GET['pesan'] == "kurang") {
        echo '
            <div>
              <P>Uang Kurang !!!</P>
            </div>
             ';
      } elseif ($_GET['pesan'] == "tidak") {
        echo '
            <div>
              <P>Barang Tidak Ada</P>
            </div>
             ';
      }
    }
    ?>
  </div>
  <br><br><br>
  <div class="table-container">
    <table class="table" style="background-color: whitesmoke;">
      <thead>
        <tr>
          <th scope=" col">#</th>
          <th scope="col">Barcode</th>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $quary2 = mysqli_query($connect, "SELECT * FROM temp");
        $no = 1;
        while ($data = mysqli_fetch_array($quary2)) {
        ?>
          <tr>
            <td> <?php echo $no++ ?> </td>
            <td> <?php echo $data['id_barang']; ?> </td>
            <td> <?php echo $data['nama']; ?> </td>
            <td> <?php echo $data['harga']; ?> </td>
            <td> <?php echo $data['jumlah']; ?> </td>
            <td>
              <a href=con_TEMPhapus.php?id=<?php echo $data['id_barang']; ?>><input class="btn btn-danger" type="button" value="Hapus" id="tombol-hapus"></a>
            </td>
          </tr>
        <?php } ?>
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