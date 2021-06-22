<?php
error_reporting(0);
include "../connection.php";
$dateTime = date('Y-m-d');

$username = $_GET['username'];
$id = $_GET['id'];
$submit = $_GET['submit'];
$harga = $_GET['harga'];
$tanggal = $_GET['tanggal'];

if($submit == 'konfirmasi'){
    $sql = "UPDATE tbuser SET status_register = 'f', waktuUpdate='$dateTime' WHERE username= '$username'";
    $query = mysqli_query($conn,$sql);
    $sql1 = "UPDATE tbregistrasi SET tanggalDaftar = '$dateTime' WHERE username='$username'";
    $query1 = mysqli_query($conn,$sql1);
    $sql2 = "UPDATE tbpembayaran SET status='diterima', biayaKursus='$harga', tanggalPembayaran='$tanggal' WHERE idpembayaran='$id'";
    $query2 = mysqli_query($conn,$sql2);
}else if($submit == 'Hapus'){
    $sql = "UPDATE tbpembayaran SET status='ditolak' WHERE idpembayaran='$id'";
    $query = mysqli_query($conn,$sql);
    $sql2 = "UPDATE tbuser SET status_register = 'g' WHERE username='$username'";
    $query = mysqli_query($conn,$sql2);
}
header('location:dataPembayaran.php');

?>