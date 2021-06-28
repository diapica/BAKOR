<?php 
    error_reporting(0);
    include "../connection.php";
    $username = $_GET['username'];
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
<body>
        <div class="box">
                <p style="font-size:30px;" class="text-center">Bukti Pendaftaran</p>
                <table style="width:100%;padding:20px;">
                    <tr>
                        <td style="font-size:17px;height:50px;width:100px;">Tingkatan : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $tingkatan ?>,</td>
                        <td style="font-size:17px;height:50px;width:100px;">Waktu Belajar : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $waktuBelajar ?>,</td>
                        <td style="font-size:17px;height:50px;">Status Kelas : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $statusKelas ?></td>
                        <td style="font-size:17px;height:50px;">Tanggal Daftar : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $tanggalDaftar ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:17px;height:50px;" colspan="2">Username : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $username ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:17px;height:50px;" colspan="2">Nama Mandarin : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $mandarin ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:17px;height:50px;" colspan="2">Nama Indonesia : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $indonesia ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:17px;height:50px;" colspan="2">Alamat Email : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $email ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:17px;height:50px;" colspan="2">No. WA : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $no ?></td>
                    </tr>
                    <tr>
                        <td style="font-size:17px;height:50px;" colspan="2">Pendaftaran disetujui : </td>
                        <td style="font-size:17px;height:50px;"><?php echo $approved ?></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
</body>
</html>