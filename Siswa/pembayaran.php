<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pembayaran1.css">
</head>
<body>
    <?php
    include "header.php";
    include "../connection.php";
    $username = $_SESSION['username'];
    $sql = "select idregistrasi from tbregistrasi where username = '$username'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
    $idregister = $re['idregistrasi'];
    $dateTime = Date('m/d/Y');
    ?>
      <div class="content-1">
        <?php include "sidebar.php" ?>
        <div class="content">
            <p>Informasi Biaya Kursus</p>    
            <a href="https://wa.me/081253253882" target="_blank"><button class="btn btn-lg btn-info button">Informasi</button></a>
            <form action="pembayaran_save.php" method="POST" enctype="multipart/form-data" style="width:100%;">
                <p>Lampirkan Bukti Bayar</p>
                <input type="hidden" name="username" value="<?php echo $username ?>">
                <input type="hidden" name="idregister" value="<?php echo $idregister ?>">
                <input type="hidden" name="tanggalPembayaran" value="<?php echo $dateTime ?>">
                <input type="file" name="image" class="form-control" style="width:40%">
                <input type="submit" class="btn btn-lg btn-info button"></button>
            </form>
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>