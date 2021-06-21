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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
    <?php include "../connection.php"; include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content">
            <div style="display:flex;justify-content:space-between;">
                <h1>View Data Siswa</h1>
                <input type="text" id="search" placeholder="search" style="width:250px;">
            </div>
            <table class="table text-center" id="example">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                <?php
                
                $sql = "select tbregistrasi.idregistrasi,tbregistrasi.username,tbregistrasi.email, tbuser.status_register from tbuser inner join tbregistrasi on tbuser.username = tbregistrasi.username where status='user' and (status_register = 'b' or status_register = 'c' or status_register = 'e' or status_register='f')";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($query);
                for($x = 1 ; $x <= $row; $x++){
                    $re = mysqli_fetch_array($query);
                    $id = $re['idregistrasi'];
                    $username = $re['username'];
                    $email = $re['email'];
                    $statusRegister = $re['status_register'];
                    if($statusRegister == 'a'){
                        $status = "belum registrasi";
                    }else if($statusRegister == 'b'){
                        $status = "Registrasi Telah Dikirim";
                    }else if($statusRegister == 'c'){
                        $status = "Menunggu Pembayaran";
                    }else if($statusRegister == 'd'){
                        $status = "Registrasi Ditolak";
                    }else if($statusRegister == 'e'){
                        $status = "Pembayaran Diterima";
                    }else if($statusRegister == 'f'){
                        $status = "Selesai";
                    }
                ?>
                    <tr>
                        <td><?php echo $x ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $status ?></td>
                        <td>
                            <?php
                                if($statusRegister == 'b'){
                            ?>
                            <button class="btn btn-info" style="color:white;" onclick="goTo(<?php echo "'$id','$username'" ?>)">Edit</button>
                            <?php } ?>
                            <button name="submit" id="button" value="Hapus" class="btn btn-danger" onclick="deleteData(<?php echo "'$id'" ?>)">Hapus</button>
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
    function goTo(id,username){
        location.href = "editSiswa.php?id="+id+"&username="+username;
    }
    function deleteData(username){
        var submit = document.getElementById("button").value;
        location.href = "pendaftaran_edit.php?id="+username+"&submit="+submit;
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