<?php

session_start();
include "../connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "select * from tbuser where username='$username' and password='$password'");

$cek = mysqli_num_rows($query);

$result = mysqli_fetch_array($query);
$role = $result['status'];

if($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    if($role == 'admin'){
        header('location:../admin/index.php');
    }else if($role == 'user'){
        header('location:../siswa/index.php');
    }
}else{
    header("location:login.php?pesan=gagal");
}

?>