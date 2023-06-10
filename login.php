<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Berkah</title>
  <link rel="icon" href="image/salary.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
</head>
<style>
  html,
  body {
    height: 100%;
    background-color: #222d32 !important;
  }

  .btn-login {
    
    background-color: #90EE90;
  }
</style>


<body>
  <div class="global-container">
    <div class="card login-form">
      <div class="card-body">
        <h1 class="card-title text-center">Login</h1>
      </div>
      <div class="card-text">
        <form method="POST" action="con_ceklogin.php">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" id="form-email">Email address</label>
            <input name="user" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" id="form-pw">Password</label>
            <input name="pass" type="password" class="form-control" id="exampleInputPassword1" required>
          </div>
          <?php
          error_reporting(0);
          if ($_GET['pesan'] == "gagal") {
            echo '
            <div>
              <P style="color: white;">Login Gagal</P>
            </div>
             ';
          } elseif ($_GET['pesan'] == "belum") {
            echo '
            <div>
              <P style="color: white;">Anda Belum Login</P>
            </div>
             ';
          } else {
            $_GET['pesan'] = "a";
          }
          error_reporting(1);
          ?>
          <button type="submit" class="btn btn-login btn-primary">Login</button>
        </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>