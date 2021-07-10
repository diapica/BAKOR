<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Daftar</title>

    <link rel="stylesheet" href="styledaftar.css">

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

<div class="box">
    <div class="row justify-content-center text-center">
      <div class="col-1-7"></div>
        <div class="card p-5 shadow-lg border-0">
            <img src="img/logo.png" width="200" height="200" alt="daftar" class="mx-auto" >
            <h3>Register</h3>
            <form action="prosesDaftar.php" method="POST">
            <p style="color:red;">
            
            <?php

              if(isset($_GET['pesan'])){
                if($_GET['pesan'] == 'gagal'){
                  echo "Password tidak sesuai!";
                }else if($_GET['pesan'] == 'username'){
                  echo "Username sudah digunakan! Silahkan ganti!";
                }else if($_GET['pesan'] == 'berhasil'){
                  echo "Berhasil Daftar!";
                }
              }
            
            ?>
            
            </p>
              <div class="form-group mb-3">
                <input type="text" name="username" id="username" placeholder="Username">
              </div> 
              <div class="form-group mb-3">
                <input type="email" name="email" id="email"  placeholder="Email-address">
              </div> 
              <div class="form-group mb-3">
                <input type="password" name="password" id="password" placeholder="Password">
              </div> 
              <div class="form-group mb-3">
                <input type="password" name="konfirmpassword" id="konfirmpassword" placeholder="Konfirm password">
              </div>
              <p><input type="checkbox" id="show-password"> Show password</p>
              <input class="btn btn-primary" type="submit" value="Submit">
              <a class="btn btn-primary" href="../Login/Login.php" role="button">Login</a>
            </form>
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

 <script>
  $(document).ready(function(){  
   $('#show-password').click(function(){
    if($(this).is(':checked')){
     $('#konfirmpassword').attr('type','text');
    }else{
     $('#konfirmpassword').attr('type','password');
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
