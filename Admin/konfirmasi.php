<?php
error_reporting(0);
include "../connection.php";
$dateTime = date('Y-m-d');

$username = $_GET['username'];
$id = $_GET['id'];
$submit = $_GET['submit'];

if($submit == 'konfirmasi'){
    $sql = "update tbuser set status_register = 'f', waktuUpdate='$dateTime' where username= '$username'";
    $query = mysqli_query($conn,$sql);
    $sql1 = "update tbregistrasi set tanggalDaftar = '$dateTime' where username='$username'";
    $query1 = mysqli_query($conn,$sql1);
    $sql2 = "update tbpembayaran set status='diterima' where idpembayaran='$id'";
    $query2 = mysqli_query($conn,$sql2);
}else if($submit == 'Hapus'){
    $sql = "update tbpembayaran set status='ditolak' where idpembayaran='$id'";
    $query = mysqli_query($conn,$sql);
    $sql2 = "update tbuser set status_register = 'c' where username='$username'";
    $query = mysqli_query($conn,$sql2);
}
header('location:dataPembayaran.php');

?>