<?php 

include "../connection.php";
$username = $_GET['username'];

$sql = "update tbuser set status_register = 'a' where username='$username'";
$query = mysqli_query($conn,$sql);
header('location:pendaftaran.php');
?>