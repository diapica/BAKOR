<?php
error_reporting(0);
include "../connection.php";

$id = $_GET['id'];
$username = $_GET['username'];
$submit = $_GET['submit'];

if($submit == 'Update'){
    $mandarin = $_GET['mandarin'];
    $indonesia = $_GET['indonesia'];
    $jenisKelamin = $_GET['jenisKelamin'];
    $tempatLahir = $_GET['tempatLahir'];
    $tanggalLahir = $_GET['tanggalLahir'];
    $pendidikanTerakhir = $_GET['pendidikanTerakhir'];
    $alamat = $_GET['alamat'];
    $email = $_GET['email'];
    $no = $_GET['no'];
    $pekerjaan = $_GET['pekerjaan'];
    $tingkatan = $_GET['tingkatan'];
    $waktuBelajar = $_GET['waktuBelajar'];
    $tahunMasuk = $_GET['tahunMasuk'];
    $statusKelas = $_GET['statusKelas'];
    $gelombang = $_GET['gelombang'];
    $sql = "UPDATE tbregistrasi SET namaMandarin = '$mandarin', namaIndonesia = '$indonesia', 
            jenisKelamin = '$jenisKelamin', tempatLahir='$tempatLahir', tanggalLahir='$tanggalLahir',
            pendidikanTerakhir='$pendidikanTerakhir', alamat='$alamat', email='$email', noWA='$no',
            pekerjaan='$pekerjaan', tingkatan='$tingkatan', waktuBelajar='$waktuBelajar', tahunMasuk='$tahunMasuk',
            statusKelas='$statusKelas', gelombang='$gelombang' 
            WHERE idregistrasi = '$id'";
    $query = mysqli_query($conn,$sql);

}else if($submit == 'Approved'){
    $sql = "UPDATE tbuser SET status_register='c' WHERE username='$username'";
    $query = mysqli_query($conn,$sql);

}else if($submit == 'Reject' || $submit == 'Hapus'){
    $sql = "UPDATE tbuser SET status_register='d' WHERE username='$username'";
    $query = mysqli_query($conn,$sql);
    $sql1 = "DELETE FROM tbregistrasi WHERE idregistrasi = '$id'";
    $query1 = mysqli_query($conn,$sql1);
}

header("location:dataSiswa.php");
?>