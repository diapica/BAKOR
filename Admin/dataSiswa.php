<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataSiswa.css">
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">
            <div style="display:flex;justify-content:space-between;">
                <h1>View Data Siswa</h1>
                <input type="text" placeholder="search" style="width:250px;">
            </div>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>andi</td>
                        <td>andi@gmail.com</td>
                        <td>Belum Bayar</td>
                        <td>
                            <a href="editSiswa.php"><button class="btn btn-info" style="color:white;">Edit</button></a>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                        <tr>
                        <td>2</td>
                        <td>kevin</td>
                        <td>kevin@gmail.com</td>
                        <td>Sudah Bayar</td>
                        <td>
                            <button class="btn btn-info" style="color:white;">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>nadia</td>
                        <td>nadia@gmail.com</td>
                        <td>Menunggu Konfirmasi</td>
                        <td>
                            <button class="btn btn-info" style="color:white;">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                    </tr>
                </tbody>
            </table>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>