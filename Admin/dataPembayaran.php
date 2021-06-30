<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKORPEND Pontianak</title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/dataPembayaran1.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <?php include "header.php" ?>
      <div class="content-1">
          <?php include "sidebar.php" ?>
          <div class="content" style="height:755px;overflow-y:scroll;padding-bottom:40px;">
            <div style="display:flex;justify-content:space-between;">
                <h1>View Data Pembayaran</h1>
            </div>
            <table class="table table-striped text-center" id='example'> 
                <colgroup>
                    <col width="5%">
                    <col width="10%">
                    <col width="15%">
                    <col width="15%">
                    <col width="10%">
                    <col width="15%">
                    <col width="15%">
                    <col width="30%">
                </colgroup>
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
                    $sql = "SELECT tbregistrasi.username,tbregistrasi.email,tbregistrasi.namaIndonesia,tbpembayaran.buktiPembayaran,
                    tbpembayaran.biayaKursus,tbpembayaran.tanggalPembayaran,tbregistrasi.idregistrasi,tbpembayaran.idpembayaran,
                    tbpembayaran.status FROM tbpembayaran INNER JOIN tbregistrasi ON tbpembayaran.idregistrasi = tbregistrasi.idregistrasi";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_num_rows($query);

                    if($row > 0){
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
                        $statusPembayaran = $re[8];
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
                        <td style="width:200px"><img onclick="goImage(<?php echo "'$bukti'" ?>)" src="../Siswa/<?php echo $bukti ?>" style="width:100%"></td>
                        <td><p id="biaya<?php echo $x ?>">Rp. <?php echo number_format((float)$biaya, 2, ',', '.'); ?></p> <input class="form-control" id="input_biaya<?php echo $x ?>" type="text" style="display:none;"></td>
                        <td><p id="tanggal<?php echo $x ?>"><?php echo date('d F Y', strtotime($tanggal)); ?></p><input class="form-control" id="input_tanggal<?php echo $x ?>" type="date" style="display:none;"></td>
                        <td>
                            <button style="color:white" id="button_edit<?php echo $x ?>" class="btn btn-info" onclick="edit_data('<?php echo $x ?>', '<?php echo $biaya ?>', '<?php echo $tanggal ?>', )">Edit</button>
                            <?php if($status == 'e' && $statusPembayaran == 'menunggu'){ ?>
                                <button id="konfirmasi<?php echo $x ?>" style="color:white;display:none;" class="btn btn-info" onclick="konfirmasi(<?php echo "'$username','$id','$x', 'konfirmasi'" ?>)">Konfirmasi</button>
                            <?php }else{ ?>
                                <button id="konfirmasi<?php echo $x ?>" style="color:white;display:none;" class="btn btn-info" onclick="konfirmasi(<?php echo "'$username','$id','$x', 'update'" ?>)">Update</button>
                            <?php } ?>
                            <button class="btn btn-danger" onclick="deleteData(<?php echo "'$id','$username'" ?>)">Hapus</button>
                        </td>
                    </tr>
                    <?php } }else{ ?>
                    <tr class="align-middle">
                        <td colspan="13">Data tidak ada</td>
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
    function edit_data(x, biayaData, tanggalData){
        var biaya = document.getElementById("biaya"+x);
        var tanggal = document.getElementById("tanggal"+x);
        var input_biaya = document.getElementById("input_biaya"+x);
        var input_tanggal = document.getElementById("input_tanggal"+x);
        var button = document.getElementById("konfirmasi"+x);
        var buttonEdit = document.getElementById("button_edit"+x);
        document.getElementById("input_tanggal"+x).value = tanggalData;
        document.getElementById("input_biaya"+x).value = biayaData;
        biaya.style.display = "none";
        tanggal.style.display = "none";
        input_biaya.style.display = "block";
        input_tanggal.style.display = "block";
        button.style.display = "inline-block";
        buttonEdit.style.display = "none";
        
    }
    function konfirmasi(username,id,x, action){
        var harga_input = document.getElementById("input_biaya"+x).value;
        var tanggal_input = document.getElementById("input_tanggal"+x).value;
        var biaya = document.getElementById("biaya"+x);
        var tanggal = document.getElementById("tanggal"+x);
        var input_biaya = document.getElementById("input_biaya"+x);
        var input_tanggal = document.getElementById("input_tanggal"+x);
        var button = document.getElementById("konfirmasi"+x);
        var buttonEdit = document.getElementById("button_edit"+x);
        biaya.style.display = "block";
        tanggal.style.display = "block";
        input_biaya.style.display = "none";
        input_tanggal.style.display = "none";
        button.style.display = "none";
        buttonEdit.style.display = "inline-block";
        location.href = "konfirmasi.php?id="+id+"&username="+username+"&submit=konfirmasi&harga="+harga_input+"&tanggal="+tanggal_input+"&action="+action;
    }
    function deleteData(id,username){
        location.href = "konfirmasi.php?id="+id+"&username="+username+"&submit=Hapus";
    }
    function goImage(bukti){
        window.open('../Siswa/'+bukti,'_blank');
    }
    $(document).ready(function(){
        $('#example').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>