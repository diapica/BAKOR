<?php 
    include "../connection.php";
    $submit = $_GET["submit"];
    $bulan = $_GET["bulan"];

    if($submit == "pembayaran"){
        $sql = "SELECT tbregistrasi.*, tbpembayaran.buktiPembayaran,
                tbpembayaran.biayaKursus, tbpembayaran.tanggalPembayaran, tbregistrasi.idregistrasi, tbpembayaran.idpembayaran,
                tbpembayaran.status FROM tbpembayaran INNER JOIN tbregistrasi ON tbpembayaran.idregistrasi = tbregistrasi.idregistrasi
                WHERE tbpembayaran.status != 'ditolak' AND month(tanggalPembayaran)='$bulan'";
        $query = mysqli_query($conn, $sql);
        $row = 0;
        if(!is_array($query)) {
            $row = mysqli_num_rows($query);    
        }
    }else{
        $sql = "SELECT tbregistrasi.*, tbuser.status_register 
                FROM tbuser INNER JOIN tbregistrasi ON tbuser.username = tbregistrasi.username 
                WHERE status = 'user' AND month(tanggalDaftar)='$bulan' AND status_register IN ('b', 'c', 'd', 'e', 'f','g')";
        $query = mysqli_query($conn,$sql);
        $row = 0;
        if(!is_array($query)) {
            $row = mysqli_num_rows($query);    
        }
    }
?>

<?php if($submit == "pembayaran"){ ?> 
    <table class="table table-striped text-center" id='example'> 
        <colgroup>
                <col width="2%">
                <col width="5%">
                <col width="5%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="5%">
                <col width="10%">
                <col width="15%">
                <col width="15%">
        </colgroup>
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th style="font-size:12px;">No Pendaftaran</th>
                <th style="font-size:12px;">No Pembayaran</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tingkatan</th>
                <th>Waktu Belajar</th>
                <th>Kelas</th>
                <th>Bukti Bayar</th>
                <th>Biaya Kursus</th>
                <th>Tanggal Bayar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="data-table">
        <?php 
            if($row > 0){
                for($x = 1 ; $x <= $row; $x++){
                    $re = mysqli_fetch_array($query);
                    $username = $re['username'];
                    $email = strtolower($re['email']);
                    $nama = ucwords(strtolower($re['namaIndonesia']));
                    $tingkatan = ucwords(strtolower($re['tingkatan']));
                    $waktuBelajar = ucwords(strtolower($re['waktuBelajar']));
                    $statusKelas = ($re['statusKelas'] == 'tatap_muka') ? 'Tatap Muka' : 'Online';
                    $bukti = $re['buktiPembayaran'];
                    $biaya = $re['biayaKursus'];
                    $tanggal = $re['tanggalPembayaran'];
                    $idregis = $re['idregistrasi'];
                    $id = $re['idpembayaran'];
                    $statusPembayaran = $re['status'];
                    $sql1 = "SELECT status_register FROM tbuser WHERE username = '$username'";
                    $query1 = mysqli_query($conn,$sql1);
                    $re = mysqli_fetch_array($query1);
                    $status = $re['status_register'];
        ?>
            <tr class="align-middle">
                <td><?php echo $x ?></td>
                <td>NP-<?php echo $idregis ?></td>
                <td>BP-<?php echo $id ?></td>
                <td><?php echo strtoupper($username) ?></td>
                <td><?php echo $nama ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $tingkatan ?></td>
                <td><?php echo $waktuBelajar ?></td>
                <td><?php echo $statusKelas ?></td>
                <td style="width:200px"><img onclick="goImage(<?php echo "'$bukti'" ?>)" src="../Siswa/<?php echo $bukti ?>" style="width:100%"></td>
                <td><p id="biaya<?php echo $x ?>">Rp. <?php echo number_format((float)$biaya, 0, ',', '.'); ?></p> <input class="form-control" id="input_biaya<?php echo $x ?>" type="text" style="display:none;"></td>
                <td><p id="tanggal<?php echo $x ?>"><?php echo date('d-m-Y', strtotime($tanggal)); ?></p><input class="form-control" id="input_tanggal<?php echo $x ?>" type="date" style="display:none;"></td>
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
        <?php
            }
        }else{ ?>
        <tr class="align-middle">
            <td colspan="13">Data tidak ada</td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
<?php }else{ ?> 
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
            <?php } } else{ ?> 
            <tr class="align-middle">
                <td colspan="5">Data tidak ada</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }?>
