<?php

session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
}

include "koneksi.php";

$pembayaran = $_POST['pembayaran'];
$totalker = $_POST['total'];
if ($totalker > $pembayaran) {
    header("location:index.php?pesan=kurang");
} else {

    $id_gent = 1;
    $queryGetIdnota = mysqli_query($connect, "SELECT MAX(id_nota) AS max_id FROM notulen");
    if (($data = mysqli_fetch_array($queryGetIdnota)) != null) {
        $id_gent = $data["max_id"] + 1;
    } else {
        $id_gent = 1;
    }
    $kembali = $pembayaran - $totalker;
    $_SESSION['kembali'] = $kembali;
    $query = mysqli_query($connect, "SELECT * FROM temp");
    while ($data = mysqli_fetch_array($query)) {
        $id  = $data["id_barang"];
        $nama  = $data["nama"];
        $harga = $data["harga"];
        $jumlah = $data["jumlah"];
        $total = $data["total"];
        $query2 = mysqli_query($connect, "SELECT * FROM barang where id_barang='$id'");
        if ($data2 = mysqli_fetch_array($query2)) {
            $TEMPjumlah = $data2["jumlah"] - $jumlah;
            $query3 = mysqli_query($connect, "UPDATE `barang` SET `jumlah`='$TEMPjumlah' WHERE id_barang='$id'");
        }
        if ($query3) {
            $tanggal = date('Y-m-d H:i:s');
            $query4 = mysqli_query($connect, "INSERT INTO `notulen`(`id_nota`,`id_barang`, `nama_barang`, `tanggal`, `jumlah`, `harga`) VALUES ('$id_gent','$id','$nama','$tanggal','$jumlah','$total')");
        }
        if ($query4) {
            //echo "data berhasil di upload ke notulen";
        }
    }
    header("location:index.php?kembalian=" . $kembali);
}
