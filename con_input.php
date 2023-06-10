<?php

session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}
include "koneksi.php";

$barcode = $_POST["barcode"];
$nama = $_POST["nama"];
$harga = $_POST["harga"];
$stok = $_POST["stok"];

$query = mysqli_query($connect, "INSERT INTO `barang`(`id_barang`, `nama`, `harga`, `jumlah`) VALUES ('$barcode','$nama','$harga','$stok')");

if ($query) {
    header("location:input.php?pesan=berhasil");
} else {
    header("location:input.php?pesan=gagal");
}
