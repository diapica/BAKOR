<?php 
    error_reporting(0);
    include "../connection.php";
    $username = $_GET['username'];
    $sql = "SELECT tbuser.waktuUpdate, tbregistrasi.*, tbpembayaran.tanggalPembayaran, tbpembayaran.biayaKursus FROM tbregistrasi 
    INNER JOIN tbuser ON tbregistrasi.username = tbuser.username INNER JOIN tbpembayaran 
    ON tbregistrasi.idregistrasi = tbpembayaran.idregistrasi 
    WHERE tbregistrasi.username = '$username' AND tbpembayaran.status = 'diterima'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
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
    $approved = date('d-m-Y', strtotime($re['waktuUpdate']))
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pembayaran1.css">
</head>

<style>
    .box{
        margin-top: -60px;
    }
    img{
        width:96px;
        height:75px;
        margin-left: 120px;
        margin-top: 90px;
    }
    .title{
        width:50%;
        font-size:21px;
        margin-left: 240px;
        margin-right: auto;
        margin-top: -30px;
    }
    table{
        margin-top: 30px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
        <div class="box">
            <div style="align-items:center;">
                <?php 
                    $image = file_get_contents('assets/img/logo.png');
                    // Read image path, convert to base64 encoding
                    $imageData = base64_encode($image);
                ?>
                <div style="width:20%;padding:5px;height:100px;">
                    <img src="data:image;base64, <?php echo $imageData ?>" width="100%" />
                </div>
                <div class="title">
                    <b> BAKORPEND PONTIANAK <br>
                    BUKTI PENDAFTARAN  <br>
                    TAHUN AJARAN <?php echo date('Y',strtotime($approved)) ?> Gelombang <?php echo $gelombang ?>  </b>
                </div>
            </div>
            <center>
            <table class="informasi" style="font-size:20px">
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
                    <td width=50%>Biaya Kursus: </td> <td> <b> Rp. <?php echo number_format((float)$biaya, 0, ',', '.'); ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Bayar: </td> <td> <b> <?php echo $tanggalBayar ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Pembayaran Disetujui: </td> <td> <b> <?php echo $approved ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Daftar: </td> <td> <b> <?php echo $tanggalDaftar ?> </b> </td>
                </tr>
                <tr>
                    <td width=50%>Tanggal Pendaftaran Disetujui: </td> <td> <b> <?php echo $approved ?> </b> </td>
                </tr>
                <tr><td width="70%" colspan="2" style="font-size:12px;"><br><br>Nama tersebut diatas telah diterima sebagai siswa di BAKORPEND Pontianak</td></tr>
                <tr><td width="70%" colspan="2" style="font-size:12px;">dan telah menyetujui syarat dan ketentuan pendaftaran yang berlaku</td></tr>
                <tr><td> <br> Mengetahui</td></tr>
                <tr><td>  ADMIN BAKORPEND Pontianak</td></tr>
            </table>
            </center>
            </div>
        </div>
</body>
</html>