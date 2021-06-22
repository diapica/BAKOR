<?php 

include "../connection.php";
$username = $_GET['username'];
$status = $_GET['status'];

if($status == 'daftar'){
    $sql = "UPDATE tbuser SET status_register = 'a' WHERE username='$username'";
    $query = mysqli_query($conn,$sql);
    header('location:pendaftaran.php');
}else if($status == 'bayar'){
    $sql = "UPDATE tbuser SET status_register = 'c' WHERE username='$username'";
    $query = mysqli_query($conn,$sql);
    header('location:pembayaran.php');
}
?>