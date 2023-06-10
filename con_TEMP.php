<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
    exit;
}

include "koneksi.php";

$barcode = $_POST["barcode"];
$jumlah = $_POST["jumlah"];



$query = mysqli_query($connect, "SELECT * FROM barang WHERE id_barang = '$barcode'");
if ($data = mysqli_fetch_array($query)) {
    //echo "Load dari barang berhasil";
    $nama  = $data["nama"];
    $harga = $data["harga"];
    $temp = $harga * $jumlah;
    $query1 = mysqli_query($connect, "SELECT * FROM temp WHERE id_barang = '$barcode'");
    if ($data = mysqli_fetch_row($query1) == NULL) {
        //echo "temp null";
        $query = mysqli_query($connect, "INSERT INTO `temp`(`id_barang`, `nama`, `harga`, `jumlah`, `total`) VALUES ('$barcode','$nama','$harga','$jumlah', '$temp')");
        if ($query) {
            //echo "acc";
            header("location:index.php");
            exit;
        }
    } else {
        $query1 = mysqli_query($connect, "SELECT * FROM temp WHERE id_barang = '$barcode'");
        if ($data1 = mysqli_fetch_array($query1)) {
            //echo "Error";
            $jumlah = $jumlah + $data1["jumlah"];
            $temp = $jumlah * $harga;
            $query2 = mysqli_query($connect, "UPDATE `temp` SET `jumlah`='$jumlah',`total`='$temp' WHERE id_barang = '$barcode'");
            if ($query2) {
                header("location:index.php");
                exit;
            } else {
                //echo "load temp gagal";
            }
        }
    }
} else {
    header("location:index.php?pesan=tidak");
    exit;
}
