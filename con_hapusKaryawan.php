<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}
include "koneksi.php";

$id = $_GET["id"];

$query = mysqli_query($connect, "DELETE FROM `karyawan` WHERE id_karyawan='$id'");

if ($query) {
    header("location:daftarkaryawan.php");
}
