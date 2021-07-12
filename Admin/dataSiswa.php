<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataSiswa1.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

</head>
<body>
    <?php include "../connection.php"; include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content" style="height:755px;overflow-y:scroll;padding-bottom:40px;">
            <div style="display:flex;justify-content:space-between;">
                <h1>View Data Siswa</h1>
            </div>
            <select name="bulan" id="bulan" style="width:150px; margin-bottom:10px" onchange="bulan_()">
                <option value="99">Semua Bulan</option>
                <option value="01">Januari</option>
                <option value="02">Febuari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <div id="data">
                <table class="table table-striped text-center" id="example">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>No Pendaftaran</th>
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
                            WHERE status = 'user' AND status_register IN ('b', 'c', 'd', 'e', 'f','g')";
                    $query = mysqli_query($conn,$sql);
                    $row = 0;
                    if(!is_array($query)) {
                        $row = mysqli_num_rows($query);    
                    }
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
                            $status = "Pendaftaran telah selesai! Menunggu konfirmasi!";
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
                            <td>NP-<?php echo $id ?></td>
                            <td><?php echo strtoupper($username) ?></td>
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
                        <?php } }else { echo "<tr><td colspan=6>Tidak ada data</td></tr>"; }?>
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

<script>
    
    $(document).ready(function(){
        $('#example').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    function goTo(id, username){
        location.href = "editSiswa.php?id="+id+"&username="+username;
    }
    function deleteData(id, username){
        location.href = "pendaftaran_edit.php?id="+id+"&username="+username+"&submit=Hapus";
    }

    function buatajax(){
        if(window.XMLHttpRequest){
            return new XMLHttpRequest();
        }
        if(window.ActiveXObject){
            return new ActiveXObject('Microsoft.XMLHttp');
        }
        return null;
    }
    function tampil(){
        if(ajaxku.readyState == 4){
            data = ajaxku.responseText;	
            document.getElementById("data").innerHTML = data;
            $('#example').DataTable();
            $('.dataTables_length').addClass('bs-select');
        }	
    }

    function bulan_(){
        var bulan = document.getElementById("bulan").value;
        var url = "filterData.php?bulan="+bulan+"&submit=siswa";

        url = url + "&sid=" + Math.random();
        ajaxku = buatajax();
        ajaxku.onreadystatechange = tampil;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }
</script>