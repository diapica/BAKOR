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

$sql = "SELECT tbregistrasi.*,tbuser.status_register FROM tbuser 
    INNER JOIN tbregistrasi ON tbuser.username = tbregistrasi.username 
    WHERE tbuser.status_register='f'";

$title = "Laporan Daftar Siswa BAKORPEND PONTIANAK";
$listBulan = ['','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

if($submit == 'hari'){
    $sql .= " AND tanggalDaftar='$hari'";
    $title .= " Tanggal ". date('d-m-Y',strtotime($hari));
}else if($submit == 'bulan') {
    if($bulan != 99){
        $sql .= " AND month(tanggalDaftar)='$bulan'";
        $title .= " Bulan ".$listBulan[(int)$bulan];
    }
}else if($submit == 'tahun') {
    if($tahun != 99){
        $sql .= " AND year(tanggalDaftar) ='$tahun'";
        $title .= " Tahun ".$tahun;
    }
}else if($submit == 'campuran') {
    if($tahun != 99 && $bulan != 99){
        $sql .= " AND month(tanggalDaftar)= '$bulan' AND year(tanggalDaftar) = '$tahun'";
        $title .= " Bulan ".$listBulan[(int)$bulan] . " Tahun " . $tahun;
        $campuran = $bulan."|".$tahun;
    }
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
                }else if($submit == 'campuran'){
                    echo $campuran;
                }
            ?>">
            <input type="hidden" name="jenis" value="siswa">
            <input type="hidden" name="gelombang" value="<?php echo $gelombang ?>">
            <input type="hidden" name="kelas" value="<?php echo $kelas ?>">
            <input type="hidden" name="statusKelas" value="<?php echo $statusKelas ?>">
            <input type="hidden" name="tingkatan" value="<?php echo $tingkatan ?>">
            <button type="submit" class="btn btn-danger">PRINT PDF</button>
        </form>
        <p class="text-center"><?php echo $title ?></p> 
        <table border=1px class="table table-striped text-center" id="tableData">
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
                    $namaMandarin = ucwords(strtolower($re['namaMandarin']));
                    $namaIndonesia = ucwords(strtolower($re['namaIndonesia']));
                    $jenisKelamin = $re['jenisKelamin'];
                    $tempatLahir = ucwords(strtolower($re['tempatLahir']));
                    $tanggalLahir = $re['tanggalLahir'];
                    $alamat = $re['alamat'];
                    $noWA = $re['noWA'];
                    $pendidikanTerakhir = strtoupper($re['pendidikanTerakhir']);
                ?>
                <tr class="align-middle">
                    <td><?php echo $x ?></td>
                    <td><?php echo $namaMandarin ?></td>
                    <td><?php echo $namaIndonesia ?></td>
                    <td><?php echo $jenisKelamin ?></td>
                    <td><?php echo $tempatLahir ?></td>
                    <td><?php echo date('d-m-Y',strtotime($tanggalLahir)) ?></td>
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