<?php
session_start();
if (empty($_SESSION['email'])) {
  header("location:login.php?pesan=belum");
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Input Karyawan - Berkah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  body {
    background-color: #90EE90;
  }

  .btn {
    margin-left: 35px;
    margin-top: 10px;
  }

  .form-control {
    width: 350px;
  }



  #nama-belakang {
    margin-left: 190px;
  }

  #label-nama-belakang {
    margin-left: 190px;
  }

  #label-nama-depan {
    margin-left: 35px;
  }

  #nama-depan {
    margin-left: 35px;
  }

  #label-email {
    margin-left: 35px;
  }

  #exampleFormControlInput1 {
    margin-left: 35px;
  }

  #label-password {
    margin-left: 35px;
  }

  #inputPassword5 {
    margin-left: 35px;
  }

  #passwordHelpBlock {
    margin-left: 35px;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">Toko Berkah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftarkaryawan.php">Daftar Karyawan</a>
          </li>
        </ul>
        <span class="navbar-text">
          <a class="nav-link active" aria-current="page" href="index.php">Kembali</a>
        </span>
      </div>
    </div>
  </nav>
  <form method="POST" action="con_inputKaryawan.php">
    <div class="col-md-2">
      <label for="validationCustom01" class="form-label" id="label-nama-depan">Nama</label>
      <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" aria-label="First name" id="nama-depan" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label" id="label-email">Email address</label>
      <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
    </div>
    <label for="inputPassword5" class="form-label" id="label-password">Password</label>
    <input name="password" type="password" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" required>
    <div id="passwordHelpBlock" class="form-text">
      Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Input</button>
  </form>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>