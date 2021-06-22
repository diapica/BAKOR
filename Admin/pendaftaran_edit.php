<?php
error_reporting(0);
include "../connection.php";

$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
$username = isset($_GET['username']) ? $_GET['username'] : $_POST['username'];
$submit = isset($_GET['submit']) ? $_GET['submit'] : $_POST['submit'];
$page = isset($_GET['page']) ? $_GET['page'] : $_POST['page'];

if($submit == 'Update'){

    $addSQL = "username = '$username'";

    if ($page =='pendaftaranSiswa') {
        $mandarin = $_POST['mandarin'];
        $indonesia = $_POST['indonesia'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['tanggalLahir'];
        $pendidikanTerakhir = $_POST['pendidikanTerakhir'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $no = $_POST['no'];
        $pekerjaan = $_POST['pekerjaan'];
        $tingkatan = $_POST['tingkatan'];
        $waktuBelajar = $_POST['waktuBelajar'];

        $addSQL .= ", namaMandarin = '$mandarin', namaIndonesia = '$indonesia', jenisKelamin = '$jenisKelamin', 
        tempatLahir='$tempatLahir', tanggalLahir='$tanggalLahir', pendidikanTerakhir='$pendidikanTerakhir', alamat='$alamat', 
        email='$email', noWA='$no', pekerjaan='$pekerjaan', tingkatan='$tingkatan', waktuBelajar='$waktuBelajar'";
    }

    if(isset($_GET['tahunMasuk'])) {
        $tahunMasuk = $_GET['tahunMasuk'];
        $addSQL .= ", tahunMasuk='$tahunMasuk'";
    }

    if(isset($_GET['statusKelas'])) {
        $statusKelas = $_GET['statusKelas'];
        $addSQL .= ", statusKelas='$statusKelas'";
    }

    if(isset($_GET['gelombang'])) {
        $gelombang = $_GET['gelombang'];
        $addSQL .= ", gelombang='$gelombang'";
    }

    if(strlen($_FILES['foto']['name']) > 0) {
        $target_foto = "images/foto/" . basename($_FILES['foto']['name']);
        $move_foto_to = "../Siswa/".$target_foto;
        move_uploaded_file($_FILES['foto']['tmp_name'], $move_foto_to);
        $addSQL .= ", pasFoto='$target_foto'";
    }

    if(strlen($_FILES['ktp']['name']) > 0) {
        $target_foto = "images/foto/" . basename($_FILES['ktp']['name']);
        $move_foto_to = "../Siswa/".$target_foto;
        move_uploaded_file($_FILES['ktp']['tmp_name'], $move_foto_to);
        $addSQL .= ", identitasDiri='$target_foto'";
    }

    if(strlen($_FILES['ijazah']['name']) > 0) {
        $target_foto = "images/foto/" . basename($_FILES['ijazah']['name']);
        $move_foto_to = "../Siswa/".$target_foto;
        move_uploaded_file($_FILES['ijazah']['tmp_name'], $move_foto_to);
        $addSQL .= ", ijazah='$target_foto'";
    }

    if(strlen($_FILES['hsk']['name']) > 0) {
        $target_foto = "images/foto/" . basename($_FILES['hsk']['name']);
        $move_foto_to = "../Siswa/".$target_foto;
        move_uploaded_file($_FILES['hsk']['tmp_name'], $move_foto_to);
        $addSQL .= ", hsk='$target_foto'";
    }

    
    $sql = "UPDATE tbregistrasi SET ". $addSQL .
            " WHERE idregistrasi = '$id'";
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

if($page == 'pendaftaranSiswa') {
    header("location:../Siswa/index.php");
} else {
    header("location:dataSiswa.php");
}


?>