<?php
session_start();

include "koneksi.php";

$email = $_POST['user'];
$pass = $_POST['pass'];

$query = mysqli_query($connect, "SELECT * FROM karyawan WHERE email = '$email' and password = '$pass'");
while ($data = mysqli_fetch_array($query)) {
    $name = $data['nama'];
}
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    $_SESSION['email'] = $name;
    header("location:index.php");
} else {
    header("location:login.php?pesan=gagal");
}
