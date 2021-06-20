<?php
error_reporting(0);
include "../connection.php";

$value = $_GET['value'];
$submit = $_GET['submit'];

$sql = "
    select tbregistrasi.*,tbuser.status_register from tbuser 
    inner join tbregistrasi on tbuser.username = tbregistrasi.username 
    where tbuser.status_register='f' 
";

if($submit == 'hari'){
    $sql .= " and tanggalDaftar='$value'";
}else if($submit == 'bulan') {
    if($bulan != 99){
        $sql .= " and month(tanggalDaftar)='$value'";
    }
}else if($submit == 'tahun') {
    if($tahun != 99){
        $sql .= " and year(tanggalDaftar) ='$value'";
    }
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
        <p class="text-center" style="font-size:25px;font-weight:bold;">Laporan daftar siswa BAKORPEND PONTIANAK Tingkat Dasar Sore Online Tahun 2021 </p>
        <table border="1px" class="table text-center" style="text-align:center;">
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