<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">
            <!-- <div class="belum">
                <p><b>Welcome</b></p>
                <p>Nama Username</p>
                <p>Silahkan mengisi form pendaftaran!</p>
                <button>Form Pendaftaran</button>
            </div> -->
            <!-- <div class="proses">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/load.gif" alt="load">
                </div>
                <p>Pendaftaran sedang di proses</p>
            </div> -->
            <!-- <div class="diterima">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/check.png" alt="check">
                </div>
                <p>Pendaftaran Selesai</p>
            </div> -->
            <div class="ditolak">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/multiply.png" alt="check">
                </div>
                <p>Data tidak Valid</p>
                <p><u>Mohon Registrasi Kembali</u></p>
                <button>Klik disini</button>
            </div>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>