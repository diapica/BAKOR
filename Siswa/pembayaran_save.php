<?php

include "../connection.php";

$username = $_POST['username'];
$image = $_FILES['image'];
$idregister = $_POST['idregister'];
// $tanggalPembayaran = $_POST['tanggalPembayaran'];

$target_file = "images/pembayaran/" . basename($image['name']);

move_uploaded_file($image['tmp_name'], $target_file);

$sql = "insert into tbpembayaran (idregister,buktiPembayaran,status) values ('$idregister','$target_file','menunggu')";
$query = mysqli_query($conn,$sql);

$sql1 = "update tbuser set status_register = 'e' where username = '$username'";
$query1 = mysqli_query($conn,$sql1);

header("location:pembayaran.php");