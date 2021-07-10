<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>

    <link rel="stylesheet" href="stylelogin.css">

  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="30" height="24"> BAKORPEND Pontianak
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../home/home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../home/home.php#About">Tentang kami</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" role="button" id="navbarScrollingDropdown" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="../home/home.php#Berita">HSK</a></li>
            <li><a class="dropdown-item" href="../home/home.php#Berita">Kegiatan dan lomba-lomba</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="../home/home.php#Contact">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../home/home.php#Pendaftaran">Pendaftaran</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" href="../Login/Login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="box">
    <div class="row contentform">
      <div class="col-sm 12 col-md-6 col-lg-6">
        <img src="img/logo.png" width="200" height="200">
      </div>

      <div class="col-sm 12 col-md-6 col-lg-6">
        <h4 class="text-center">Welcome</h4>
        <form action="prosesLogin.php" method="POST">
        <p style="color:#ff0000">
        <?php
          if(isset($_GET['pesan'])){
            if($_GET['pesan'] == 'gagal'){
              echo 'username atau password salah! Silahkan masukan ulang!';
            }
          }
        ?>
        </p>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1" require>
          </div>
              <p><input type="checkbox" id="show-password"> Show password</p>
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="../Login/Daftar.php?" class="btn btn-primary" role="button">Daftar</a>
        </form>
      </div>

    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){  
   $('#show-password').click(function(){
    if($(this).is(':checked')){
     $('#password').attr('type','text');
    }else{
     $('#password').attr('type','password');
    }
   });
  });
 </script>

<div class="footer">
  <p>© 2021 Copyright:<a class="text-reset fw-bold" href="../Home/home.html"> BAKORPEND Pontianak.com</a></p>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>
