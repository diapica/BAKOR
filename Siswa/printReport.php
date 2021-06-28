<?php 
    error_reporting(0);
    include "../connection.php";
    $username = $_GET['username'];
    $sql = "SELECT tbuser.waktuUpdate, tbregistrasi.* FROM tbregistrasi INNER JOIN tbuser ON tbregistrasi.username = tbuser.username WHERE tbregistrasi.username = '$username'";
    $query = mysqli_query($conn,$sql);
    $re = mysqli_fetch_array($query);
    $tingkatan = ucwords(strtolower($re['tingkatan']));
    $waktuBelajar = ucwords(strtolower($re['waktuBelajar']));
    $statusKelas = ($re['statusKelas'] =='tatap_muka') ? 'Tatap Muka' : 'Online';
    $tanggalDaftar = date('d F Y', strtotime($re['tanggalDaftar']));
    $mandarin = ucwords(strtolower($re['namaMandarin']));
    $indonesia = ucwords(strtolower($re['namaIndonesia']));
    $email = $re['email'];
    $no = $re['noWA'];
    $approved = date('d F Y', strtotime($re['waktuUpdate']))
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
                <table style="width:50%;margin:0 auto;font-size:20px">
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
                        <td width=50%>Tanggal Daftar: </td> <td> <b> <?php echo $tanggalDaftar ?> </b> </td>
                    </tr>
                    <tr>
                        <td width=50%>Tanggal Pendaftaran Disetujui: </td> <td> <b> <?php echo $approved ?> </b> </td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
</body>
</html>