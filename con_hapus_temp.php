<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}

include "koneksi.php";

$query = mysqli_query($connect, "DELETE FROM `temp`");

if ($query) {
    header("location:index.php");
}
