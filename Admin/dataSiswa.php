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
                <input type="text" id="search" placeholder=" Search..." style="width:250px;">
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
                $sql = "SELECT tbregistrasi.idregistrasi, tbregistrasi.username, tbregistrasi.email, tbuser.status_register 
                        FROM tbuser INNER JOIN tbregistrasi ON tbuser.username = tbregistrasi.username 
                        WHERE status = 'user' AND status_register IN ('b', 'c', 'd', 'e', 'f')";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($query);
                if($row > 0) {
                for($x = 1 ; $x <= $row; $x++){
                    $re = mysqli_fetch_array($query);
                    $id = $re['idregistrasi'];
                    $username = $re['username'];
                    $email = $re['email'];
                    $statusRegister = $re['status_register'];
                    if($statusRegister == 'a'){
                        $status = "Belum melakukan pendaftaran";
                    }else if($statusRegister == 'b'){
                        $status = "Pendaftaran telah selesai! Meunggu konfirmasi!";
                    }else if($statusRegister == 'c'){
                        $status = "Menunggu Pembayaran";
                    }else if($statusRegister == 'd'){
                        $status = "Data tidak valid";
                    }else if($statusRegister == 'e'){
                        $status = "Pembayaran diterima! Menunggu konfirmasi!";
                    }else if($statusRegister == 'f'){
                        $status = "Pendaftaran selesai";
                    }else if($statusRegister == 'g'){
                        $status = "Pembayaran tidak sesuai, silahkan hubungi admin";
                    }
                ?>
                    <tr>
                        <td><?php echo $x ?></td>
                        <td><?php echo $username ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $status ?></td>
                        <td>
                            <?php
                                if($statusRegister == 'b' || $statusRegister == 'c' || $statusRegister == 'e' ){
                            ?>
                            <button class="btn btn-info" style="color:white;" onclick="goTo(<?php echo "'$id', '$username'" ?>)">Edit</button>
                            <?php } ?>
                            <button name="submit" id="button" value="Hapus" class="btn btn-danger" onclick="deleteData(<?php echo "'$id', '$username'" ?>)">Hapus</button>
                        </td>
                    </tr>
                    <?php } }else { echo "<tr><td colspan=5>Tidak ada data</td></tr>"; }?>
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
    function goTo(id, username){
        location.href = "editSiswa.php?id="+id+"&username="+username;
    }
    function deleteData(id, username){
        location.href = "pendaftaran_edit.php?id="+id+"&username="+username+"&submit=Hapus";
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