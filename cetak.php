<?php

session_start();
if (empty($_SESSION['email'])) {
    header("location:login.php?pesan=belum");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/salary.png">
    <title>Print</title>
</head>

<body>
    <H3>Toko Berkah</H3>
    <br>
    <p>Tanggal : </p><?php echo $currentDateTime = date("Y-m-d H:i:s"); ?>
    <p>========================</p>
    <table>
        <?php
        include "koneksi.php";
        $query = mysqli_query($connect, "SELECT * FROM temp");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['jumlah']; ?></td>
                <td><?= "@" . $data['harga']; ?></td>
                <td><?= $data['total']; ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
    <p>========================</p>
    <?php
    $quary1 = mysqli_query($connect, "SELECT SUM(total) AS total_stok FROM temp");
    if ($data1 = mysqli_fetch_array($quary1)) {
        $total = $data1['total_stok'];
    }
    ?>
    <p> Total : <?= $total ?></p>
    <p> Kembalian : <?= $_SESSION['kembali'];
                    include "koneksi.php";

                    $query = mysqli_query($connect, "DELETE FROM `temp`");

                    if ($query) {
                    }
                    ?></p>
    <p>TerimaKasih</p>
    <p>atas kunjungan anda</p>
    <script>
        window.print();
    </script>

</body>

</html>