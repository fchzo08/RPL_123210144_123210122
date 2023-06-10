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
  <title>Daftar Karyawan - Berkah</title>
  <link rel="icon" href="image/salary.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #90EE90;
  }

  .karyawan {
    margin-left: -180px;
    margin-top: 35px;
    font-weight: lighter;
  }

  #tombol-input {
    margin-top: 35px;
    margin-left: 35px;
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
            <a class="nav-link active" aria-current="page">Daftar Karyawan</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link active" aria-current="page" href="index.php">Kembali</a>
        </span>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <a href="inputkaryawan.php"><input class="btn btn-primary btn-lg" type="button" value="Input Data Karyawan" id="tombol-input"></a>
      </div>
      <div class="col-md-6">
        <div class="karyawan">
          <h1>Daftar karyawan</h1>
        </div>
      </div>
    </div>
  </div>

  <br><br><br>
  <div class="table-container">
    <table class="table" style="background-color: whitesmoke;">
      <thead class=" table">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $quary = mysqli_query($connect, "SELECT * FROM karyawan");
        $no = 1;
        while ($data = mysqli_fetch_array($quary)) {
        ?>
          <tr>
            <td> <?php echo $no++ ?> </td>
            <td> <?php echo $data['nama']; ?> </td>
            <td> <?php echo $data['email']; ?> </td>
            <td>
              <a href=con_hapusKaryawan.php?id=<?php echo $data['id_karyawan']; ?>><input class="btn btn-primary" type="button" value="Hapus"></a>
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