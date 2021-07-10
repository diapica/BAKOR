<?php
// error_reporting(0);
include "../connection.php";

$value = $_GET['value'];
$submit = $_GET['submit'];
if($submit == 'campuran'){
    $split = explode("|",$value);
    $bulan = $split[0];
    $tahun = $split[1];
}
$jenis = $_GET['jenis'];
$gelombang = $_GET['gelombang'];
$kelas = $_GET['kelas'];
$tingkatan = $_GET['tingkatan'];
$statusKelas = $_GET['statusKelas'];

$title = "Laporan Daftar Siswa BAKORPEND PONTIANAK";
$listBulan = ['','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

if($jenis == 'siswa'){
    $sql = "SELECT tbregistrasi.*, tbuser.status_register FROM tbuser 
        INNER JOIN tbregistrasi ON tbuser.username = tbregistrasi.username 
        WHERE tbuser.status_register='f'";

    if($submit == 'hari'){
        $sql .= " and tanggalDaftar='$value'";
        $title .= " Tanggal ". date('d-m-Y',strtotime($value));
    }else if($submit == 'bulan') {
        if($value != 99){
            $sql .= " and month(tanggalDaftar)='$value'";
            $title .= " Bulan ".$listBulan[(int)$value];
        }
    }else if($submit == 'tahun') {
        if($value != 99){
            $sql .= " and year(tanggalDaftar) ='$value'";
            $title .= " Tahun ".$value;
        }
    }else if($submit == 'campuran') {
        if($tahun != 99 && $bulan != 99){
            $sql .= " AND month(tanggalDaftar)= '$bulan' AND year(tanggalDaftar) = '$tahun'";
            $title .= " Bulan ".$listBulan[(int)$bulan] . " Tahun " . $tahun;
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
    
    if($statusKelas != ""){
        $sql .= " AND statusKelas = '$statusKelas'";
        $statusKelas = ($statusKelas=='tatap_muka') ? 'tatap muka' : 'online';
        $title .= " Kelas ".ucwords(strtolower($statusKelas));
    }
    
    if($tingkatan != ""){
        $sql .= " AND tingkatan = '$tingkatan'";
        $title .= " Tingkatan ".ucwords(strtolower($tingkatan));
    }

    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
        
?>
    <html>
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <p class="text-center" style="font-size:25px;font-weight:bold;"><?php echo $title ?> </p>
            <table border="1px" class="table table-striped text-center" style="text-align:center;">
            <colgroup>
                <col width="5%">
                <col width="15%">
                <col width="15%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="15%">
                <col width="10%">
                <col width="10%">
            </colgroup>
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
<?php }else if($jenis == 'pembayaran'){
    $sql = "SELECT tbregistrasi.*,  tbpembayaran.tanggalPembayaran,tbpembayaran.biayaKursus,tbuser.status_register 
            FROM tbregistrasi INNER JOIN tbpembayaran ON tbregistrasi.idregistrasi = tbpembayaran.idregistrasi 
            INNER JOIN tbuser ON tbregistrasi.username = tbuser.username 
            WHERE tbuser.status_register = 'f' AND tbpembayaran.status = 'diterima'";

    $title = "Laporan Daftar Pembayaran BAKORPEND PONTIANAK";

    if($submit == 'hari'){
        $sql .= " AND tanggalPembayaran='$value'";
        $title .= " Tanggal ". date('d-m-Y',strtotime($value));
    }else if($submit == 'bulan') {
        if($value != 99){
            $sql .= " AND month(tanggalPembayaran)='$value'";
            $title .= " Bulan ".$listBulan[(int)$value];
        }
    }else if($submit == 'tahun') {
        if($value != 99){
            $sql .= " AND year(tanggalPembayaran) ='$value'";
            $title .= " Tahun ".$value;
        }
    }else if($submit == 'campuran') {
        if($tahun != 99 && $bulan != 99){
            $sql .= " AND month(tanggalPembayaran)= '$bulan' AND year(tanggalPembayaran) = '$tahun'";
            $title .= " Bulan ".$listBulan[(int)$bulan] . " Tahun " . $tahun;
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
    
    if($statusKelas != ""){
        $sql .= " AND statusKelas = '$statusKelas'";
        $statusKelas = ($statusKelas=='tatap_muka') ? 'tatap muka' : 'online';
        $title .= " Kelas ".ucwords(strtolower($statusKelas));
    }
    
    if($tingkatan != ""){
        $sql .= " AND tingkatan = '$tingkatan'";
        $title .= " Tingkatan ".ucwords(strtolower($tingkatan));
    }

    $query = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($query);
        
    ?>
    <html>
        <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
        </head>
        <body>
            <p class="text-center"><?php echo $title ?></p>
            <table border="1px" class="table table-striped text-center" id="tableData">
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
<?php } ?>