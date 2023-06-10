<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}

include "koneksi.php";

$id = $_POST['id_barang'];
$jumlah = $_POST['jumlah'] + $_POST['update'];

$query = mysqli_query($connect, "UPDATE `barang` SET `jumlah`='$jumlah' WHERE id_barang='$id'");
if ($query) {
    header("location:stock.php?pesan=berhasil");
}
