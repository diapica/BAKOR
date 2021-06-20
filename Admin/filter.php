<?php
error_reporting(0);
include "../connection.php";

$hari = $_GET['hari'];
$tahun = $_GET['tahun'];
$bulan = $_GET['bulan'];
$submit = $_GET['submit'];

$sql = "
    select tbregistrasi.*,tbuser.status_register from tbuser 
    inner join tbregistrasi on tbuser.username = tbregistrasi.username 
    where tbuser.status_register='f' 
";

if($submit == 'hari'){
    $sql .= " and tanggalDaftar='$hari'";
}else if($submit == 'bulan') {
    if($bulan != 99){
        $sql .= " and month(tanggalDaftar)='$bulan'";
    }
}else if($submit == 'tahun') {
    if($tahun != 99){
        $sql .= " and year(tanggalDaftar) ='$tahun'";
    }
}

$query = mysqli_query($conn,$sql);
$row = mysqli_num_rows($query);
    
?>
<html>
    <body>
        <form method="GET" action="../print.php">
            <input type="hidden" name="submit" id="submit_print" value="<?php echo $submit?>">
            <input type="hidden" name="value" id="submit_value" value="<?php 
                if($submit == 'hari'){
                    echo $hari;
                }else if($submit == 'bulan') {
                    echo $bulan;
                }else if($submit == 'tahun') {
                    echo $tahun;
                }
            ?>">
            <button type="submit" class="btn btn-danger">PRINT PDF</button>
        </form>
        <p class="text-center">Laporan daftar siswa BAKORPEND PONTIANAK Tingkat Dasar Sore Online Tahun 2021 </p> 
        <table border=1px class="table text-center">
            <thead class="thead">
                <tr class="align-middle">
                    <th rowspan="2">No</th>
                    <th colspan="2">Nama</th>
                    <th rowspan="2">Jenis Kelamin</th>
                    <th rowspan="2">Tempat</th>
                    <th rowspan="2">Tanggal lahir</th>
                    <th rowspan="2">Alamat</th>
                    <th rowspan="2">No HP</th>
                    <th rowspan="2">Pendidikan Terakhir</th>
                </tr>
                <tr>
                    <th>Mandarin</th>
                    <th>Indonesia</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                if($row > 0){
                for($x = 1 ; $x <= $row; $x++){ 
                    $re = mysqli_fetch_array($query);
                    $namaMandarin = $re['namaMandarin'];
                    $namaIndonesia = $re['namaIndonesia'];
                    $jenisKelamin = $re['jenisKelamin'];
                    $tempatLahir = $re['tempatLahir'];
                    $tanggalLahir = $re['tanggalLahir'];
                    $alamat = $re['alamat'];
                    $noWA = $re['noWA'];
                    $pendidikanTerakhir = $re['pendidikanTerakhir'];
                ?>
                <tr class="align-middle">
                    <td><?php echo $x ?></td>
                    <td><?php echo $namaMandarin ?></td>
                    <td><?php echo $namaIndonesia ?></td>
                    <td><?php echo $jenisKelamin ?></td>
                    <td><?php echo $tempatLahir ?></td>
                    <td><?php echo date('d F Y',strtotime($tanggalLahir)) ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $noWA ?></td>
                    <td><?php echo $pendidikanTerakhir ?></td>
                </tr>    
                <?php } ?>
                <?php }else{ ?>
                    <tr class="align-middle">
                        <td colspan="13">Data tidak ada</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
<script>
 function pdf(){
        var submit = document.getElementById("submit_print").value;
        var value = document.getElementById("submit_value").value;
        alert(submit,value);
        location.href="../print.php?submit="+submit+"&value="+value;
    }
    
</script>