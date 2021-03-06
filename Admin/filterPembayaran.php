<?php
error_reporting(0);
include "../connection.php";

$hari = $_GET['hari'];
$tahun = $_GET['tahun'];
$bulan = $_GET['bulan'];
$gelombang = $_GET['gelombang'];
$kelas = $_GET['kelas'];
$statusKelas = $_GET['statusKelas'];
$tingkatan = $_GET['tingkatan'];
$submit = $_GET['submit'];

$sql = "SELECT tbregistrasi.*, tbpembayaran.tanggalPembayaran,
    tbpembayaran.biayaKursus,tbuser.status_register FROM tbregistrasi INNER JOIN tbpembayaran 
    ON tbregistrasi.idregistrasi = tbpembayaran.idregistrasi INNER JOIN tbuser ON tbregistrasi.username = tbuser.username 
    WHERE tbuser.status_register = 'f' and tbpembayaran.status = 'diterima'";

$title = "Laporan Daftar Pembayaran Siswa BAKORPEND PONTIANAK";
$listBulan = ['','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
if($submit == 'hari'){
    $sql .= " AND tanggalPembayaran='$hari'";
    $title .= " Tanggal ". date('d-m-Y',strtotime($hari));
}else if($submit == 'bulan') {
    if($bulan != 99){
        $sql .= " AND month(tanggalPembayaran)='$bulan'";
        $title .= " Bulan ".$listBulan[(int)$bulan];
    }
}else if($submit == 'tahun') {
    if($tahun != 99){
        $sql .= " AND year(tanggalPembayaran) ='$tahun'";
        $title .= " Tahun ".$tahun;
    }
}else if($submit == 'campuran') {
    if($tahun != 99 && $bulan != 99){
        $sql .= " AND month(tanggalPembayaran)= '$bulan' AND year(tanggalPembayaran) = '$tahun'";
        $title .= " Bulan ".$listBulan[(int)$bulan] . " Tahun " . $tahun;
    }
    $campuran = $bulan."|".$tahun;
}

if($gelombang != ""){
    $sql .= " AND gelombang = '$gelombang'";
    $title .= " Gelombang ".$gelombang;
}

if($kelas != ""){
    $sql .= " AND waktuBelajar = '$kelas'";
    $title .= " Waktu Belajar ".ucwords(strtolower($kelas));
}

if($tingkatan != ""){
    $sql .= " AND tingkatan = '$tingkatan'";
    $title .= " Tingkatan ".ucwords(strtolower($tingkatan));
}

if($statusKelas != ""){
    $sql .= " AND statusKelas = '$statusKelas'";
    $_statusKelas = ($statusKelas=='tatap_muka') ? 'tatap muka' : 'online';
    $title .= " Kelas ".ucwords(strtolower($_statusKelas));
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
                }else if($submit == 'campuran') {
                    echo $campuran;
                }
            ?>">
            <input type="hidden" name="jenis" value="pembayaran">
            <input type="hidden" name="gelombang" value="<?php echo $gelombang ?>">
            <input type="hidden" name="kelas" value="<?php echo $kelas ?>">
            <input type="hidden" name="statusKelas" value="<?php echo $statusKelas ?>">
            <input type="hidden" name="tingkatan" value="<?php echo $tingkatan ?>">
            <button type="submit" class="btn btn-danger">PRINT PDF</button>
        </form>
        <p class="text-center"><?php echo $title ?></p>
        <table class="table table-striped text-center" id="tableData">
            <colgroup>
                <col width="5%">
                <col width="15%">
                <col width="15%">
                <col width="15%">
                <col width="10%">
                <col width="10%">
                <col width="15%">
                <col width="15%">
            </colgroup>
            <thead class="thead">
                <tr class="align-middle">
                    <th rowspan="2">No</th>
                    <th colspan="2">Nama</th>
                    <th rowspan="2">Tingkatan</th>
                    <th rowspan="2">Waktu Belajar</th>
                    <th rowspan="2">Kelas</th>
                    <th rowspan="2">Tanggal Pembayaran</th>
                    <th rowspan="2">Jumlah</th>
                </tr>
                <tr>
                    <th>Mandarin</th>
                    <th>Indonesia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($row > 0){
                for($x = 1; $x <= $row;$x++){
                    $re = mysqli_fetch_array($query);
                    $mandarin = ucwords(strtolower($re['namaMandarin']));
                    $indonesia = ucwords(strtolower($re['namaIndonesia']));
                    $tingkatan = ucwords(strtolower($re['tingkatan']));
                    $waktuBelajar = ucwords(strtolower($re['waktuBelajar']));
                    $statusKelas = ($re['statusKelas'] == 'tatap_muka') ? 'Tatap Muka' : 'Online';
                    $tanggal = $re['tanggalPembayaran'];
                    $biaya = $re['biayaKursus'];
                    $status = $re['status_register'];
                ?>
                <tr>
                    <td><?php echo $x ?></td>
                    <td><?php echo $mandarin ?></td>
                    <td><?php echo $indonesia ?></td>
                    <td><?php echo $tingkatan ?></td>
                    <td><?php echo $waktuBelajar ?></td>
                    <td><?php echo $statusKelas ?></td>
                    <td><?php echo date('d-m-Y', strtotime($tanggal)) ?></td>
                    <td>Rp. <?php echo number_format((float)$biaya, 0, ',', '.'); ?></td>
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