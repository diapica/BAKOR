<?php
error_reporting(0);
include "../connection.php";

$username = $_POST['username'];
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
$foto = $_FILES['foto'];
$ktp = $_FILES['ktp'];
$ijazah = $_FILES['ijazah'];
$hsk = $_FILES['hsk'];

$target_foto = "images/foto/" . basename($_FILES['foto']['name']);
$target_ktp = "images/ktp/" . basename($ktp['name']);
$target_ijazah = "images/ijazah/" . basename($ijazah['name']);
$target_hsk = "images/hsk/" . basename($hsk['name']);

move_uploaded_file($_FILES['foto']['tmp_name'], $target_foto);
move_uploaded_file($_FILES['ktp']['tmp_name'], $target_ktp);
move_uploaded_file($_FILES['ijazah']['tmp_name'], $target_ijazah);
move_uploaded_file($_FILES['hsk']['tmp_name'], $target_hsk);

$sql = "INSERT INTO tbregistrasi 
        (username, namaMandarin, namaIndonesia, jenisKelamin, tempatLahir, tanggalLahir, pendidikanTerakhir,
        alamat, email, noWA, pekerjaan, tingkatan, waktuBelajar, pasFoto, identitasDiri, ijazah, hsk) VALUES
        ('$username', '$mandarin', '$indonesia', '$jenisKelamin', '$tempatLahir', '$tanggalLahir', '$pendidikanTerakhir', 
        '$alamat', '$email', '$no', '$pekerjaan', '$tingkatan', '$waktuBelajar', '$target_foto', '$target_ktp', '$target_ijazah', 
        '$target_hsk')";
$query = mysqli_query($conn,$sql);

$sql1 = "UPDATE tbuser SET status_register = 'b' WHERE username='$username'";
$query1 = mysqli_query($conn,$sql1);

header("location:index.php");
?>