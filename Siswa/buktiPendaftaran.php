<?php 
    session_start();
    include "../connection.php";
    $username = $_SESSION['username'];
    $sql = "SELECT tbuser.waktuUpdate, tbregistrasi.* FROM tbregistrasi INNER JOIN tbuser ON tbregistrasi.username = tbuser.username WHERE tbregistrasi.username = '$username'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
    $tingkatan = $re['tingkatan'];
    $waktuBelajar = $re['waktuBelajar'];
    $statusKelas = $re['statusKelas'];
    $tanggalDaftar = $re['tanggalDaftar'];
    $mandarin = $re['namaMandarin'];
    $indonesia = $re['namaIndonesia'];
    $email = $re['email'];
    $no = $re['noWA'];
    $approved = $re['waktuUpdate'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pembayaran1.css">
</head>
<body>
    <?php include "header.php";?>
      <div class="content-1">
        <?php include "sidebar.php" ?>
        <div class="content">
            <p>Bukti Pendaftaran</p>    
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:110px;">Tingkatan : </p>
                <p style="font-size:20px;margin:none;margin-right:10px;color:red;"><?php echo $tingkatan ?>,</p>
                <p style="font-size:20px;width:140px;">Waktu Belajar : </p>
                <p style="font-size:20px;margin:none;margin-right:10px;color:red;"><?php echo $waktuBelajar ?>,</p>
                <p style="font-size:20px;width:130px;">Status Kelas : </p>
                <p style="font-size:20px;margin:none;margin-right:10px;color:red"><?php echo $statusKelas ?>,</p>
                <p style="font-size:20px;width:150px;">Tanggal Daftar : </p>
                <p style="font-size:20px;margin:none;color:red;"><?php echo $tanggalDaftar ?></p>
            </div>
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:250px;">username : </p>
                <p style="font-size:20px;margin:none"><?php echo $username ?></p>
            </div>
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:250px;">Nama Mandarin : </p>
                <p style="font-size:20px;margin:none"><?php echo $mandarin ?></p>
            </div>
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:250px;">Nama Indonesia : </p>
                <p style="font-size:20px;margin:none"><?php echo $indonesia ?></p>
            </div>
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:250px;">Alamat Email : </p>
                <p style="font-size:20px;margin:none"><?php echo $email ?></p>
            </div>
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:250px;">No. WA : </p>
                <p style="font-size:20px;margin:none"><?php echo $no ?></p>
            </div>
            <div class="informasi" style="width:70%;padding:10px;display:flex;">
                <p style="font-size:20px;width:250px;">Pendaftaran disetujui : </p>
                <p style="font-size:20px;margin:none;color:red;"><?php echo $approved ?></p>
            </div>
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>