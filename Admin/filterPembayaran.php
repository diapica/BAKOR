<?php
error_reporting(0);
include "../connection.php";

$hari = $_GET['hari'];
$tahun = $_GET['tahun'];
$bulan = $_GET['bulan'];
$submit = $_GET['submit'];

$sql = "SELECT tbregistrasi.*, tbpembayaran.tanggalPembayaran,
    tbpembayaran.biayaKursus,tbuser.status_register FROM tbregistrasi INNER JOIN tbpembayaran 
    ON tbregistrasi.idregistrasi = tbpembayaran.idregistrasi INNER JOIN tbuser ON tbregistrasi.username = tbuser.username 
    WHERE tbuser.status_register = 'f' and tbpembayaran.status = 'diterima'";

$title = "Laporan daftar Pembayaran BAKORPEND PONTIANAK";

if($submit == 'hari'){
    $sql .= " AND tanggalPembayaran='$hari'";
    $title .= " Tanggal ". date('d F Y',strtotime($hari));
}else if($submit == 'bulan') {
    if($bulan != 99){
        $sql .= " AND month(tanggalPembayaran)='$bulan'";
        $title .= " Bulan ".$bulan;
    }
}else if($submit == 'tahun') {
    if($tahun != 99){
        $sql .= " AND year(tanggalPembayaran) ='$tahun'";
        $title .= " Tahun ".$tahun;
    }
}else{
    $title .= " Tahun ".date('Y');
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
            <input type="hidden" name="jenis" value="pembayaran">
            <input type="hidden" name="gelombang" value="">
            <input type="hidden" name="kelas" value="">
            <input type="hidden" name="statusKelas" value="">
            <button type="submit" class="btn btn-danger">PRINT PDF</button>
        </form>
        <p class="text-center"><?php echo $title ?></p>
        <table class="table table-striped text-center" id="tableData">
            <colgroup>
                <col width="10%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
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
                    <td><?php echo date('d F Y', strtotime($tanggal)) ?></td>
                    <td>Rp. <?php echo number_format((float)$biaya, 2, ',', '.'); ?></td>
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