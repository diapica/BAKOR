<?php 

include "../connection.php";
$username = $_GET['username'];

$sql = "UPDATE tbuser SET status_register = 'a' WHERE username='$username'";
$query = mysqli_query($conn,$sql);
header('location:pendaftaran.php');
?>