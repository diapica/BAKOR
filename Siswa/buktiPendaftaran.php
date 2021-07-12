<?php 
    session_start();
    include "../connection.php";
    $username = $_SESSION['username'];
    $sql = "SELECT tbuser.waktuUpdate, tbregistrasi.*, tbpembayaran.tanggalPembayaran, tbpembayaran.biayaKursus, 
    tbpembayaran.idpembayaran FROM tbregistrasi 
    INNER JOIN tbuser ON tbregistrasi.username = tbuser.username INNER JOIN tbpembayaran 
    ON tbregistrasi.idregistrasi = tbpembayaran.idregistrasi 
    WHERE tbregistrasi.username = '$username' AND tbpembayaran.status = 'diterima'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);

    $idRegistrasi = $re['idregistrasi'];
    $idPembayaran = $re['idpembayaran'];
    $tingkatan = ucwords(strtolower($re['tingkatan']));
    $waktuBelajar = ucwords(strtolower($re['waktuBelajar']));
    $statusKelas = ($re['statusKelas'] =='tatap_muka') ? 'Tatap Muka' : 'Online';
    $tanggalDaftar = date('d-m-Y', strtotime($re['tanggalDaftar']));
    $mandarin = ucwords(strtolower($re['namaMandarin']));
    $indonesia = ucwords(strtolower($re['namaIndonesia']));
    $email = $re['email'];
    $biaya = $re['biayaKursus'];
    $tanggalBayar = date('d-m-Y', strtotime($re['tanggalPembayaran']));
    $no = $re['noWA'];
    $gelombang = $re['gelombang'];
    $approved = date('d-m-Y', strtotime($re['waktuUpdate']));
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
    <link rel="stylesheet" href="assets/css/pembayaran.css">
</head>
<body>
    <?php include "header.php";?>
      <div class="content-1">
        <?php include "sidebar.php" ?>
        <div class="content">
            <div style="display:flex;align-items:center;width:50%;">
                <div style="width:20%;padding:5px 10px 5px 5px;">
                     <img src="assets/img/logo.png" alt="logoo" width="106px" height="84px">
                </div>
                <div style="width:80%;padding:20px 20px 20px 5px;font-size:21px">
                    <b>
                    BAKORPEND PONTIANAK </br>
                    BUKTI PENDAFTARAN </br>
                    TAHUN AJARAN <?php echo date('Y',strtotime($approved)) ?> Gelombang <?php echo $gelombang ?> </b>
                </div>
            </div>
            <table class="informasi" style="width:50%;font-size:18px">
                <tr>
                    <td width=50%>Username: </td> <td> <b> <?php echo $username ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Nama Indonesia: </td> <td> <b> <?php echo $indonesia ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Nama Mandarin: </td> <td> <b> <?php echo $mandarin ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Email: </td> <td> <b> <?php echo $email ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>No. WA: </td> <td> <b> <?php echo $no ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tingkatan: </td> <td> <b> <?php echo $tingkatan ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Waktu Belajar: </td> <td> <b> <?php echo $waktuBelajar ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Status Kelas: </td> <td> <b> <?php echo $statusKelas ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>No Bukti Pembayaran: </td> <td> <b> BP-<?php echo $idPembayaran ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Biaya Kursus: </td> <td> <b> Rp. <?php echo number_format((float)$biaya, 0, ',', '.'); ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Bayar: </td> <td> <b> <?php echo $tanggalBayar ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Pembayaran Disetujui: </td> <td> <b> <?php echo $approved ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>No Pendaftaran: </td> <td> <b> NP-<?php echo $idRegistrasi ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Daftar: </td> <td> <b> <?php echo $tanggalDaftar ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Pendaftaran Disetujui: </td> <td> <b> <?php echo $approved ?> </b> </td>
                </tr>
                <tr height="40px"></tr>
                <tr><td width="65%" style="font-size:12px;">Nama tersebut diatas telah diterima sebagai siswa di BAKORPEND Pontianak</td></tr>
                <tr><td width="65%" style="font-size:12px">dan telah menyetujui syarat dan ketentuan pendaftaran yang berlaku</td></tr>
                <tr height="20px"></tr>
                <tr><td>  Mengetahui</td></tr>
                <tr></tr>
                <tr><td>  ADMIN BAKORPEND Pontianak</td></tr>
            </table>
            <form action="../print.php" method="GET" style="margin-bottom:70px;">
                    <input type="hidden" name="status" value="bukti">
                    <input type="hidden" name="username" value="<?php echo $username ?>">
                    <button type="submit" class="btn btn-danger">PRINT BUKTI PENDAFTARAN</button>
            </form>
        </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>