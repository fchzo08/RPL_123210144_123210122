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
  <title>Stock - Berkah</title>
  <link rel="icon" href="image/salary.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>


<style>
  body {
    background-color: #90EE90;
  }

  #cek {
    margin-left: 9px;
    margin-top: 75px;
  }

  .table-container {
    margin-left: 35px;
    margin-right: 35px;
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
            <a class="nav-link " href="index.php">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="input.php">Input Barang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">Stock</a>
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

  <?php
  include "koneksi.php";
  $queryM = mysqli_query($connect, "SELECT * FROM barang WHERE jumlah<5");
  $row = mysqli_fetch_row($queryM);
  if ($row != null) {
    echo '<div class="alert alert-danger" role="alert">
    Stok Barang Tinggal sedikit !!<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-left:30px;">
      Cek Barang
    </button>
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">
  </div>';
  }
  ?>
  <form method="get" action="stock.php">
    <div class="container-fluid">
      <div class="row">
        <div class="col-auto">
          <label for="inputEmail4" class="form-label">Barcode</label>
          <input name="cari" type="number" class="form-control" id="isi-barcode">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary btn-lg" id="cek">Cek</button>
        </div>
      </div>
    </div>
  </form>
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cek Barang</h4>
        </div>
        <div class="modal-body">
          <?php
          $queryM = mysqli_query($connect, "SELECT * FROM barang WHERE jumlah<5");
          $nom = 1;
          while ($datam = mysqli_fetch_array($queryM)) { ?>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4">
                  <p><?= $nom++ . ". " . $datam['nama'] . " = " . $datam['jumlah'] ?></p>
                </div>
                <div class="col-md-4">
                  <a href="edit_stok.php?id=<?php echo $datam['id_barang']; ?>" class="btn btn-primary">Edit</a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <br><br><br>
  <div class="table-container">
    <table class="table" style="background-color: whitesmoke;">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Barcode</th>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col" colspan="2">Action</th>
        </tr>

      </thead>
      <tbody>
        <?php
        if (isset($_GET['cari'])) {
          $quary = mysqli_query($connect, "SELECT * FROM barang WHERE id_barang LIKE '%" . $_GET['cari'] . "%'");
        } else {
          $quary = mysqli_query($connect, "SELECT * FROM barang");
        }
        $no = 1;
        while ($data = mysqli_fetch_array($quary)) {
        ?>
          <tr>
            <td> <?php echo $no++ ?> </td>
            <td> <?php echo $data['id_barang']; ?> </td>
            <td> <?php echo $data['nama']; ?> </td>
            <td> <?php echo $data['harga']; ?> </td>
            <td> <?php echo $data['jumlah']; ?> </td>
            <td>
              <a href=edit_stok.php?id=<?php echo $data['id_barang']; ?>><input class="btn btn-primary" type="button" value="Edit"></a>
              <a href=con_hapus.php?id=<?php echo $data['id_barang']; ?>><input class="btn btn-danger" type="button" value="Hapus"></a>
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