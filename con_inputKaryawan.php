<?php

session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}
include "koneksi.php";

$nama = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = mysqli_query($connect, "INSERT INTO `karyawan`(`nama`, `email`, `password`) VALUES ('$nama','$email','$password')");

if ($query) {
    header("location:daftarkaryawan.php");
} else {
    echo "GAGAL";
}
