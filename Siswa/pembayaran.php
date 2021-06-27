<?php 
    session_start();
    include "../connection.php";
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM tbregistrasi WHERE username = '$username'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
    $idregister = $re['idregistrasi'];
    $waktuBelajar = $re['waktuBelajar'];
    $tingkatan = $re['tingkatan'];
    $statusKelas = $re['statusKelas'];
    $dateTime = Date('m/d/Y');
    $keterangan = "Kelas belum dibuka, silahkan hubungi <a href='https://wa.me/081253253882' target='_blank'>admin</a>";
    $total = "RP 0";

    if($statusKelas == 'tatap_muka'){
        if($waktuBelajar == 'pagi') {
            if($tingkatan == 'dasar'){
                $keterangan = "RP 6.500.000 + RP 330.000 UANG BUKU";
                $total = "RP 6.830.000";
            }else{
                $keterangan = "RP 6.700.000 + RP 450.000 UANG BUKU";
                $total = "RP. 7.150.000";
            }
        }else{
            if($tingkatan == 'dasar'){
                $keterangan = "RP 6.700.000 + RP 330.000 UANG BUKU";
                $total = "RP 7.030.000";
            }else{
                $keterangan = "RP 6.900.000 + RP 450.000 UANG BUKU";
                $total = "RP. 7.350.000";
            }
        }
    }else if($statusKelas == 'online'){
        if($waktuBelajar == 'sore') {
            if($tingkatan == 'dasar'){
                $keterangan = "RP 4.500.000 + RP 200.000 UANG BUKU";
                $total = "RP 4.700.000";
            }else{
                $keterangan = "RP 6.900.000 + RP 450.000 UANG BUKU";
                $total = "RP. 7.350.000";
            }
        }
    }
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
            <p>Informasi Biaya Kursus</p>    
            <span>
                <center>
                    Pembayaran dilakukan melalui transfer ke Nomor Rekening <b>BCA</b> <br>
                    a.n. YAY. PENDIDIKAN BAHASA TIONGHOA KALBAR <b>029 900 9971</b>  <br> 
                    (Cantumkan nama dan kelas untuk mempermudah pengecekan) <br>
                    Biaya: <?php echo $keterangan?>.  <br> 
                    Total: <b> <?php echo $total ?> </b>
                </center>   
            </span>
            <form action="pembayaran_save.php" method="POST" enctype="multipart/form-data" style="width:100%;">
                <p>Lampirkan Bukti Bayar</p>
                <input type="hidden" name="username" value="<?php echo $username ?>">
                <input type="hidden" name="idregister" value="<?php echo $idregister ?>">
                <input type="hidden" name="tanggalPembayaran" value="<?php echo $dateTime ?>">
                <input type="file" required name="image" class="form-control" style="width:40%">
                <input type="submit" class="btn btn-lg btn-info button"></button>
            </form>
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>