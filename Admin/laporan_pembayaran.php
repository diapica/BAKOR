<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/laporanPembayaran.css">
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">
            <h1>Cetak Laporan</h1>
              <div class="table">
                <p>Laporan daftar Pembayaran BAKORPEND PONTIANAK Tingkat Sore Online Tahun 2021</p>
                <table class="table text-center">
                    <thead class="thead">
                        <tr class="align-middle">
                            <th rowspan="2">No</th>
                            <th colspan="2">Nama</th>
                            <th rowspan="2">Tanggal Pembayaran</th>
                            <th rowspan="2">Jumlah</th>
                        </tr>
                        <tr>
                            <th>Mandarin</th>
                            <th>Indonesia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Andi</td>
                        <td>Andi</td>
                        <td>25 Mei 2020</td>
                        <td>10000000</td>
                    </tbody>
                </table>
            </div>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>