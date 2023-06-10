<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}

include "koneksi.php";

$barcode = $_POST["kode"];
$harga = $_POST["harga"];
$jumlah = $_POST["stok"];
$jumlahawal = $_POST["stokawal"];
$jumlah = $jumlah + $jumlahawal;

$query = mysqli_query($connect, "UPDATE `barang` SET `harga`='$harga',`jumlah`='$jumlah' WHERE id_barang='$barcode'");
if ($query) {
    header("location:stock.php");
}
