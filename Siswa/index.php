<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
<?php
$username = $_SESSION['username'];
include "../connection.php";
?>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">

          <?php
            $sql = "select * from tbuser where username='$username'";
            $query = mysqli_query($conn,$sql);
            $re = mysqli_fetch_array($query);
            if($re['status_register'] == "a"){
          ?>
            <div class="belum">
                <p><b>Welcome</b></p>
                <p><?php echo $username ?></p>
                <p>Silahkan mengisi form pendaftaran!</p>
                <a href="pendaftaran.php"><button class="btn btn-danger" style="color:white;">Form Pendaftaran</button></a>
            </div>
           <?php }else if($re['status_register'] == 'b'){?>
            <div class="proses">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/load.gif" alt="load">
                </div>
                <p>Pendaftaran telah selesai! Menunggu Konfirmasi!</p>
                <a href="pendaftaran.php"><button class="btn btn-info btn-lg" style="color:white;margin-top:20px;">Edit Data</button></a>
            </div>
            
            <?php }else if($re['status_register'] == 'c'){ ?>
                <div class="proses">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/load.gif" alt="load">
                </div>
                <p>Pendaftaran telah diterima! </p> 
                <p>Silahkan lakukan <a href="../Siswa/pembayaran.php">Pembayaran!</a></p>
            </div>
            <?php }else if($re['status_register'] == 'd'){ ?>
            <div class="ditolak">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/multiply.png" alt="check">
                </div>
                <p>Data Invalid</p>
                <p><u>Mohon Registrasi Kembali</u></p>
                <button class="btn btn-danger" style="color:white" onclick="changeStatus(<?php echo "'$username','daftar'" ?>)">Klik disini</button>
                <p style="margin-top:20px;font-size:15px;color:red;"><?php echo $re['komentar'] ?></p>
            </div>
            <?php }else if($re['status_register'] == 'e'){ ?>
                <div class="proses">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/load.gif" alt="load">
                </div>
                <p>Pembayaran diterima! Menunggu Konfirmasi!</p>
            </div>
            <?php }else if($re['status_register'] == 'f'){?>
            <div class="diterima">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/check.png" alt="check">
                </div>
                <p>Pendaftaran Selesai</p>
                <a href="buktiPendaftaran.php"><button class="btn btn-info" style="color:white;font-size:30px;margin-top:20px;">Bukti Pendaftaran</button></a>
            </div>
            <?php }else if($re['status_register'] == 'g'){?>
            <div class="ditolak">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/multiply.png" alt="check">
                </div>
                <p>Pembayaran tidak sesuai!</p>
                <p><u>Silahkan hubungi admin!</u></p>
            </div>
            <?php }else if($re['status_register'] == 'g'){ ?>
            <div class="ditolak">
                <p>Status Siswa</p>
                <div class="img">
                    <img src="assets/img/multiply.png" alt="check">
                </div>
                <p>Pembayaran Ditolak</p>
                <p><u>Hubungi Admin</u></p>
                <button class="btn btn-danger" style="color:white;" onclick="changeStatus(<?php echo "'$username','bayar'" ?>)">Klik disini</button>
            </div>
            <?php } ?>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>

<script>
    function changeStatus(username,status){
        location.href = "changeStatus.php?username="+username+"&status="+status;
    }

    function editDataSiswa(username){
        location.href = "pendaftaran.php?username="+username;
    }
</script>