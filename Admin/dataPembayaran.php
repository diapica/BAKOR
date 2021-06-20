<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataPembayaran.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">
            <div style="display:flex;justify-content:space-between;">
                <h1>View Data Pembayaran</h1>
                <input type="text" id="search" placeholder="search" style="width:250px;">
            </div>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Bukti Bayar</th>
                        <th>Biaya Kursus</th>
                        <th>Tanggal Bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                <?php 

                    include "../connection.php";
                    $sql = "select tbregistrasi.username,tbregistrasi.email,tbregistrasi.namaIndonesia,tbpembayaran.buktiPembayaran,tbpembayaran.biayaKursus,tbpembayaran.tanggalPembayaran,tbregistrasi.idregistrasi,tbpembayaran.idpembayaran from tbpembayaran inner join tbregistrasi on tbpembayaran.idregister = tbregistrasi.idregistrasi";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_num_rows($query);

                    for($x = 1 ; $x <= $row; $x++){
                        $re = mysqli_fetch_array($query);
                        $username = $re[0];
                        $email = $re[1];
                        $nama = $re[2];
                        $bukti = $re[3];
                        $biaya = $re[4];
                        $tanggal = $re[5];
                        $idregis = $re[6];
                        $id = $re[7];
                        $sql1 = "select status_register from tbuser where username = '$username'";
                        $query1 = mysqli_query($conn,$sql1);
                        $re = mysqli_fetch_array($query1);
                        $status = $re['status_register'];
                ?>
                    <tr class="align-middle">
                        <td><?php echo $x ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $nama ?></td>
                        <td><?php echo $email ?></td>
                        <td style="width:200px"><img onclick="goImage(<?php echo "'$bukti'" ?>)" src="../siswa/<?php echo $bukti ?>" style="width:100%"></td>
                        <td><?php echo $biaya ?></td>
                        <td><?php echo $tanggal ?></td>
                        <td>
                            <?php if($status == 'e'){ ?>
                            <button style="color:white" class="btn btn-info" onclick="konfirmasi(<?php echo "'$username','$id'" ?>)">Konfirmasi</button>
                            <?php } ?>
                            <button class="btn btn-danger" onclick="deleteData(<?php echo "'$id','$username'" ?>)">Hapus</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
          </div>
      </div>
      <div class="footer fixed-bottom">
          <p>&#169;2021 Copyright: <u>BAKORPEND_Pontianak.com</u></p>
      </div>
</body>
</html>

<script>   
    function konfirmasi(username,id){
        location.href = "konfirmasi.php?id="+id+"&username="+username+"&submit=konfirmasi";
    }
    function deleteData(id,username){
        location.href = "konfirmasi.php?id="+id+"&username="+username+"&submit=Hapus";
    }
    function goImage(bukti){
        window.open('../siswa/'+bukti,'_blank');
    }
    $(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
            $("#data-table tr").filter(function() {
             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>