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
    <title>Kasir</title>
    <link rel="icon" href="image/salary.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: #90EE90;
    }

    .btn {
        margin-top: 10px;
        margin-left: 30px;
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
                        <a class="nav-link active" aria-current="page">Input Barang</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <a class="nav-link active" aria-current="page" href="stock.php">Kembali</a>
                </span>
            </div>
        </div>
    </nav>

    <?php
    include "koneksi.php";

    $id = $_GET['id'];
    $query =  mysqli_query($connect, "SELECT * FROM barang WHERE id_barang='$id'");
    while ($data = mysqli_fetch_array($query)) {
        $id = $data['id_barang'];
        $nama = $data['nama'];
        $harga = $data['harga'];
        $jumlah = $data['jumlah'];
    }

    ?>
    <form method="POST" action="con_Edit_input.php">
        <div class="barcode-inputan">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Barcode</label>
                <input value="<?= $id ?>" name="kode" type="text" class="form-control" id="isi-barcode" disabled>
                <input value="<?= $id ?>" name="kode" type="hidden" class="form-control" id="isi-barcode">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="nama-barang">
                    <label for="inputEmail4" class="form-barang" style="margin-top: 80px;" >Nama Barang</label>
                    <input value="<?= $nama ?>" name="nama" type="text" class="form-control" id="kotak-nama" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="harga-barang">
                    <label for="inputEmail4" class="form-harga">Harga Barang</label>
                    <input value="<?= $harga ?>" name="harga" type="number" class="form-control" id="kotak-harga">
                </div>
            </div>
            <div class="col-md-4">
                <div class="stok-barang">
                    <label for="inputEmail4" class="form-stok">Jumlah Stok yang mau ditambah Sisa : <?= $jumlah ?></label>
                    <input value="<?= $jumlah ?>" name="stokawal" type="hidden" class="form-control" id="kotak-stok">
                    <input name="stok" type="number" class="form-control" id="kotak-stok">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg">Tambah</button>
    </form>
    <div style="text-align: center;">
        <?php
        if (isset($_GET["pesan"]) == "berhasil") {
            echo "<h1>Input Barang Berhasil</h1>";
        } elseif (isset($_GET["pesan"]) == "gagal") {
            echo "<h1>Input Barang Berhasil</h1>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>