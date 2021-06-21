<?php

include "../connection.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$konfirm = $_POST['konfirmpassword'];

$sql1 = "select * from tbuser";
$query1 = mysqli_query($conn,$sql1);
$cek = 0;
$row = mysqli_num_rows($query1);
for($x = 0; $x < $row; $x++){
    $re = mysqli_fetch_array($query1);
    $user = $re['username'];
    if($username == $user){
        $cek = 1;
    }
}

if($cek == 0){
    $sql = "insert into tbuser (username,email,password,status) values ('$username','$email','$password','user')";
    $query = mysqli_query($conn,$sql);
    header('location:Daftar.php?pesan=berhasil');
}else if($cek > 0){
    header('location:Daftar.php?pesan=username');
}else if($password != $konfirm){
    header('location:Daftar.php?pesan=gagal');
}

?>