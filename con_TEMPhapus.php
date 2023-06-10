<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}

include "koneksi.php";

$id = $_GET["id"];

$query = mysqli_query($connect, "DELETE FROM `temp` WHERE id_barang='$id'");

if ($query) {
    header("location:index.php");
}
