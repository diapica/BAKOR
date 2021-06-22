<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/laporan.css">
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">
            <h1>Cetak Laporan</h1>
            <div class="atas">
                <a href="laporan_siswa.php"><button class="btn btn-lg btn-info">Laporan Daftar Siswa</button></a>
            </div>
            <div class="atas">
                <a href="laporan_pembayaran.php"><button class="btn btn-lg btn-info">Laporan Pembayaran Siswa</button></a>
            </div>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>